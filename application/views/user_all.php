<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/7/4
 * Time: 19:46
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>所有用户 - 学生管理系统</title>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/bootstrap/bootstrap.min.css"/>

	<script src="<?php echo QINIUYUN; ?>js/demo-rtl.js"></script>


	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/nanoscroller.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/compiled/theme_styles.css"/>


	<link type="image/x-icon" href="<?php echo QINIUYUN; ?>favicon.png" rel="shortcut icon"/>

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
										<table class="table user-list table-hover">
											<thead>
											<tr>
												<th><span>用户名</span></th>
												<th><span>学号</span></th>
												<th><span>班级</span></th>
												<th><span>qq</span></th>
												<th><span>长号</span></th>
												<th><span>短号</span></th>
												<th class="text-center"><span>状态</span></th>
												<th>&nbsp;</th>
											</tr>
											</thead>
											<tbody>
											<?
											foreach ($alluser as $row) {
												?>
												<tr>
													<td>
														<img src="<? $head_img = "public/images/" . $row->head_img;
														echo base_url("$head_img"); ?>" alt=""/>
														<a href="#" class="user-link"><? echo $row->username; ?></a>
                              <span class="user-subhead">
                                <?php
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
                                ?>
                              </span>
													</td>
													<td><? echo $row->student_id; ?></td>
													<td><? echo $row->major . $row->classnum; ?></td>
													<td>
														<?
														if (!$this->User_data->user_role($loginUserid, 30)) {
															echo $row->qq;
														}else{
															echo '<i class="fa fa-spinner fa-spin"></i>权限不足无法查看';
														}
														?>
													</td>
													<td>
														<?
														if (!$this->User_data->user_role($loginUserid, 30)) {
															echo $row->long_phone;
														}else{
															echo '<i class="fa fa-spinner fa-spin"></i>权限不足无法查看';
														}
														?>
													</td>
													<td>
														<?
														if (!$this->User_data->user_role($loginUserid, 30)) {
															echo $row->short_phone;
														}else{
															echo '<i class="fa fa-spinner fa-spin"></i>权限不足无法查看';
														} ?></td>
													<td class="text-center"><?
														if ($row->status) {
															echo "<span class='label label-success'>Online</span>";
														} else {
															echo "<span class='label label-default'>Offline</span>";
														}
														?></td>
													<td style="width: 20%;">
														<a href="<?=base_url("user/sid/$row->student_id")?>" class="table-link">
                                                    <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                                    </span>
														</a>
														<?
														if (!$this->User_data->user_role($loginUserid, 50)) {?>
														<a href="#" class="table-link">
                                                    <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                    </span>
														</a>
														<a href="#" class="table-link danger">
                                                    <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>
														<?}	?>
														</a>
													</td>
												</tr>
											<? } ?>
											</tbody>
										</table>
										<?
										$config['base_url'] = base_url('user/all');
										$config['total_rows'] = $this->db->from('user')->get()->num_rows();
										$config['per_page'] = 20;
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
</body>
</html>