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
	<title>综合测评 - 学生管理系统</title>

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
								<li><a href="<? echo base_url('task') ?>">任务</a></li>
								<li class="active"><span>综合测评</span></li>
							</ol>
							<h1>班长管理</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
								<h2>班长管理</h2>
							</header>
							<div class="main-box-body clearfix">
								<div class="row">
									<div class="col-lg-6">
										<h3>本班同学综测信息</h3>

										<form role="form" method="post" action="<?php echo base_url('task/postmaster'); ?>">
											<?
											$this->db->select('*')->from('zc')->where('student_id', $loginUserid);
											$ifex = $this->db->get()->num_rows();
											if ($ifex = 0) {//提交后变1
												echo "已提交本班数据";
											} else {
												?>
												<table class="table table-condensed table-hover">

													<tr>
														<td>学号</td>
														<td>姓名</td>
														<td>总体印象分（百分制）</td>
														<td>是否挂科</td>
													</tr>

													<?
													$major = $this->session->userdata('major');//电气
													$classnum = $this->session->userdata('classnum');//134

													$x = 0;
													foreach ($this->User_data->userinfo_class("$major", "$classnum")->result() as $key => $row) {
															?>
															<tr>
																<td><? echo $sid = $row->student_id; ?></td>
																<td><? echo $unm = $row->username; ?></td>
																<input type="hidden" name="zcmaster[<?= $x; ?>][student_id]"
																       value="<?= $sid; ?>">
																<input type="hidden" name="zcmaster[<?= $x; ?>][username]"
																       value="<?= $unm; ?>">
																<input type="hidden" name="zcmaster[<?= $x; ?>][major]"
																       value="<?= $major; ?>">
																<input type="hidden" name="zcmaster[<?= $x; ?>][classnum]"
																       value="<?= $classnum; ?>">
																<td>
																	<input type="number" name="zcmaster[<?= $x; ?>][ztyxf]" value="<?foreach ($zcmasterinfo as $info) {if($sid ==$info->student_id){echo $info->ztyxf;}}?>">
																</td>
																<td>
																	<input type="hidden" name="zcmaster[<?= $x; ?>][gk]"
																	       value="0"/>
																	<input type="checkbox" value="1" name="zcmaster[<?= $x++; ?>][gk]" <?
																	foreach ($zcmasterinfo as $info) {
																		if ($sid == $info->student_id) {
																			if($info->gk){
																				echo "checked";
																			}
																		}
																	}?>>&nbsp;&nbsp;挂科
																</td>
															</tr>
														<?
													}
													?>
												</table>
											<? } ?>
											<!-- <pre>--><? //print_r($zcmaster);?><!--</pre>-->
									</div>
									<? if (!$ifex) { ?>
										<div class="col-lg-6">
											<h3>本班荣誉</h3>
											<div class="checkbox">
												<label>
													<input type="hidden" name="ry[xtyxfb]" value="0">
													<input type="checkbox" name="ry[xtyxfb]" value="6" <?
													if(!empty($zcmasterclass)){
														if($zcmasterclass->xtyxfb){
															echo "checked";
														}
													}
													?>>
													校特优学风班 6分
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="hidden" name="ry[xylxfb]" value="0">
													<input type="checkbox" value="4" name="ry[xylxfb]" <?
													if (!empty($zcmasterclass)) {
														if ($zcmasterclass->xylxfb) {
															echo "checked";
														}
													}
													?>>
													校优良学风班 4分
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="hidden" name="ry[yylxfb]" value="0">
													<input type="checkbox" value="2" name="ry[yylxfb]" <?
													if (!empty($zcmasterclass)) {
														if ($zcmasterclass->yylxfb) {
															echo "checked";
														}
													}
													?>>
													院优良学风班 2分
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="hidden" name="ry[xxjtzb]" value="0">
													<input type="checkbox" value="5" name="ry[xxjtzb]" <?
													if (!empty($zcmasterclass)) {
														if ($zcmasterclass->xxjtzb) {
															echo "checked";
														}
													}
													?>>
													校先进团支部 5分
												</label>
											</div>
										</div><? } ?>

								</div>
								<div class="row">
									<div class="col-xs-12">
										<br/>
										<br/>
										<br/>
										<input type="hidden" name="current_url" value="<?= current_url(); ?>">
										<? if (!$ifex) { ?>
											<button type="submit" class="btn btn-success col-xs-12">提交</button><? } ?>
									</div>
								</div>
								</form>

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