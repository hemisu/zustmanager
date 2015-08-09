<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/8
 * Time: 15:07
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><?=$userinfo['username']?>用户资料 - 学生管理系统</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css"/>

    <script src="<?php echo base_url(); ?>js/demo-rtl.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/nanoscroller.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/compiled/theme_styles.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/magnific-popup.css">

    <link type="image/x-icon" href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon"/>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<div id="theme-wrapper">
    <?php require_once('part/temple_header.php');//header样式个性设置?>
    <div id="page-wrapper" class="container nav-small">
        <?php require_once('part/temple_navbar.php');//navbar样式个性设置?>

        <div id="content-wrapper">
            <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><a href="#">主页</a></li>
                            <li><a href="<?echo base_url('user/all')?>">用户</a></li>
                            <li class="active"><span>资料</span></li>
                        </ol>
                        <h1>用户资料</h1>
                    </div>
                </div>
            <div class="row" id="user-profile">
            <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2><?echo $userinfo['username'];//受访者名字?></h2>
                </header>
                <div class="main-box-body clearfix">
                    <div class="profile-status">
                        <?
                        if($userinfo['status']){
                            echo "<i class='fa fa-circle'></i> Online";
                        }else{
                            echo "<div style='color:#95A5A6;'><i class='fa fa-circle'></i> Offline</div>";
                        }

                        ?>

                    </div>
                    <img src="<?$head_img = "public/images/".$userinfo['head_img'];echo base_url("$head_img");?>" alt=""
                         class="profile-img img-responsive center-block"/>

                    <div class="profile-label">
                        <span class="label label-danger">
                            <?php
                            switch ($userinfo['role_id'])
                            {
                                case 10:
                                    echo "班委";
                                    break;
                                case 20:
                                    echo "学委";
                                    break;
                                case 30:
                                    echo "团支书";
                                    break;
                                case 40:
                                    echo "班长";
                                    break;
                                case 50:
                                    echo "管理员";
                                    break;
                                default:
                                    echo "会员";
                            }
                            ?>
                        </span>
                    </div>
                   <!-- <div class="profile-stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <span>Super User</span>
                    </div>-->
                    <!--                                        <div class="profile-since">-->
                    <div class="profile-details">
                        <ul class="fa-ul">
                            <li><i class="fa-li fa fa-chevron-right"></i><strong>学号:</strong>
                                <?echo $userinfo['student_id'];?></li>
                            <li><i class="fa-li glyphicon glyphicon-user"></i><strong>性别:</strong>
                                <? if($userinfo['sex']){echo "男";}else{echo "女";}?></li>
                            <li><i class="fa-li fa fa-graduation-cap"></i><strong>专业:</strong>
                                <?echo $userinfo['major'];?></li>
                            <li><i class="fa-li fa fa-users"></i><strong>班级:</strong>
                                <?echo $userinfo['major'].$userinfo['classnum'];?></li>
                            <li><i class="fa-li fa fa-qq"></i><strong>QQ:</strong>
                                <?if($userinfo['qq']){echo $userinfo['qq'];}else{echo "请尽快添加qq号";}?></li>
                            <li><i class="fa-li fa fa-phone"></i><strong>短号:</strong>
                                <?echo $userinfo['short_phone'];?></li>
                            <li><i class="fa-li fa fa-mobile-phone"></i><strong>长号:</strong>
                                <?echo $userinfo['long_phone'];?></li>
                            <li><i class="fa-li glyphicon glyphicon-paperclip"></i><strong>Email:</strong>
                                <?if($userinfo['email']){echo $userinfo['email'];}else{echo "请尽快添加email";}?></li>
                            <li><i class="fa-li fa fa-calendar"></i><strong>最后登陆时间:</strong>
                                <?echo $userinfo['lastLoginTime'];?></li>
                        </ul>
                    </div>
                   <!-- <div class="profile-details">
                        <ul class="fa-ul">
                            <li><i class="fa-li fa fa-truck"></i>Orders: <span>456</span></li>
                            <li><i class="fa-li fa fa-comment"></i>Posts: <span>828</span></li>
                            <li><i class="fa-li fa fa-tasks"></i>Tasks done: <span>1024</span></li>
                        </ul>
                    </div>-->
                    <div class="profile-message-btn center-block text-center">
                        <!--<a href="#mydata" class="btn btn-success">
                            <i class="fa fa-cog"></i>
                            修改资料
                        </a>-->
                        <a href="#" class="btn btn-success">
                            <i class="fa fa-envelope"></i>
                            发送消息
                        </a>
                    </div>
                </div>
            </div>
            </div>
                <div class="col-lg-9 col-md-8 col-sm-8">

                    <div class="main-box clearfix">
                        <div class="tabs-wrapper profile-tabs">
                            <ul class="nav nav-tabs">
                                <!--<li class="active"><a href="#tab-newsfeed" data-toggle="tab">Newsfeed</a>
                                </li>
                                <li><a href="#tab-activity" data-toggle="tab">Activity</a></li>
                                <li><a href="#tab-friends" data-toggle="tab">Friends</a></li>-->
                                <li class="active"><a href="#tab-chat" data-toggle="tab">聊天</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane in active" id="tab-chat">
                                    <div class="conversation-wrapper">
                                        <div class="conversation-content">
                                            <div class="conversation-inner">
                                            <?
                                            $query = $this->User_data->message( $this->session->userdata('student_id') ); //msg query
                                            if ($query->num_rows() > 0)
                                            {
                                                foreach ( $query->result() as $row)
                                                {
                                                    $msguserfrom = $this->User_data->userinfo( $row->fromid );
                                                    if($row->fromid == $userinfo['student_id']||$row->toid == $userinfo['student_id']) {
                                                        ?>

                                                        <div
                                                            class="conversation-item <?if ($row->fromid != $userinfo['student_id']) {
                                                                echo "item-right";
                                                            } else {
                                                                echo "item-left";
                                                            } ?> clearfix">
                                                            <div class="conversation-user">
                                                                <img style="width:50px;"
                                                                     src="<?$head_img = "public/images/" . $msguserfrom['head_img'];
                                                                     echo base_url("$head_img"); ?>" alt="">
                                                            </div>
                                                            <div class="conversation-body">
                                                                <div class="name">
                                                                    <?echo $msguserfrom['username']; ?> <!--发送信息者名字-->
                                                                </div>
                                                                <div class="time hidden-xs">
                                                                    <?echo $row->date; ?>
                                                                </div>
                                                                <div class="text">
                                                                    <?echo $row->content; ?> <!--信息内容-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?
                                                    }
                                                }
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="conversation-new-message">
                                            <form method="post" action="<?echo base_url('msg/send')?>">
                                                <input type="hidden" name="current_url" value="<?=current_url();?>">
                                                <input type="hidden" name="toid" value="<?=$userinfo['student_id']?>">
                                                <input type="hidden" name="fromid" value="<?=$this->session->userdata('student_id')?>">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="2" name="text" placeholder="发信息给<?=$userinfo['username']?>..."></textarea>
                                                </div>
                                                <div class="clearfix">
                                                    <button type="submit" class="btn btn-success pull-right">Send message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
                <?php require_once('part/temple_footer.php');//footer样式个性设置?>
            </div>
        </div>
</div>

<?php require_once('part/temple_config_tool.php');//右侧样式个性设置?>

<script src="<?php echo base_url(); ?>js/demo-skin-changer.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url(); ?>js/demo.js"></script>


<script src="<?php echo base_url(); ?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.magnific-popup.min.js"></script>

<script src="<?php echo base_url(); ?>js/scripts.js"></script>
<script src="<?php echo base_url(); ?>js/pace.min.js"></script>


</body>
</html>