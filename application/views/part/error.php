<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/5
 * Time: 14:00
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>错误提示 - 学生管理系统</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css"/>

    <script src="js/demo-rtl.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/nanoscroller.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/compiled/theme_styles.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/magnific-popup.css">

    <link type="image/x-icon" href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon"/>

    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>js/respond.min.js"></script>
    <![endif]-->


</head>
<body>

    <div id="content-wrapper" style="margin-left: 0px;">
        <div class="row">
            <div class="col-lg-12">
                <div id="error-box">
                    <div class="row">
                        <div class="col-xs-12" style="min-height: 400px;">
                            <div id="error-box-inner">
                                <img src="<?php echo base_url(); ?>/img/error-404-v3.png" alt="Have you seen this page?"/>
                            </div>
                            <h1>错误</h1>
                            <p>
                            <div class="alert alert-danger">
                                <i class="fa fa-times-circle fa-fw fa-lg"></i>
                                <strong>错误!</strong> <?echo $error;?>.
                            </div>
                            </p>
                            <p>
                                返回 <a onclick="history.go(-1)">上一页</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('temple_footer.php');//footer样式个性设置?>
    </div>



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