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
	<title>返校统计 - 学生管理系统</title>

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
		.table tbody > tr > td:first-child {
			font-size: 8px;
			font-weight: 300;
		}

		.table tbody > tr > td {
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
								<li><a href="<? echo base_url('task') ?>">任务</a></li>
								<li class="active"><span>返校统计</span></li>
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
										<h3>本班返校信息</h3>

										<p>
											可以随时修改同学信息，截止提交时间6号晚上8点。
										</p>
										<table class="table table-condensed table-hover">
											<tr>
												<td rowspan="2" width="81">应到人数(1)</td>
												<td rowspan="2" width="96">已到人数(2)</td>
												<td colspan="3" width="304">未到人数</td>
											</tr>
											<tr>
												<td width="85">途中人数(3)</td>
												<td width="131">未联系上的人数(4)</td>
												<td width="88">请假人数(5)</td>
											</tr>
											<tr>
												<td><?= $allnum; ?></td>
												<td><?= $allnum - $tuzhong - $weilianxishang - $qingjia; ?></td>
												<td><?= $tuzhong; ?></td>
												<td><?= $weilianxishang; ?></td>
												<td><?= $qingjia; ?></td>
											</tr>
										</table>
										<table class="table table-condensed table-hover">
											<tr>
												<td>姓名</td>
												<td>状态</td>
												<td>备注</td>
												<td>&nbsp;</td>
											</tr>
											<?
											foreach ($backinfo as $row) {
												?>
												<tr>
													<td><?= $row->username; ?></td>
													<td><?= $row->status; ?></td>
													<td><?= $row->beizhu; ?></td>
													<td>
														<a href="<? $url = 'task/backschooldel/' . $row->student_id;
														echo base_url($url); ?>"><span class="label label-danger">删除</span></a>
													</td>
												</tr>
											<? } ?>
										</table>
										<p>说明：1、(1)=(2)+(3)+(4)+(5)，其中(3)指已经离家往学校赶路，预计在开学前能到校的人数；2、备注栏里请填写学生未到校情况（原因、时间）。</p>
										<br/>

										<form role="form" method="post" action="<?php echo base_url('task/postbackschool'); ?>">
											<?
											$major = $this->session->userdata('major');//电气
											$classnum = $this->session->userdata('classnum');//134
											?>
											<h3>提交信息区域</h3>

											<p>到齐则不用提交信息</p>
											<a href="#" id="AddMoreFileBox" class="btn btn-info">添加更多</a></span></p>
											<table class="table table-condensed table-hover" id="InputsWrapper">
												<tr>
													<td>
														<select class="form-control" name="backschool[0][student_id]">
															<? foreach ($this->User_data->userinfo_class("$major", "$classnum")->result() as $key => $row) { ?>
																<option value="<?= $sid = $row->student_id; ?>"><?= $unm = $row->username; ?></option>
															<?
															}
															?>
														</select>
													</td>
													<input type="hidden" name="backschool[0][major]" value="<?= $major; ?>">
													<input type="hidden" name="backschool[0][classnum]" value="<?= $classnum; ?>">
													<td>
														<select class="form-control" name="backschool[0][status]">
															<option value="0">点击选择</option>
															<option value="途中">途中</option>
															<option value="未联系上">未联系上</option>
															<option value="请假">请假</option>
														</select>
													</td>
													<td>
														<input class="form-control" type="text" name="backschool[0][beizhu]"
														       placeholder="该同学未到原因，预计到达时间">
													</td>
													<td>
														<a href="#" class="removeclass">×</a>
													</td>
												</tr>
											</table>
											<input type="hidden" name="current_url" value="<?= current_url(); ?>">
											<button type="submit" class="btn btn-success col-xs-12">提交</button>
										</form>
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

<script>
	$(document).ready(function () {

		var MaxInputs = 20; //maximum input boxes allowed
		var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
		var AddButton = $("#AddMoreFileBox"); //Add button ID

		var x = InputsWrapper.length; //initlal text box count
		var FieldCount = 0; //to keep track of text box added

		$(AddButton).click(function (e)  //on add input button click
		{
			if (x <= MaxInputs) //max input box allowed
			{
				FieldCount++; //text box added increment
				//add input box
				var trHtml =
					'<tr><td><select class="form-control" name="backschool[' + FieldCount + '][student_id]" >' +
					<?foreach ($this->User_data->userinfo_class("$major", "$classnum")->result() as $key => $row) {?>
					'<option value="<?=$sid = $row->student_id; ?>"><?=$unm = $row->username;?></option>' +
					<?
					}
					?>
					'</select></td>' +
					'<input type="hidden" name="backschool[' + FieldCount + '][major]" value="<?= $major; ?>">' +
					'<input type="hidden" name="backschool[' + FieldCount + '][classnum]" value="<?= $classnum; ?>">' +
					'<td>' +
					'<select class="form-control" name="backschool[' + FieldCount + '][status]" >' +
					'<option value="0">点击选择</option>' +
					'<option value="途中">途中</option>' +
					'<option value="未联系上">未联系上</option>' +
					'<option value="请假">请假</option>' +
					'</select></td><td>' +
					'<input class="form-control" type="text" name="backschool[' + FieldCount + '][beizhu]" placeholder="该同学未到原因，预计到达时间">' +
					'</td><td><a href="#" class="removeclass">×</a></td></tr>';

//        $(InputsWrapper).append('<tr><td><input type="text" name="mytext[]" id="field_'+ FieldCount +'" value="Text '+ FieldCount +'"/><a href="#" class="removeclass">×</a></td></tr>');
				$(InputsWrapper).append(trHtml);
				x++; //text box increment
			}
			return false;
		});

		$("body").on("click", ".removeclass", function (e) { //user click on remove text
			if (x > 1) {
				$(this).parent().parent('tr').remove(); //remove text box
				x--; //decrement textbox
			}
			return false;
		})

	});</script>
</body>
</html>