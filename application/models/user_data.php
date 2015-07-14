<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 13:39
 */
class User_data extends CI_Model
{
    function user_login( $id = null , $password = null )
    {
        $this->db->select('*')->from('user')->where('student_id' , $id)->where('password' , $password)->limit(1); //Create query command
        $query = $this->db->get(); //Process query
        return $query; //Return a number to make sure user is exist and password is correct
    }
    function is_login()
    {
        if ($this->session->userdata('username')){
            return TRUE;
        }else{
            return False;
        }
    }
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

/*用户权限
输入：学号,要求权限(大于等于)
输出：满足条件，返回FALSE
    50 管理员|40 班长|30 团支书|20 学委|10 班委|1 会员|
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
        $this->db->select('*')->from('msg','msgcontent')->where( 'to' , $id)->or_where( 'from' , $id)->join('msgcontent', 'msgcontent.id = msg.msgid')->limit(5); //Create query command
        $query = $this->db->get(); //Process query
        return $query;
    }
    function message( $toid = null , $fromid = null){//msg信息获取
        $this->db->select('*')->from('msg','msgcontent')->where( 'to' , $toid)->where( 'from' , $fromid)->join('msgcontent', 'msgcontent.id = msg.msgid')->limit(5); //Create query command
        $query = $this->db->get(); //Process query
        return $query;
    }

    function sent_message( $toid = null ,$fromid = null ,$text = null){//msg发送
        $data = array(
            'content' => $text
        );
        $this->db->insert('msgcontent', $data);
        $query = $this->db->query('SELECT LAST_INSERT_ID()');
        $result=mysql_query($query);
        $rows=mysql_fetch_row($result);
        echo $rows[0];
        $data = array(
            'to' => $toid ,
            'from' => $fromid ,
            'msgid' => $rows[0]
        );

        $this->db->insert('msg', $data);
        return true;
    }
}