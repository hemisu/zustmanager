<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 15:16
 */
$this->load->model('User_data'); //加载User_data模块

$head_id = $this->session->userdata('student_id');//从session处获得登陆者信息
if($this->User_data->is_login() == False){
    redirect( base_url('login') );
}
$head_userinfo=$this->User_data->userinfo( $head_id );//登陆者信息


?>
<script src="<?php echo base_url(); ?>js/modernizr.custom.js"></script>
<script src="<?php echo base_url(); ?>js/classie.js"></script>
<script src="<?php echo base_url(); ?>js/modalEffects.js"></script>
<header class="navbar" id="header-navbar">
    <div class="container">
        <a href="index.html" id="logo" class="navbar-brand">
            <img src="<?php echo base_url(); ?>img/logo.png" alt="" class="normal-logo logo-white"/>
            <img src="<?php echo base_url(); ?>img/logo-black.png" alt="" class="normal-logo logo-black"/>
            <img src="<?php echo base_url(); ?>img/logo-small.png" alt=""
                 class="small-logo hidden-xs hidden-sm hidden"/>
        </a>

        <div class="clearfix">
            <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                <ul class="nav navbar-nav pull-left">
                    <li>
                        <a class="btn" id="make-small-nav">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-no-collapse pull-right" id="header-nav">
                <ul class="nav navbar-nav pull-right">
                    <li class="mobile-search">
                        <a class="btn">
                            <i class="fa fa-search"></i>
                        </a>

                        <div class="drowdown-search">
                            <form role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="fa fa-search nav-search-icon"></i>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-warning"></i>
                            <span class="count">8</span><!--任务提醒计数-->
                        </a>
                        <ul class="dropdown-menu notifications-list">
                            <li class="pointer">
                                <div class="pointer-inner">
                                    <div class="arrow"></div>
                                </div>
                            </li>
                            <li class="item-header">您目前有2个待办事项</li>
                            <li class="item">
                                <a href="#">
                                    <i class="fa fa-comment"></i>
                                    <span class="content">13级2015年暑假留校申请</span>
                                    <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <i class="fa fa-plus"></i>
                                    <span class="content">奖学金评定</span>
                                    <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                </a>
                            </li>
                            <li class="item-footer">
                                <a href="#">
                                    查看所有的待办事项
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="count">2</span>
                        </a>
                        <ul class="dropdown-menu notifications-list messages-list">
                            <li class="pointer">
                                <div class="pointer-inner">
                                    <div class="arrow"></div>
                                </div>
                            </li>
                            <?
                            $query = $this->User_data->header_message( $head_id ); //msg query 获取有关于登陆者的信息
                            if ($query->num_rows() > 0)
                            {
                                foreach ( $query->result() as $row)
                                {
                                    $msguserfrom = $this->User_data->userinfo( $row->from );//获取msg来源者的个人信息
                                    if($row->from != $head_userinfo['student_id']) {
                                        ?>
                                <li class="item">
                                    <a href="<?$usersid = "user/sid/".$msguserfrom['student_id'];echo base_url("$usersid");//跳转到用户页?>">
                                        <img style="width:35px;"
                                             src="<?$head_img = "public/images/" . $msguserfrom['head_img'];
                                             echo base_url("$head_img");?>" alt=""/><!--发送信息者头像-->
                                        <span class="content">
                                            <span class="content-headline">
                                            <?echo $msguserfrom['username'];?> <!--发送信息者名字-->
                                            </span>
                                            <span class="content-text">
                                            <?echo $row->content;?> <!--信息内容-->
                                            </span>
                                        </span>
                                        <span class="time"><i
                                                class="fa fa-clock-o"></i><?echo $row->date;?></span>
                                    </a>
                                </li>
                                    <?
                                    }
                                }
                            }
                            ?>

                            <li class="item-footer">
                                <a href="#">
                                    查看所有的消息
                                </a>
                            </li>
                        </ul>
                    </li>
<!--                    <li class="hidden-xs">
                        <a class="btn">
                            <i class="fa fa-cog"></i>
                        </a>
                    </li>-->
                    <li class="dropdown profile-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?$head_img = "public/images/".$head_userinfo['head_img'];echo base_url("$head_img");?>" alt=""/>
                            <span class="hidden-xs"><?echo $head_userinfo['username'];//登陆者名字?></span> <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('user/profile'); ?>"><i class="fa fa-user"></i>个人中心</a></li>
                            <!--<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>-->
                            <li><a data-toggle="modal" href="#mydata"><i class="fa fa-cog"></i>修改资料</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>消息</a></li>
                            <li><a href="<?php echo base_url('login/loginout'); ?>"><i class="fa fa-power-off"></i>登出</a></li>
                        </ul>
                    </li>
                    <li class="hidden-xxs">
                        <a class="btn" href="<?php echo base_url('login/loginout'); ?>">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="modal fade" id="mydata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">修改资料</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('/login/update_self');?>" method="post">
                    <div class="form-group">

                        <label for="exampleInputEmail1">邮箱</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="请输入邮箱" value="<?echo $head_userinfo['email'];//登陆者邮箱?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">QQ号</label>
                        <input type="text" class="form-control" name="qq" id="exampleInputQQ" placeholder="请输入QQ" value="<?echo $head_userinfo['qq'];//登陆者QQ?>">
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label for="maskedSsn">密码</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control" id="maskedSsn" name="password" type="password">
                            </div>
                            <span class="help-block">ps. 如不修改密码，请留空</span>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="maskedSsn">重复密码</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control" id="maskedSsn" name="password1" type="password">
                            </div>
                        </div>
                    </div>
                    <?php echo validation_errors(); ?>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="current_url" value="<?=current_url();?>">
                <button type="submit" class="btn btn-primary">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
            </form>
        </div>
    </div>
</div>
