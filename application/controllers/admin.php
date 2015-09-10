<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 19:45
 */
class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id = $this->session->userdata('student_id');
		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 50)) {
			redirect(base_url('login'));
		}
		$this->load->view('admin_index');
	}
	public function log($offset = null)
	{
		$id = $this->session->userdata('student_id');
		$this->load->library('pagination');
		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 50)) {
			redirect(base_url('login'));
		}
		$offset = $this->uri->segment(3, 0);
		$data['adminlog'] = $this->db->from('log')->order_by("id", "desc")->limit(25,$offset)->get()->result();

		$this->load->view('admin_log', $data);
	}
	public function backschool()
	{
		$id = $this->session->userdata('student_id');
		$this->load->library('pagination');
		$this->load->model('User_data'); //Load user data model
		if ($this->User_data->is_login() == False || $this->User_data->user_role($id, 50)) {
			redirect(base_url('login'));
		}
		$data['backinfo'] = $this->db->select('*')->from('backschool')->get()->result();

		$this->load->view('admin_backschool',$data);


//		$this->db->select('major,classnum')->distinct('classnum')->group_by(array("major", "classnum")); ;
//		$query=$this->db->get('user');
//		$arr = $query->result();

	}


}