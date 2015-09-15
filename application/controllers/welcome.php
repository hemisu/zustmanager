<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *    http://example.com/index.php/welcome
	 *  - or -
	 *    http://example.com/index.php/welcome/index
	 *  - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		echo base_url();
		echo "<br>";
		echo base_url('public/images/');
		echo QINIUYUN;
		$this->load->view('welcome_message');
	}

	public function error()
	{
		$this->load->view('part/error');
	}

	public function success()
	{
		$this->load->view('part/success');
	}

	public function sendmessage()
	{
		$this->load->model('User_data'); //加载User_data模块
		$this->User_data->sent_message('1130320108', '1130320106', 'testidi1nd');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */