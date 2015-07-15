<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 19:45
 */
class Msg extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function send()
    {
        $toid = $this->input->post('toid');//获取POST数据
        $fromid = $this->input->post('fromid');
        $text = $this->input->post('text');
        $current_url = $this->input->post('current_url');//获取来源地址

        $this->load->model('User_data'); //Load user data model
        if($this->User_data->sent_message($toid,$fromid,$text)){
            header("refresh:2;url=$current_url");
            $this->load->view('part/success');
        }else{
            echo "发送失败";
        }

    }


}