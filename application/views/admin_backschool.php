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
	<title>返校统计管理 - 学生管理系统</title>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/bootstrap/bootstrap.min.css"/>

	<script src="<?php echo QINIUYUN; ?>js/demo-rtl.js"></script>


	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/nanoscroller.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/compiled/theme_styles.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/magnific-popup.css">

	<link type="image/x-icon" href="<?php echo QINIUYUN; ?>favicon.png" rel="shortcut icon"/>

	<!--[if lt IE 9]>
	<script src="<?php echo QINIUYUN; ?>js/html5shiv.js"></script>
	<script src="<?php echo QINIUYUN; ?>js/respond.min.js"></script>
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
								<li class="active"><span>返校统计管理</span></li>
							</ol>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
								<h2>返校统计</h2>
							</header>
							<div class="main-box-body clearfix">
							<?
							$query = $this->db->query('SELECT major,classnum, COUNT(*) FROM user GROUP BY major,classnum;');
							$arr = $query->result();
							$query = $this->db->query('SELECT major,classnum,status, COUNT(*) FROM backschool GROUP BY major,classnum,status;');
							$arr1 = $query->result();
//							echo "<pre>";
//							print_r($arr);
//							print_r($arr1);
//							echo "</pre>";
							?>
							<table class="table table-condensed table-hover">
								<tr>
									<td rowspan="2" width="81">专业班级</td>
									<td rowspan="2" width="81">应到人数(1)</td>
									<td rowspan="2" width="96">已到人数(2)</td>
									<td colspan="3" width="304">未到人数</td>
								</tr>
								<tr>
									<td width="85">途中人数(3)</td>
									<td width="131">未联系上的人数(4)</td>
									<td width="88">请假人数(5)</td>
								</tr>
								<?
								foreach($arr as $val){
									$tz = $wlxs =$qj = $weizhi =0;
								?>
								<tr>
									<td><?=$val->major.$val->classnum;?></td>
									<td><?=$val->{'COUNT(*)'};?></td>
									<?
									foreach($arr1 as $v){

										if($v->major == $val->major && $v->classnum == $val->classnum){
											if($v->status=="0"){
												$weizhi = $v->{'COUNT(*)'};//途中
											}
											if($v->status=="途中"){
												$tz = $v->{'COUNT(*)'};//途中
											}
											if($v->status=="未联系上"){
												$wlxs = $v->{'COUNT(*)'};//途中
											}
											if($v->status=="请假"){
												$qj = $v->{'COUNT(*)'};//途中
											}
										}
										$val->arrive = $val->{'COUNT(*)'} - $tz -$wlxs -$qj -$weizhi;
									}
									?>
									<td>
										<?=$val->arrive; ?>
									</td>
									<td>
										<?=$tz; ?>
									</td>
									<td>
										<?=$wlxs; ?>
									</td>
									<td>
										<?=$qj; ?>
									</td>

								</tr>
									<?
								}
								?>
								<tr>

								</tr>
							</table>
								<h3>详细信息</h3>
							<table class="table table-condensed table-hover">
								<tr>
									<td>姓名</td>
									<td>班级</td>
									<td>状态</td>
									<td>备注</td>
									<td>&nbsp;</td>
								</tr>
								<?
								foreach($backinfo as $row){
									?>
									<tr>
										<td><?=$row->username;?></td>
										<td><?=$row->major.$row->classnum;?></td>
										<td><?=$row->status;?></td>
										<td><?=$row->beizhu;?></td>
										<td>
											<a href="<?$url='task/backschooldel/'.$row->student_id;echo base_url($url);?>" >x</a>
										</td>
									</tr>
								<?}?>
							</table>
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

<script src="<?php echo QINIUYUN; ?>js/demo-skin-changer.js"></script>
<script src="<?php echo QINIUYUN; ?>js/jquery.js"></script>
<script src="<?php echo QINIUYUN; ?>js/bootstrap.js"></script>
<script src="<?php echo QINIUYUN; ?>js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/demo.js"></script>


<script src="<?php echo QINIUYUN; ?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/jquery.magnific-popup.min.js"></script>

<script src="<?php echo QINIUYUN; ?>js/scripts.js"></script>
<script src="<?php echo QINIUYUN; ?>js/pace.min.js"></script>


</body>
</html>