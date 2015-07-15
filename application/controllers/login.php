<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/2
 * Time: 18:48
 */
class Login extends CI_Controller
{

    function __construct()
    {
        header("Content-Type:text/html;charset=utf-8");
        parent::__construct();//继承父级
        $this->load->model('User_data'); //加载User_data模块

    }



    public function index()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', '学号', 'required');//对提交的单表验证
        $this->form_validation->set_rules('password', '密码', 'required');
        $this->form_validation->set_message('required', '必须填写%s');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>错误！</strong>', '</div>');

        //表单验证
        $data = array();//初始化传递的值 防止报错
        //判断登陆并且跳转到user_profile页面
        if($this->User_data->is_login() !== False){
            redirect( base_url('user/profile') );
        }


        if ($this->form_validation->run() !== FALSE) {
            $id = $this->input->post('user_id');//获取POST数据
            $password = $this->input->post('password');

            if($this->User_data->user_login( $id , $password )->num_rows == 1 ) //Access database
            {

                $userinfo=$this->User_data->userinfo( $id );
                //读取用户数据
                $userinfo = array(
                    'username'   => $userinfo['username'],
                    'student_id' => $userinfo['student_id'],
                    'head_img'   => $userinfo['head_img'],
                    'email'      => $userinfo['email'],
                    'qq'         => $userinfo['qq'],
                );
                //将用户数据写入session
                $this->session->set_userdata($userinfo);

                $logindate = array(
                    'status' => "1",
                    'lastLoginTime' => date("Y-m-d H:i:s")
                );
                //更新用户登陆时间
                $this->db->from('user')->where('student_id' , $id)->update('user', $logindate);
                //记录事件
                $log = array(
                    'student_id' => $userinfo['student_id'],
                    'username'   => $userinfo['username'],
                    'events'   => '登陆',
                    'time' => date("Y-m-d H:i:s")
                );
                $this->db->insert('log', $log);

/*                print_r($userinfo);//用户数据调出 调试用
                echo "<hr>";
                echo $this->session->userdata('username');
                echo "<hr>";
                echo "查询到此人";
                echo date("Y-m-d H:i:s");*/

                redirect( base_url('/user/profile') );//登陆成功并且跳转

            }else{
                $data['error'] = "账号或密码输入错误";
            }
        }
        $this->load->view('login',$data);
    }

    public function loginout(){//退出登陆
        $id = $this->session->userdata('student_id');
        //更新在线状态和最后登出时间
        $data = array(
            'status' => "0",
            'lastLoginoutTime' => date("Y-m-d H:i:s")
        );

        $this->db->from('user')->where('student_id' , $id)->update('user', $data);
        $this->session->sess_destroy();

        redirect( base_url('/login') );
    }


    public function update_self(){//个人资料修改

        $current_url = $this->input->post('current_url');//获取来源地址

        $qq = $this->input->post('qq');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password1 = $this->input->post('password1');

        $id = $this->session->userdata('student_id');//从session获取学生学号


        if ($qq) {//表单验证通过 修改QQ和EMAIL

            $data = array(
                'qq' => $qq
            );

            $this->db->from('user')->where('student_id', $id)->update('user', $data);
            $data['error'] = "QQ修改成功<br />";


        }
        if ($email) {//表单验证通过 修改QQ和EMAIL

            $data = array(
                'email' => $email
            );

            $this->db->from('user')->where('student_id', $id)->update('user', $data);
            $data['error'] = "email修改成功<br />";


        }
        if($password&&$password1){//是否修改密码
            if($password==$password1){
                $data = array(
                    'password' => $password
                );
                $this->db->from('user')->where('student_id', $id)->update('user', $data);
                $data['error'] = "密码修改成功，请重新登陆<br />";
                $this->session->sess_destroy();

            }
        }
        header("refresh:2;url=$current_url");
        $this->load->view('part/success',$data);
    }

    public function head_img()
    {
        $id = $this->session->userdata('student_id');//获取学生ID

        $config['upload_path'] = 'public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '800';
        $config['max_height']  = '600';
        $config['file_name'] = $id;
        $config['overwrite']  = True;
        $current_url = $this->input->post('current_url');//获取来源地址

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            header("refresh:3;url=$current_url");
            $data['error'] = "上传图片有误 不能大于800*600且为gif|jpg|png格式";
            $this->load->view('part/error',$data);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //echo $data['upload_data']['file_path'];

            $this->User_data->head_img($id,$data['upload_data']['file_name']);

           // print_r($data);
            redirect($current_url, 'refresh');
        }
    }

    public function error($note = null){//错误提示
        $data['error'] = "$note";
        $this->load->view('part/error',$data);

    }
    public function success($note = null){//错误提示
        $data['success'] = "$note";
        header("refresh:2;url=$current_url");

    }

}