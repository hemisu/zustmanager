<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hekunyu
 * Date: 15/8/9
 * Time: 下午8:52
 */
class Task extends CI_Controller
{

	function __construct()
	{
		header("Content-Type:text/html;charset=utf-8");
		parent::__construct();
		$this->load->model('User_data'); //加载User_data模块
		$this->load->helper('url');
	}

	public function index()
	{
		redirect(base_url('task/zc'));
	}
	public function zc($step = 'index')
	{
		switch ($step) {
			case 'index':
				if ($this->User_data->is_login() == False) {
					redirect(base_url('login'));
				}
				$id = $this->session->userdata('student_id');


				$data['userinfo'] = $this->User_data->userinfo($id);

				$this->load->view('task_zc', $data);
				break;
			case '1':
				if ($this->User_data->is_login() == False) {
					redirect(base_url('login'));
				}
				$id = $this->session->userdata('student_id');
				$username = $this->session->userdata('username');
				$major = $this->session->userdata('major');
				$classnum = $this->session->userdata('classnum');
				//初始化$data['zcmasterinfo']$x = (object) array('a'=>'A', 'b'=>'B', 'C');
				if($this->db->select('*')->from('zc')->where('student_id', $id)->get()->num_rows()){
					//获取数据
					$data['zcmasterinfo'] = $this->db->select('*')->from('zc')->where('student_id', $id)->get()->row();
				}else{
					//无数据则插入一条空白row
					$studata= array(
						'student_id'=>$id,
						'username'=>$username,
						'major'=>$major,
						'classnum'=>$classnum,
					);
					if($this->db->insert('zc', $studata)) {
						//插入信息成功后，获取数据
						$data['zcmasterinfo'] = $this->db->select('*')->from('zc')->where('student_id', $id)->get()->row();
					}
				};
				$data['zcgx'] = $this->db->select('*')->from('zc_gx')->where('student_id', $id)->get()->result();
				$data['userinfo'] = $this->User_data->userinfo($id);
//echo "<pre>";
//print_r($data['zcmasterinfo']);
				$this->load->view('task_zc_post', $data);
				break;
			//综测详细信息
			case 'sid':
				if ($this->User_data->is_login() == False) {
					redirect(base_url('login'));
				}
				$zcid = $this->uri->segment(4, 0);
				$zcidinfo = $data['zcidinfo'] = $this->db->from('zc')->where('student_id',$zcid)->get()->result_array();
				$data['zcidinfogx'] = $this->db->from('zc_gx')->where('student_id',$zcid)->get()->result();
				$this->load->view('task_zc_sid', $data);
//				print_r($zcidinfo[0]);
//				echo "<pre>";
//				reset($zcidinfo[0]);
//				while (list($key, $val) = each($zcidinfo[0])) {
//					echo "$key => $val\n";
//				}
				break;
			default:
				break;
		}
	}

	/**
	 * 返校统计班长提交
	 */
	public function backschool(){
		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
		$major = $this->session->userdata('major');//电气
		$classnum = $this->session->userdata('classnum');//134

		$data['userinfo'] = $this->User_data->userinfo($id);
		$data['allnum'] = $this->db->select('student_id,major,classnum')->from('user')->where('major', $major)->where('classnum', $classnum)->get()->num_rows();
		$data['tuzhong'] = $this->db->select('*')->from('backschool')->where('status', '途中')->where('major', $major)->where('classnum', $classnum)->get()->num_rows();
		$data['weilianxishang'] = $this->db->select('*')->from('backschool')->where('status', '未联系上')->where('major', $major)->where('classnum', $classnum)->get()->num_rows();
		$data['qingjia'] = $this->db->select('*')->from('backschool')->where('status', '请假')->where('major', $major)->where('classnum', $classnum)->get()->num_rows();
		$data['backinfo'] = $this->db->select('*')->from('backschool')->where('major', $major)->where('classnum', $classnum)->get()->result();
		$this->load->view('task_zc_backschool', $data);
	}

	/**
	 * 综合测评 班长提交学生信息
	 */
	public function master()
	{
		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
		$major = $this->session->userdata('major');//电气
		$classnum = $this->session->userdata('classnum');//134

		$data['userinfo'] = $this->User_data->userinfo($id);
		$data['zcmasterinfo'] = $this->db->select('student_id, gk ,ztyxf')->from('zc')->where('major', $major)->where('classnum', $classnum)->get()->result();
		$data['zcmasterclass'] = $this->db->select('xtyxfb, xylxfb, yylxfb, xxjtzb')->from('zc')->where('student_id', $id)->get()->row();
		$this->load->view('task_zc_master', $data);

	}

