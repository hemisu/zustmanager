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
        parent::__construct();
        $this->load->model('User_data'); //加载User_data模块
    }

    public function index()
    {
        $this->load->model('User_data'); //Load user data model
        if($this->User_data->is_login() == False){
            redirect( base_url('login') );
        }
        $id = $this->session->userdata('student_id');

        $data['userinfo']=$this->User_data->userinfo( $id );

        $this->load->view('user_profile',$data);
    }
}