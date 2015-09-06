<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 19:45
 */
class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_data'); //加载User_data模块
	}

	public function update_self()
	{//个人资料修改

		$current_url = $this->input->post('current_url');//获取来源地址
		$qq = $this->input->post('qq');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password1 = $this->input->post('password1');

		$id = $this->session->userdata('student_id');//从session获取学生学号

		$data['success'] = array();//初始化成功信息

		if ($email) {
			$insert = array(
				'email' => $email
			);
			if ($this->db->from('user')->where('student_id', $id)->update('user', $insert)) {
				$log = array(
					'student_id' => $this->session->userdata('student_id'),
					'username' => $this->session->userdata('username'),
					'events' => '修改EMAIL',
					'time' => date("Y-m-d H:i:s")
				);
				$this->db->insert('log', $log);//记录事件 登出
				$data['success'][] = "email修改成功";
			} else {
				$data['success'][] = "email修改失败";
			}

		}
		if ($qq) {
			$insert = array(
				'qq' => $qq
			);
			if ($this->db->from('user')->where('student_id', $id)->update('user', $insert)) {
				$log = array(
					'student_id' => $this->session->userdata('student_id'),
					'username' => $this->session->userdata('username'),
					'events' => '修改QQ',
					'time' => date("Y-m-d H:i:s")
				);
				$this->db->insert('log', $log);//记录事件 登出
				$data['success'][] = "QQ修改成功";
			} else {
				$data['success'][] = "QQ修改失败";
			}
		}
		if ($password && $password1) {//是否修改密码
			if ($password == $password1) {
				$insert = array(
					'password' => $password
				);
				if ($this->db->from('user')->where('student_id', $id)->update('user', $insert)) {
					$log = array(
						'student_id' => $this->session->userdata('student_id'),
						'username' => $this->session->userdata('username'),
						'events' => '修改密码',
						'time' => date("Y-m-d H:i:s")
					);
					$this->db->insert('log', $log);//记录事件

					$data['success'][] = "密码修改成功，请重新登陆";//成功信息
					header("refresh:3;url=$current_url");
					$this->load->view('part/success', $data);
					$this->session->sess_destroy();
				} else {
					$data['success'][] = "密码修改失败";
				}
			}
		}
		header("refresh:3;url=$current_url");
		$this->load->view('part/success', $data);
	}

	public function head_img()//头像修改
	{
		$id = $this->session->userdata('student_id');//获取学生ID

		$config['upload_path'] = 'public/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '800';
		$config['max_height'] = '600';
		$config['file_name'] = $id;
		$config['overwrite'] = True;

		$current_url = $this->input->post('current_url');//获取来源地址
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()) {
			$errinfo['error'] = Array();
			$errinfo['error'][] = "上传图片有误 不能大于800*600且为gif|jpg|png格式";
			header("refresh:3;url=$current_url");
			$this->load->view('part/error', $errinfo);
		} else {
			$sucinfo['success'] = Array();
			$data = array('upload_data' => $this->upload->data());
			//echo $data['upload_data']['file_path'];

			$this->User_data->head_img($id, $data['upload_data']['file_name']);//修改头像地址

			// print_r($data);
			$sucinfo['success'][] = "头像修改完成！";
			header("refresh:3;url=$current_url");
			$this->load->view('part/success', $sucinfo);
		}
	}

	public function sid($id = null)
	{
		$this->load->model('User_data'); //Load user data model

		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}


		$data['userinfo'] = $this->User_data->userinfo($id);

		$this->load->view('user_id', $data);


	}

	public function all()
	{
		$this->load->model('User_data'); //Load user data model
		$this->load->library('pagination');
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');

		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$offset = $this->uri->segment(3, 0);
		$data['alluser']=$this->User_data->userinfo_all(20,$offset)->result();
		$data['userinfo'] = $this->User_data->userinfo($id);

		$this->load->view('user_all', $data);
	}

	public function condensed()
	{
		$id = $this->session->userdata('student_id');

		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 40)) {
		redirect(base_url('login'));
		}


		$data['userinfo'] = $this->User_data->userinfo($id);

		$this->load->view('user_all_condensed', $data);
	}


	public function profile()
	{
		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False) {
			redirect(base_url('login'));
		}
		$id = $this->session->userdata('student_id');

		$data['userinfo'] = $this->User_data->userinfo($id);

		$this->load->view('user_profile', $data);


	}
}