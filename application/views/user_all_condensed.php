<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/5
 * Time: 17:21
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>用户详细信息 - 学生管理系统</title>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/bootstrap/bootstrap.min.css"/>

	<script src="<?php echo QINIUYUN; ?>js/demo-rtl.js"></script>


	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/nanoscroller.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/compiled/theme_styles.css"/>


	<link type="image/x-icon" href="<?php echo QINIUYUN; ?>favicon.png" rel="shortcut icon"/>

	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/jquery.dataTables.css"/>


	<!--[if lt IE 9]>
	<script src="<?php echo QINIUYUN; ?>js/html5shiv.js"></script>
	<script src="<?php echo QINIUYUN; ?>js/respond.min.js"></script>
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
								<li><a href="<?php echo QINIUYUN; ?>">主页</a></li>
								<li class="active"><span>用户</span></li>
							</ol>
							<div class="clearfix">
								<h1 class="pull-left">所有用户</h1>

								<div class="pull-right top-page-ui">
									<a href="#" class="btn btn-primary pull-right">
										<i class="fa fa-plus-circle fa-lg"></i> 添加用户
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="main-box no-header clearfix">
								<div class="main-box-body clearfix">
									<div class="table-responsive">
										<table class="table table-condensed table-hover display" id="example">
											<thead>
											<tr>
												<th><span>学号</span></th>
												<th><span>班级</span></th>
												<th><span>姓名</span></th>
												<th><span>性别</span></th>
												<th><span>长号</span></th>
												<th><span>短号</span></th>
												<th><span>Email</span></th>
												<th><span>职务</span></th>
											</tr>
											</thead>
											<tbody>
											<?
											foreach ($this->db->from('user')->get()->result() as $row) {
												?>
												<tr>
													<td><?php echo $row->student_id; ?></td>
													<td><? echo $row->major . $row->classnum; ?></td>
													<td><a href="<?=base_url("user/sid/$row->student_id")?>" class="table-link"><? echo $row->username; ?></a></td>
													<td><?
														if ($row->sex) {
															echo "男";
														} else {
															echo "女";
														}
														?></td>
													<td><? echo $row->long_phone; ?></td>
													<td><? echo $row->short_phone; ?></td>
													<td><? echo $row->email; ?></td>
													<td><?php
														switch ($row->role_id) {
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
														?></td>
												</tr>
											<? } ?>
											</tbody>
										</table>

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

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo QINIUYUN; ?>js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function () {
		$('#example').DataTable(
			{
				"language": {
					"processing": "玩命加载中...",
					"lengthMenu": "显示 _MENU_ 项结果",
					"zeroRecords": "没有匹配结果",
					"info": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
					"infoEmpty": "显示第 0 至 0 项结果，共 0 项",
					"infoFiltered": "(由 _MAX_ 项结果过滤)",
					"infoPostFix": "",
					"search": "搜索:",
					"url": "",
					"paginate": {
						"first": "首页",
						"previous": "上页",
						"next": "下页",
						"last": "末页"
					}
				},
				"order": [[1, "asc"]],
				"bStateSave": true

			}
		);
	});
</script>
</body>
</html>