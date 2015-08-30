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
								<li><a href="<? echo base_url('task') ?>">任务</a></li>
								<li class="active"><span>综合测评统计</span></li>
							</ol>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
								<h2>综合测评总表</h2>
							</header>
							<div class="main-box-body clearfix">
								<table class="table table-condensed table-bordered table-responsive">
									<tr>
										<td rowspan="3" width="60">班级</td>
										<td rowspan="3" width="80">学号</td>
										<td rowspan="3" width="50">姓名</td>
										<td colspan="22">德育测评(15%)</td>
										<td rowspan="3" width="25">德育分总分</td>
										<td rowspan="2" width="20">学业测评（70％)</td>
										<td colspan="4" rowspan="2">能力测评（15%）</td>
										<td colspan="4" rowspan="2">个性发展测评（40分）</td>
										<td rowspan="3" width="20">综合测评总分</td>
<!--										<td rowspan="3" width="20">综合测评排名</td>-->
									</tr>
									<tr>
										<td rowspan="2" width="25">总体印象分</td>
										<td colspan="10">加分</td>
										<td colspan="10">减分</td>
										<td rowspan="2" width="25">奖惩分小计</td>
									</tr>
									<tr>
										<td width="20">校先进团支部</td>
										<td width="20">校特优、优良学风班、院优良学风班</td>
										<td width="20">校优院优寝室</td>
										<td width="20">其它校级先进集体</td>
										<td width="20">通报表扬</td>
										<td width="20">撰稿登播</td>
										<td width="20">学生手册考查90分以上</td>
										<td width="20">为院校提出合理化建议</td>
										<td width="20">二级学院确定的加分</td>
										<td width="20">加分小计</td>
										<td width="20">课堂行为规范</td>
										<td width="20">宿舍减分</td>
										<td width="20">不文明行为纪实</td>
										<td width="20">学生干部考核不合格</td>
										<td width="20">︽学生手册︾考查70分以下</td>
										<td width="20">不参加暑期社会实践</td>
										<td width="20">无故不按时缴付学杂费</td>
										<td width="20">违纪处分</td>
										<td width="20">二级学院确定的减分</td>
										<td width="20">减分小计</td>
										<td></td>
										<td width="20">自主学习</td>
										<td width="20">实践创新</td>
										<td width="20">组织交流</td>
										<td width="20">能力测评小计</td>
										<td width="20">创新类加分</td>
										<td width="20">才艺类加分</td>
										<td width="20">其它类加分</td>
										<td width="20">个性测评小计</td>
									</tr>
									<?
									foreach ($zclist as $row)
									{
									?>
										<tr>
											<td><?= $row->major.$row->classnum; ?></td>
											<td><?= $row->student_id; ?></td>
											<td><?= $row->username; ?></td>
											<td><?= $row->ztyxf; ?></td>
											<td><?= $row->xxjtzb; //校先进团支部?></td>
											<td><?= $row->xtyxfb+$row->xylxfb+$row->yylxfb; ?></td>
											<td><?= $row->yxqs; ?></td>
											<td><?= $row->qtxjxjjt; ?></td>
											<td><?= $row->tbby; ?></td>
											<td><?= $row->zgdb; ?></td>
											<td><?= $row->xssc90; ?></td>
											<td><?= $row->wxtchlwjy; ?></td>
											<td><?= $yqdjf = $row->zyzdx+$row->yjtbby+$row->yjyxtzb+$row->xx+$row->pwjns+$row->wsyx+$row->rjxyqdjf; //院确定加分?></td>
											<td><?= $add = $row->xxjtzb+
												$row->xtyxfb+
												$row->xylxfb+
												$row->yylxfb+
												$row->yxqs+
												$row->qtxjxjjt+
												$row->tbby+
												$row->zgdb+
												$row->xssc90+
												$yqdjf; //加分小计?></td>
											<td><?= $row->ktxwgf; ?></td>
											<td><?= $row->ssjf; ?></td>
											<td><?= $row->bwmxwsj; ?></td>
											<td><?= $row->xsgbkhbhg; ?></td>
											<td><?= $row->sxxcxy70; ?></td>
											<td><?= $row->bcjsqsqshhd; ?></td>
											<td><?= $row->wgbasjf; ?></td>
											<td><?= $row->wjcf; ?></td>
											<td><?= $row->rjxyqdjf; ?></td>
											<td><?= $minus = $row->ktxwgf+
													$row->ssjf+
													$row->bwmxwsj+
													$row->xsgbkhbhg+
													$row->sxxcxy70+
													$row->bcjsqsqshhd+
													$row->wgbasjf+
													$row->wjcf+
													$row->rjxyqdjf;//减分小计 ?></td>
											<td><?= $add+$minus; ?></td>
											<td><?= $row->ztyxf*0.7*0.15+($add+$minus)*0.15; ?></td>
											<td><?= $row->all*0.7; ?></td>
											<td><?= $zzxx = $row->zypm+
												$row->fxk+
												$row->zysy+
												$row->xsbg+
												$row->zs+
												$row->english+
												$row->enky+
												$row->computer+
												$row->jz;//自主学习 ?></td>
											<td><?= $sjcx = $row->shsj+
												$row->cjkfxsy+
												$row->csfm+
												$row->hjjn+
												$row->wxdcx+
												$row->tzb+
												$row->zzjs+
												$row->ydy+
												$row->hyjt+
												$row->ydh+
												$row->r5000+
												$row->r1500+
												$row->fzgbc+
												$row->ydhfzr+
												$row->sjqs+
												$row->fzr+
												$row->wmqs+
												$row->wmqsry;//实践创新?></td>
											<td><?= $zzjl = $row->z1+
												$row->z8+
												$row->z5+
												$row->z3+
												$row->xjgr;//组织交流?></td>
											<td><?= $zzxx+$sjcx+$zzjl+6;//能力测评小计?></td>
											<td><?= $row->cxlsum;//创新类?></td>
											<td><?= $row->cylsum;//才艺类?></td>
											<td><?= '0'//其他类?></td>
											<td><?
												$gxsum=$row->cxlsum+$row->cylsum;
											if($gxsum>40){$gxsum=40;}
											echo $gxsum;//个性小计?></td>
											<td><?= $row->ztyxf*0.7*0.15+($add+$minus)*0.15+
												$row->all*0.7+
												$zzxx+$sjcx+$zzjl+6+
												$row->cxlsum+$row->cylsum;//综合测评总分?></td>
										</tr>
									<?
									}
									?>
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