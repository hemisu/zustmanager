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
		if ($this->User_data->is_login() !== False) {
			redirect(base_url('user/profile'));
		}
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
		$data = array();
		if ($this->form_validation->run() !== FALSE) {
			$id = $this->input->post('user_id');//获取POST数据 学号
			$password = $this->input->post('password');//密码

			if ($this->User_data->user_exist($id, $password) == true) //判断是否存在用户
			{

				$userinfo = $this->User_data->userinfo($id);//读取用户数据

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
				$this->db->from('user')->where('student_id', $id)->update('user', $logindate);//更新用户登陆时间

				$log = array(
					'student_id' => $userinfo['student_id'],
					'username' => $userinfo['username'],
					'events' => '登陆',
					'time' => date("Y-m-d H:i:s")
				);
				$this->db->insert('log', $log);//记录事件 登陆

				/*              print_r($userinfo);//用户数据调出 调试用
												echo "<hr>";
												echo $this->session->userdata('username');
												echo "<hr>";
												echo "查询到此人";
												echo date("Y-m-d H:i:s");*/

				redirect(base_url('/user/profile'));//登陆成功并且跳转

			} else {
				$data['error'] = "账号或密码输入错误";
			}
		}
		$this->load->view('login', $data);
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

		redirect(base_url('/login'));
	}



//    public function error($note = null){//错误提示
//        $data['error'][] = "$note";
//        $this->load->view('part/error',$data);
//
//    }
//    public function success($note = null){//错误提示
//        $data['success'][] = "$note";
//        header("refresh:2;url=$current_url");
//
//    }

}