	/**
	 * 综测总数据表格
	 * 管理员和班长查看？还是条件选择？
	 */
	public function tlist()
	{

		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 1)) {
			redirect(base_url('login'));
		}
		$major = $this->session->userdata('major');//电气
		$classnum = $this->session->userdata('classnum');//134
//		where('major', $major)->where('classnum', $classnum)->
		$data['userinfo'] = $this->User_data->userinfo($id);

		$data['zclist'] = $this->db->select('*')->from('zc')->get()->result();

		$this->load->view('task_zc_list', $data);

	}

	public function post()
	{
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');
		$username =  $this->session->userdata('username');

		$data['userinfo'] = $this->User_data->userinfo($id);
		$data['deyu'] = $this->input->post('deyu');
		$data['xy'] = $this->input->post('xy');
		$data['nl'] = $this->input->post('nl');
		$data['gx'] = $this->input->post('gx');

		$dysum = 0;//德育总分初始化
		foreach ($data['deyu'] as $key => $val) {
			//计算公式 德育总分=（总体印象分*70%+30分）*0.15
			if ($key == 'ztyxf') {
				$dysum += $val * 0.7 * 0.15;
			} else {
				if ($key != 'beizhu') {
					$dysum += $val * 0.15;
				}
			}
		}
		if ($dysum >= 15) {
			$dysum = 15;
		}//防止德育分溢出
		$data['dysum'] = $dysum;//德育总分输出

		if($data['nl']['xsbg']>=0.6){$data['nl']['xsbg']=0.6;}//学术报告最多3场

		//数据库操作开始
		$zcPostDb = $data['deyu'];
		$zcPostDb['student_id']=$id;
		foreach($data['xy'] as $key=>$val){
			//学业插入
			$zcPostDb["$key"] = $val;
		}
		foreach($data['nl'] as $key=>$val){
			//能力插入
			$zcPostDb["$key"] = $val;
		}
		unset($zcPostDb['xfbtzb']);//去除优良学风班、先进团支部 由班长填写加入

		$this->db->where('student_id', $id);
		$query=$this->db->select('student_id')->from('zc')->where('student_id', $id);
		$zcex = $query->get()->num_rows();//对该学生记录查询

		if($zcex){//如果该学生存在记录
			$this->db->where('student_id', $id);
			$this->db->update('zc', $zcPostDb);
		}else{
			$this->db->insert('zc', $zcPostDb);
		}

		//插入个性栏数据
		foreach($data['gx'] as $val){
			if (!empty($val['xmname'])) {
				if (is_array($val)) {
					$val['student_id'] = $id;
					$val['username'] = $username;
					$this->db->insert('zc_gx', $val);
				}
			}
		}

		$data['zcgx'] = $this->db->select('*')->from('zc_gx')->where('student_id', $id)->get()->result();
		//获取该学生个性数据
		$gxsum = 0;//个性总分初始化
		$cxlsum= 0;//创新类
		$cylsum= 0;//才艺类
		foreach($data['zcgx'] as $val){
			switch($val->lb){
				case "a":
					$l=1;
					$cxlsum +=$val->sorce * $l;//创新类分类加分
					break;
				case "b":
					$l=0.7;
					$cxlsum +=$val->sorce * $l;//创新类分类加分
					break;
				case "c":
					$l=0.5;
					$cxlsum +=$val->sorce * $l;//创新类分类加分
					break;
				case "cxlqt":
					$l=1;
					$cxlsum +=$val->sorce * $l;//创新类分类加分
					break;
				case "cy":
					$l=1;
					$cylsum +=$val->sorce * $l;//才艺类分类加分
					break;
				case "ty":
					$l=1;
					$cylsum +=$val->sorce * $l;//才艺类分类加分
					break;
				case "gxyb":
					$l=1;
					$cylsum +=$val->sorce * $l;//才艺类分类加分
					break;
				case "gxydh":
					$l=1;
					$cylsum +=$val->sorce * $l;//才艺类分类加分
					break;
			}
			$gxsum += $val->sorce * $l;
		}
		if ($gxsum >= 40) {
			$gxsum = 40;
		}//防止个性分溢出
		$data['gxsum'] = $gxsum;//个性总分输出

		$gxfdata = array(
			'cxlsum' => $cxlsum,
			'cylsum' => $cylsum,
		);
		$this->db->where('student_id', $id)->update('zc', $gxfdata);//输入个性分

		$log = array(
			'student_id' => $this->session->userdata('student_id'),
			'username' => $this->session->userdata('username'),
			'events' => "提交综合测评数据",
			'time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('log', $log);//记录事件 登出

		$this->load->view('task_zc_status', $data);
	}

	/**
	 * @param null $gxid 个性中的ID
	 * 删除综测中个性项目
	 */
	public function gxdel($gxid =null)
	{
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$this->db->where('id', $gxid);
		if($this->db->delete('zc_gx')){
			redirect(base_url('task/zc/1'));
		}
	}

	/**
	 * 返校统计提交
	 */
	public function postbackschool(){
		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
		$backschool = $this->input->post('backschool');
		$log = array(
			'student_id' => $this->session->userdata('student_id'),
			'username' => $this->session->userdata('username'),
			'events' => '提交返校信息',
			'time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('log', $log);//记录事件
		foreach($backschool as $key=>$val){
			$query=$this->db->select('student_id,username')->from('user')->where('student_id', $backschool["$key"]['student_id'])->limit(1)->get();
			$row = $query->first_row('object');
			$val['username']=$row->username;

			$query=$this->db->select('student_id')->from('backschool')->where('student_id', $backschool["$key"]['student_id']);
			$num = $query->get()->num_rows();
			if($num){//如果该学生存在记录
				$this->db->where('student_id', $backschool["$key"]['student_id']);
				$this->db->update('backschool', $val);
//				$sucinfo['success'][] = "更新".count($backschool)."位同学数据";
//				$this->load->view('part/success', $sucinfo);
			}else{
				$this->db->insert('backschool', $val);
//				$sucinfo['success'][] = "添加".count($backschool)."位同学数据";
//				$this->load->view('part/success', $sucinfo);
			}
		}
		redirect(base_url('task/backschool'));
//		echo '<pre>';
//		print_r($backschool);
	}

	public function backschooldel($bid)
	{
		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
		$this->db->where('student_id', $bid);
		if($this->db->delete('backschool')){
			$log = array(
				'student_id' => $this->session->userdata('student_id'),
				'username' => $this->session->userdata('username'),
				'events' => "删除".$bid."的返校信息",
				'time' => date("Y-m-d H:i:s")
			);
			$this->db->insert('log', $log);//记录事件 登出
			redirect(base_url('task/backschool'));
		}
	}
	/**
	 * 班长提交综测信息
	 */
	public function postmaster()
	{
		$id = $this->session->userdata('student_id');
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}
//        echo 'postmaster';
		$zcmaster = $this->input->post('zcmaster');
		$major = $this->session->userdata('major');//电气
		$classnum = $this->session->userdata('classnum');//134

//		echo "<pre>";
//        print_r($zcmaster);
		foreach($zcmaster as $key=>$val){
			$query=$this->db->select('student_id')->from('zc')->where('student_id', $zcmaster["$key"]['student_id']);
			$num = $query->get()->num_rows();
			if($num){//如果该学生存在记录
				$this->db->where('student_id', $zcmaster["$key"]['student_id']);
				$this->db->update('zc', $val);
			}else{
				$this->db->insert('zc', $val);
			}
		}
		$sucinfo['success'][] = "更新".count($zcmaster)."位同学数据";
		$this->load->view('part/success', $sucinfo);
//		$this->db->trans_start();
//		if ($ifex) {
//			$this->db->update_batch('zc', $zcmaster, 'student_id');
//			echo "数据更新成功";
//		} else {
//			$this->db->insert_batch('zc', $zcmaster);
//
//			echo "数据插入成功";
//		}
//		$this->db->trans_complete();
		$ry = $this->input->post('ry');
//		print_r($ry);
		if ($ry) {
			$this->db->where('major', $major)->where('classnum', $classnum)->update('zc', $ry);//更新班级荣誉

		}
		$log = array(
			'student_id' => $this->session->userdata('student_id'),
			'username' => $this->session->userdata('username'),
			'events' => '班长提交班级综测信息',
			'time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('log', $log);//记录事件 登出
//		$current_url = $this->input->post('current_url');
//		echo "<br /><a href='" . $current_url . "'>返回</a>";
	}

}
