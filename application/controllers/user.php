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
    }

    public function sid($id = null)
    {
        $this->load->model('User_data'); //Load user data model

        if($this->User_data->is_login() == False){
            redirect( base_url('login') );
        }


        $data['userinfo']=$this->User_data->userinfo( $id );

        $this->load->view('user_id',$data);


    }

    public function all()
    {
        $this->load->model('User_data'); //Load user data model
        if($this->User_data->is_login() == False){
            redirect( base_url('login') );
        }
        $id = $this->session->userdata('student_id');

        $data['userinfo']=$this->User_data->userinfo( $id );

        $this->load->view('user_all',$data);
    }

    public function condensed()
    {
        $id = $this->session->userdata('student_id');

        $this->load->model('User_data'); //Load user data model
        if($this->User_data->is_login() == False || $this->User_data->user_role( $id ,40)){
            redirect( base_url('login') );
        }


        $data['userinfo']=$this->User_data->userinfo( $id );

        $this->load->view('user_all_condensed',$data);
    }


    public function profile()
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