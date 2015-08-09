<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 13:39
 */
class User_data extends CI_Model
{
    /**
     * 判断是否登陆
     * @return bool
     */
    function is_login()
    {
        if ($this->session->userdata('username')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 判断用户是否存在
     * @param null $id 学号
     * @param null $password 密码
     * @return bopl 如果存在此用户 返回TRUE
     */
    function user_exist( $id = null , $password = null )
    {
        $this->db->select('*')->from('user')->where('student_id' , $id)->where('password' , $password)->limit(1);
        $query  = $this->db->get();
        $islogin = $query->num_rows;
        if($islogin){
            return true;
        }else{
            return false;
        }

    }

    /**
     * 用户资料提取
     * @param null $id 学号
     * @return 返回关联数组
     */
    function userinfo( $id = null )
    {
        $this->db->select('*')->from('user')->where('student_id' , $id)->limit(1); //Create query command
        $query = $this->db->get(); //Process query
        if($query->num_rows() == 1)
        {
            return $query->row_array();
        }else{
            return False;
        }
    }

    /**
     * @param null $id 学号
     * @param null $needrole 要求权限(大于等于)
     * @return bool 满足条件，返回FALSE
     * 50 管理员|40 班长|30 团支书|20 学委|10 班委|1 会员|
     */
    function user_role( $id = null , $needrole = null)
    {
        $this->db->select('role_id')->from('user')->where('student_id' , $id)->limit(1); //Create query command
        $query = $this->db->get(); //Process query
        if($query->num_rows() == 1)
        {
            if($query->first_row()->role_id >= $needrole){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    function userinfo_all()
    {
        $this->db->select('*')->from('user'); //Create query command
        $query = $this->db->get(); //Process query
        if($query->num_rows())
        {
            return $query;
        }else{
            return False;
        }
    }

    function head_img( $id = null , $head_img = null ){//头像上传修改
        $data = array(
            'head_img' => $head_img
        );

        if($this->db->from('user')->where('student_id', $id)->update('user', $data))
        {
            return TRUE;
            $userinfo=$this->User_data->userinfo( $id );
            //读取用户数据
            $userinfo = array(
                'head_img'   => $userinfo['head_img']//更新头像地址session
            );
            //将用户数据写入session
            $this->session->set_userdata($userinfo);
        }
    }

    function header_message( $id = null ){//msg信息获取
        $this->db->select('*')->from('msg','msgcontent')->where( 'toid' , $id)->join('msgcontent', 'msgcontent.id = msg.msgid')->order_by("date", "desc")->limit(5); ; //Create query command
        $query = $this->db->get(); //Process query
        return $query;
    }
    function header_message_num( $id = null ){//msg信息获取
        $this->db->select('*')->from('msg','msgcontent')->where( 'toid' , $id)->join('msgcontent', 'msgcontent.id = msg.msgid')->order_by("date", "desc")->limit(5); ; //Create query command
        $query = $this->db->get(); //Process query
        return $query->num_rows();
    }
    function message( $id = null ){//msg信息获取
        $this->db->select('*')->from('msg','msgcontent')->where( 'toid' , $id)->or_where( 'fromid' , $id)->join('msgcontent', 'msgcontent.id = msg.msgid')->order_by("date", "asc"); //Create query command
        $query = $this->db->get(); //Process query
        return $query;
    }


    function sent_message( $toid = null ,$fromid = null ,$text = null){//msg发送
        $data = array(
            'content' => $text
        );
        $this->db->insert('msgcontent', $data);
        $data = array(
            'toid' => $toid ,
            'fromid' => $fromid ,
            'msgid' => $this->db->insert_id(),//获取insert的ID
            'status' => '0',
            'date' => date("Y-m-d H:i:s")
        );

        $this->db->insert('msg', $data);
        return true;
    }
}