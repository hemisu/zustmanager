<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 19:45
 */
class Upload extends CI_Controller
{

	function __construct()
	{
		header("Content-Type:text/html;charset=utf-8");
		parent::__construct();
	}

	public function up()
	{
		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');
		require_once APPPATH.'vendor/autoload.php';
		$bucket = 'hemisu';
		$accessKey = 'Lrfwi7sZ9fqFImvVxurGE7keH8B6yLuOHBMwljot';
		$secretKey = '12l3F3JSpfMhBWweEOgpq_t2K6i03k1xKduGD5Ev';
		$auth = new Qiniu\Auth($accessKey, $secretKey);

		$policy = array(
			'scope' => 'hemisu',
//			'insertOnly'=> 1,
			'callbackUrl' => 'http://www.hemisu.com/manager/upload/callback',
			'callbackBody' => '{"fname":"$(fname)", "fkey":"$(key)", "desc":"$(x:desc)", "uid":' . $id . '}',
			'returnBody' => '{"fname":"$(fname)", "fkey":"$(key)", "desc":"$(x:desc)", "uid":'. $id .'}'
		);

		$upToken = $auth->uploadToken($bucket, null, 3600, $policy);

		header('Access-Control-Allow-Origin:*');
		$data['upToken'] = $upToken;

//		$bucketMgr = new Qiniu\Storage\BucketManager($auth);
//		$bucket = 'hemisu';
//		$prefix = '';
//		$marker = '';
//		$limit = 100;
//		echo '<pre>';
//		list($iterms, $marker, $err) = $bucketMgr->listFiles($bucket, $prefix, $marker, $limit);
//		if ($err !== null) {
//			echo "\n====> list file err: \n";
//			var_dump($err);
//		} else {
//			echo "Marker: $marker\n";
//			echo "\nList Iterms====>\n";
//			print_r($iterms);
//		}
		$data['userinfo'] = $this->User_data->userinfo($id);
		$this->load->view('task_zc_upload',$data);


	}
	public function callback()
	{
		$_body = file_get_contents('php://input');
		$body = json_decode($_body);
//
//		echo $_body;
//		echo $body->fname;
		if(!$this->db->from('upload')->where('fkey',$body->fkey)->get()->num_rows()){
			$log = array(
				'student_id' => $body->uid,
				'fname' => $body->fname,
				'fkey' => $body->fkey,
				'desc' => $body->desc,
			);
			$this->db->insert('upload', $log);
		}

//		echo $id;
		$resp = array('res' => 'success');
		echo json_encode($resp);
	}
	public function delkey($key = null){
		require_once APPPATH.'vendor/autoload.php';
		$bucket = 'hemisu';
		$accessKey = 'Lrfwi7sZ9fqFImvVxurGE7keH8B6yLuOHBMwljot';
		$secretKey = '12l3F3JSpfMhBWweEOgpq_t2K6i03k1xKduGD5Ev';
		$auth = new Qiniu\Auth($accessKey, $secretKey);
		$bucketMgr = new Qiniu\Storage\BucketManager($auth);
		$bucket = 'hemisu';
		$bucketMgr->delete(  $bucket ,  $key );
		$this->db->delete('upload', array('fkey' => $key));

		redirect(base_url('upload/up'));
	}


}