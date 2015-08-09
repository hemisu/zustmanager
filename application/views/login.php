<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/2
 * Time: 18:47
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>登陆 - 学生管理系统</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap/bootstrap.min.css"/>

    <script src="js/demo-rtl.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/libs/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/libs/nanoscroller.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/compiled/theme_styles.css"/>

    <link type="image/x-icon" href="<?php echo base_url();?>favicon.png" rel="shortcut icon"/>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>js/respond.min.js"></script>
    <![endif]-->

</head>
<body id="login-page">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="login-box">
                <div id="login-box-holder">
                    <div class="row">
                        <div class="col-xs-12">
                            <header id="login-header">
                                <div id="login-logo">
                                    <img src="<?php echo base_url();?>img/logo.png" alt=""/>
                                </div>
                            </header>
                            <div id="login-box-inner">
                                <form role="form" method="post" action="<?php echo base_url('login');?>">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input class="form-control" type="text" name="user_id" placeholder="学号">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="密码">
                                    </div>
                                    <?php
                                    if(isset($error)){
                                        echo "<div class='alert alert-danger'><i class='fa fa-times-circle fa-fw fa-lg'></i><strong>错误！</strong>$error</div>";
                                    }
                                    echo validation_errors(); ?>

                                    <div id="remember-me-wrapper">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <!--<div class="checkbox-nice">
                                                    <input type="checkbox" id="remember-me" checked="checked"/>
                                                    <label for="remember-me">
                                                        记住我
                                                    </label>
                                                </div>-->
                                            </div>
                                            <a href="#" id="login-forget-link" class="col-xs-6">
                                                忘记密码
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success col-xs-12">登陆</button>
                                        </div>
                                    </div>
<!--
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="social-text">Or login with</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <button type="submit" class="btn btn-primary col-xs-12 btn-facebook">
                                                <i class="fa fa-facebook"></i> facebook
                                            </button>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <button type="submit" class="btn btn-primary col-xs-12 btn-twitter">
                                                <i class="fa fa-twitter"></i> Twitter
                                            </button>
                                        </div>
                                    </div>
                                    -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="login-box-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            没有账号？
                            <a href="registration.html">
                                注册
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('part/temple_config_tool.php');//右侧样式个性设置?>

<script src="<?php echo base_url();?>js/demo-skin-changer.js"></script>
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>js/demo.js"></script>


<script src="<?php echo base_url();?>js/scripts.js"></script>

</body>
</html>