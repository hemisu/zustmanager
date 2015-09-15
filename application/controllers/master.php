<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 19:45
 */
class Master extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id = $this->session->userdata('student_id');
		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False && $this->User_data->user_role($id, 40)) {
			redirect(base_url('login'));
		}

		$this->load->view('admin_index');
	}



}