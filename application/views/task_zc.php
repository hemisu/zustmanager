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
								<li class="active"><span>综合测评提交</span></li>
							</ol>
							<h1>综测说明</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
								<h2>综合测评说明</h2>（<a href="<?=base_url('task/tlist')?>">总表</a>）
							</header>
							<div class="main-box-body clearfix">
								<p> 本次综合测评细则下载地址：<br>
									<br>
									&nbsp;附件1：<a href="http://xsc.zust.edu.cn/Web/Details.aspx?listID=1009&amp;&amp;menuID=13"
									             target="_blank">各学院14-15学年综合测评实施办法</a> <br>
									&nbsp;附件2：<a href="http://xsc.zust.edu.cn/Web/Details.aspx?listID=1006&amp;&amp;menuID=12"
									             target="_blank">关于2014-2015学年评优评奖等相关事项的说明</a></p>

								<h3><span>附件1：</span></h3>

								<p> &nbsp; &nbsp; &nbsp; &nbsp;
									学院在综合测评成绩的基础上，根据《浙江科技学院学生奖学金评选条例》确定获奖人选和比例。学校鼓励“优良＋特长”的学生成长成才模式，即申报学校一、二、三等奖学金者，必须先要满足专业的学业测评总排名要求，学业测评排名在专业排名中分别为前10%、15%和30%，在此基础上再根据综合测评排序，按照学校奖学金比例进行对应申报。申报单项奖学金者，学业测评排名必须在专业的前50%。对于综合测评成绩合格，但在个性发展方面取得突出成绩的，其综合测评排名在所在班级的前50％，通过本人申请，学院初审，提交校奖学金评审小组审定，其评奖名额可不在规定比例内。 </p>

								<h3><span>附件2：</span></h3>

								<p>
									1、根据学生学年总分评定等级：体测90.0分及以上为优秀，80.0～89.9分为良好，学生测试成绩评定达到良好及以上者，方可参加评优与评奖；成绩达到优秀者，方可获体育奖学分。学校的奖学金评定会依据该通知执行。</p>

								<p>2、我校2012级、2013级、2014级同学在2014-2015学年进行了两次体测，取最好成绩参加评优评奖。今年是体测调整年，以后统一在春季举行一次体质测试。 </p>

								<p>3、关于学业成绩，参照附件1说明 </p>

								<p>4、学生因病或残疾可向学校提交暂缓或免予执行《标准》的申请，经医疗单位证明，体育教学部门核准，可暂缓或免予执行《标准》，并填写《免予执行
									<国家体制健康标准>申请表》（附表7），存入学生档案。确实丧失运动能力、被免予执行《标准》的残疾学生，仍可参加评优与评奖，毕业时《标准》成绩需注明免测
								</p>
								<p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;以上是与去年不同的地方，特此说明。</p>
								<p>
								</p>

								<p><a href="<?php echo base_url('task/zc/1'); ?>" class="btn btn-success">我已阅读,进入资料填写</a> <a href="<?php echo base_url('task/master'); ?>" class="btn btn-success">班长请先进入此填写</a></p>

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