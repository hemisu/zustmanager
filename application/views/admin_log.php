<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 15:07
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>操作日志 - 学生管理系统</title>

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
	<style>
		.table tbody>tr>td:first-child {
			font-size: 8px;
			font-weight: 300;
		}
		.table tbody>tr>td {
			font-size: 0.875em;
			vertical-align: middle;
			border-top: 1px solid #e7ebee;
			padding: 3px;
			text-align: center;
		}
	</style>


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
								<li><a href="<? echo base_url('admin') ?>">管理</a></li>
								<li class="active"><span>后台日志</span></li>
							</ol>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
								<h2>操作日志</h2>
							</header>
							<div class="main-box-body clearfix">
								<table class="table table-condensed table-hover">
								<?foreach($adminlog as $row){?>
									<tr>
										<td><?=$row->username;?></td>
										<td><?=$row->events;?></td>
										<td><?=$this->User_data->time_tran($row->time);?></td>
									</tr>
								<?}?>
								</table>
								<?
								$config['base_url'] = base_url('admin/log');
								$config['total_rows'] = $this->db->from('log')->get()->num_rows();
								$config['per_page'] = 20;
								$config['use_page_numbers'] = TRUE;
								$config['full_tag_open'] = '<div class="main-box-body clearfix">
																							<ul class="pagination">';
								$config['full_tag_close'] = '</div>';
								$config['num_tag_open'] = '<li>';
								$config['num_tag_close'] = '</li>';
								$config['cur_tag_open'] = '<li class="active"><a href="#">';
								$config['cur_tag_close'] = '</a></li>';
								$config['prev_tag_open'] = '<li>';//上一页
								$config['prev_tag_close'] = '</li>';
								$config['next_tag_open'] = '<li>';//下一页
								$config['next_tag_close'] = '</li>';
								$config['last_tag_open'] = '<li>';//最后一页
								$config['last_tag_close'] = '</li>';
								$config['first_tag_open'] = '<li>';//第一页
								$config['first_tag_close'] = '</li>';
								$this->pagination->initialize($config);

								echo $this->pagination->create_links();
								?>

							</div>
						</div>
					</div>
				</div>
				<?php require_once('part/temple_footer.php');//footer样式个性设置?>
			</div>
		</div>

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