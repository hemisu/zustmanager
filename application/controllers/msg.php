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

    public function send($toid = null ,$fromid = null ,$text = null)
    {
        $this->load->model('User_data'); //Load user data model
        $this->User_data->sent_message( $toid = null ,$fromid = null ,$text = null);
    }


}