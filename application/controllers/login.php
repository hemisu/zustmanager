<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/2
 * Time: 18:48
 */
class Login extends CI_Controller
{

	function __construct()
	{
		header("Content-Type:text/html;charset=utf-8");
		parent::__construct();//继承父级
		$this->load->model('User_data'); //加载User_data模块
		$this->load->helper('url');

	}

	/*
	 * 登陆界面
	 * login.php
	*/

	public function index()
	{
		//判断登陆并且跳转到user_profile页面
		if ($this->User_data->is_login()) {
			redirect(base_url('user/profile'));
		}

		$cookie_login=$this->input->cookie('zust_login', TRUE);
		if(empty($cookie_login)){$cookie_login = '&';}
		$cookie_info= explode("&",$cookie_login);
		if($this->User_data->user_exist($cookie_info[0], $cookie_info[1]) == TRUE){
			$userinfo = $this->User_data->userinfo($cookie_info[0]);//读取用户数据
			//多说账号
			$token = array(
				"short_name" => 'zustmanager',
				"user_key" => $userinfo['student_id'],
				"name" => $userinfo['username'],
			);
			$duoshuoToken = JWT::encode($token, '97c1b8a2ce9f394b034232572c086196');
			$cookie = array(
				'name' => 'duoshuo_token',
				'value' => $duoshuoToken,
				'expire' => '86500',
				'domain' => '',
				'path' => '/',
				'secure' => FALSE
			);
			$this->input->set_cookie($cookie);

			$userinfo_session = array(
				'username' => $userinfo['username'],
				'student_id' => $userinfo['student_id'],
				'head_img' => $userinfo['head_img'],
				'major' => $userinfo['major'],
				'classnum' => $userinfo['classnum'],
				'email' => $userinfo['email'],
				'qq' => $userinfo['qq'],
			);
			$this->session->set_userdata($userinfo_session); //将用户数据写入session

			$logindate = array(
				'status' => "1",
				'lastLoginTime' => date("Y-m-d H:i:s")
			);
			$this->db->from('user')->where('student_id', $cookie_info[0])->update('user', $logindate);//更新用户登陆时间

			$log = array(
				'student_id' => $userinfo['student_id'],
				'username' => $userinfo['username'],
				'events' => '登陆',
				'time' => date("Y-m-d H:i:s")
			);
			$this->db->insert('log', $log);//记录事件 登陆

			/*      print_r($userinfo);//用户数据调出 调试用
							echo "<hr>";
							echo $this->session->userdata('username');
							echo "<hr>";
							echo "查询到此人";
							echo date("Y-m-d H:i:s");*/
			$cookie = array(
				'name' => 'zust_login',
				'value' => $userinfo['student_id'] . '&' . $userinfo['password'],
				'expire' => '86500',
				'domain' => '',
				'path' => '/',
				'secure' => FALSE
			);
			$this->input->set_cookie($cookie);
			redirect(base_url('user/profile'));
		}
		$data = array();
		//对提交的单表验证
		$this->load->library('form_validation');//引入表单验证库
		$this->form_validation->set_rules('user_id', '学号', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		$this->form_validation->set_message('required', '必须填写%s');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
                                                      <i class="fa fa-times-circle fa-fw fa-lg"></i>
                                                      <strong>错误！</strong>', '</div>');
		//表单验证
		//初始化传递的值 防止报错

		if ($this->form_validation->run() !== FALSE) {
			$id = $this->input->post('user_id');//获取POST数据 学号
			$password = $this->input->post('password');//密码

			if ($this->User_data->user_exist($id, $password) == TRUE) //判断是否存在用户
			{
				$this->User_data->loginset($id);

			} else {
				$data['error'] = "账号或密码输入错误";
			}
		}
		$this->load->view('login', $data);
	}
	public function login()
	{
		$id = $this->input->post('user_id');//获取POST数据 学号
		$password = $this->input->post('password');//密码

		if ($this->User_data->user_exist($id, $password) == TRUE) //判断是否存在用户
		{
			$this->User_data->loginset($id);
		}
	}
	public function loginout()
	{//退出登陆
		$id = $this->session->userdata('student_id');
		//更新在线状态和最后登出时间
		$data = array(
			'status' => "0",
			'lastLoginoutTime' => date("Y-m-d H:i:s")
		);

		$this->db->from('user')->where('student_id', $id)->update('user', $data);
		$log = array(
			'student_id' => $this->session->userdata('student_id'),
			'username' => $this->session->userdata('username'),
			'events' => '登出',
			'time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('log', $log);//记录事件 登出


		$this->session->sess_destroy();
		$cookie = array(
			'name' => 'zust_login',
			'value' => '&',
			'expire' => '0',
			'domain' => '',
			'path' => '/',
			'secure' => FALSE
		);
		$this->input->set_cookie($cookie);

		redirect(base_url('/login'));
	}



    public function error($note = null){//错误提示
        $data['error'][] = "$note";
	    if($note == 'register'){
		    $data['error'][] = "注册已关闭";
	    }
        $this->load->view('part/error',$data);

    }
//    public function success($note = null){//错误提示
//        $data['success'][] = "$note";
//        header("refresh:2;url=$current_url");
//
//    }


}

/**
 * Implements JWT encoding and decoding as per http://tools.ietf.org/html/draft-ietf-oauth-json-web-token-06
 * Encoding algorithm based on http://code.google.com/p/google-api-php-client
 * Decoding algorithm based on https://github.com/luciferous/jwt
 * @author Francis Chuang <francis.chuang@gmail.com>
 */
class JWT
{
	public static function encode($payload, $key, $algo = 'HS256')
	{
		$header = array('typ' => 'JWT', 'alg' => $algo);
		$segments = array(
			JWT::urlsafeB64Encode(json_encode($header)),
			JWT::urlsafeB64Encode(json_encode($payload))
		);
		$signing_input = implode('.', $segments);
		$signature = JWT::sign($signing_input, $key, $algo);
		$segments[] = JWT::urlsafeB64Encode($signature);
		return implode('.', $segments);
	}

	public static function decode($jwt, $key = null, $algo = null)
	{
		$tks = explode('.', $jwt);
		if (count($tks) != 3) {
			throw new Exception('Wrong number of segments');
		}
		list($headb64, $payloadb64, $cryptob64) = $tks;
		if (null === ($header = json_decode(JWT::urlsafeB64Decode($headb64)))) {
			throw new Exception('Invalid segment encoding');
		}
		if (null === $payload = json_decode(JWT::urlsafeB64Decode($payloadb64))) {
			throw new Exception('Invalid segment encoding');
		}
		$sig = JWT::urlsafeB64Decode($cryptob64);
		if (isset($key)) {
			if (empty($header->alg)) {
				throw new DomainException('Empty algorithm');
			}
			if (!JWT::verifySignature($sig, "$headb64.$payloadb64", $key, $algo)) {
				throw new UnexpectedValueException('Signature verification failed');
			}
		}
		return $payload;
	}

	private static function verifySignature($signature, $input, $key, $algo)
	{
		switch ($algo) {
			case'HS256':
			case'HS384':
			case'HS512':
				return JWT::sign($input, $key, $algo) === $signature;
			case 'RS256':
				return (boolean)openssl_verify($input, $signature, $key, OPENSSL_ALGO_SHA256);
			case 'RS384':
				return (boolean)openssl_verify($input, $signature, $key, OPENSSL_ALGO_SHA384);
			case 'RS512':
				return (boolean)openssl_verify($input, $signature, $key, OPENSSL_ALGO_SHA512);
			default:
				throw new Exception("Unsupported or invalid signing algorithm.");
		}
	}

	private static function sign($input, $key, $algo)
	{
		switch ($algo) {
			case 'HS256':
				return hash_hmac('sha256', $input, $key, true);
			case 'HS384':
				return hash_hmac('sha384', $input, $key, true);
			case 'HS512':
				return hash_hmac('sha512', $input, $key, true);
			case 'RS256':
				return JWT::generateRSASignature($input, $key, OPENSSL_ALGO_SHA256);
			case 'RS384':
				return JWT::generateRSASignature($input, $key, OPENSSL_ALGO_SHA384);
			case 'RS512':
				return JWT::generateRSASignature($input, $key, OPENSSL_ALGO_SHA512);
			default:
				throw new Exception("Unsupported or invalid signing algorithm.");
		}
	}

	private static function generateRSASignature($input, $key, $algo)
	{
		if (!openssl_sign($input, $signature, $key, $algo)) {
			throw new Exception("Unable to sign data.");
		}
		return $signature;
	}

	private static function urlSafeB64Encode($data)
	{
		$b64 = base64_encode($data);
		$b64 = str_replace(array('+', '/', '\r', '\n', '='),
			array('-', '_'),
			$b64);
		return $b64;
	}

	private static function urlSafeB64Decode($b64)
	{
		$b64 = str_replace(array('-', '_'),
			array('+', '/'),
			$b64);
		return base64_decode($b64);
	}
}