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
	<title>综合测评提交 - 学生管理系统</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css"/>

	<script src="<?php echo base_url(); ?>js/demo-rtl.js"></script>


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/nanoscroller.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/compiled/theme_styles.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/compiled/wizard.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/libs/magnific-popup.css">

	<link type="image/x-icon" href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon"/>

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style type="text/css">
		.gx td {
			padding: 5px;
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
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><a href="#">主页</a></li>
				<li><a href="<? echo base_url('task') ?>">任务</a></li>
				<li class="active"><span>综合测评</span></li>
			</ol>
		</div>
	</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix" style="min-height: 820px;">
<header class="main-box-header clearfix">
	<h2>综测提交提交</h2>
</header>
<div class="main-box-body clearfix">
<?$this->db->select('*')->from('zc')->where('student_id', $loginUserid);
$ifex = $this->db->get()->num_rows();
if ($ifex=0) {//班长提交后变1
	echo "<p>班长请先提交本班数据</p>";
} else {?>
<div id="myWizard" class="wizard">
<div class="wizard-inner">
	<ul class="steps">
		<li data-target="#step1" class="active"><span class="badge badge-primary">1</span>德育<span class="chevron"></span>
		</li>
		<li data-target="#step2"><span class="badge">2</span>学业<span class="chevron"></span></li>
		<li data-target="#step3"><span class="badge">3</span>能力<span class="chevron"></span></li>
		<li data-target="#step4"><span class="badge">4</span>个性<span class="chevron"></span></li>
	</ul>
	<div class="actions">
		<button type="button" class="btn btn-default btn-mini btn-prev"><i class="icon-arrow-left"></i>Prev</button>
		<button type="button" class="btn btn-success btn-mini btn-next" data-last="请按下方的提交">Next<i
				class="icon-arrow-right"></i></button>
	</div>
</div>
<div class="step-content">
<form role="form" method="post" action="<?php echo base_url('task/post'); ?>">
<div class="step-pane  active" id="step1">
	<div class="row">
		<br/>
		<h4>德育成绩 （满分15）</h4>

		<p>德育测评成绩 = [总体印象分×70% + (0-30分)]×15% </p>

		<div class="form-group">
			<label>总体印象分</label>

			<input class="form-control" type="text" placeholder="未出分" name="deyu[ztyxf]" readonly="true" value="<?echo $zcmasterinfo->ztyxf;?>">
		</div>
		<div class="col-lg-6">
			<h3><span>加分项</span></h3>

			<div class="form-group">
				<label>优良学风班、先进团支部两者不可累计加分</label>
				<input class="form-control" type="text" placeholder="由班长选择" name="deyu[xfbtzb]" readonly="true" value="<?
				if (!empty($zcmasterinfo)) {
					echo $zcmasterinfo->xtyxfb+$zcmasterinfo->xylxfb+$zcmasterinfo->yylxfb+$zcmasterinfo->xxjtzb;
				}?>">
			</div>
			<div class="form-group">

				<label>优秀寝室</label>
				<select class="form-control" name="deyu[yxqs]">
					<option value="0" <?if($zcmasterinfo->yxqs==0){echo 'selected';}?>>点击选择</option>
					<option value="2" <?if($zcmasterinfo->yxqs==2){echo 'selected';}?>>院级 2分</option>
					<option value="4" <?if($zcmasterinfo->yxqs==4){echo 'selected';}?>>校级 4分</option>
				</select>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[qtxjxjjt]">
					<input type="checkbox" value="3" name="deyu[qtxjxjjt]" <?if($zcmasterinfo->qtxjxjjt){echo 'checked';}?>>
					其它校级先进集体 (需要在下面备注)
				</label>
			</div>
			<div class="form-group">
				<label>通报表扬 (2分一次 需要在下面备注，不包括五四毅行)</label>
				<input class="form-control" type="text" name="deyu[tbby]" value="<?echo $zcmasterinfo->tbby;?>">
			</div>
			<div class="form-group">
				<label>撰稿登播 （2分/篇、次 需要在下面备注）</label>
				<input class="form-control" type="text" name="deyu[zgdb]" value="<?echo $zcmasterinfo->zgdb;?>">
			</div>
			<div class="form-group">
				<label>为校（院）提出合理化建议 （需要在下面备注）</label>
				<input class="form-control" type="text" name="deyu[wxtchlwjy]" value="<?echo $zcmasterinfo->wxtchlwjy;?>">
			</div>
			<div class="form-group">
				<label>二级学院确定的加分 （除去下面有的选项 需要备注）</label>
				<input class="form-control" type="text" name="deyu[ejxyqdjf]" value="<?echo $zcmasterinfo->ejxyqdjf;?>">
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[xssc90]">
					<input type="checkbox" value="2" name="deyu[xssc90]" <?if($zcmasterinfo->xssc90){echo 'checked';}?>>
					学生手册考查90分以上
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[zyzdx]">
					<input type="checkbox" value="2" name="deyu[zyzdx]" <?if($zcmasterinfo->zyzdx){echo 'checked';}?>>
					青协星级志愿者，党校优秀学员 加2分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[yjtbby]">
					<input type="checkbox" value="2" name="deyu[yjtbby]" <?if($zcmasterinfo->yjtbby){echo 'checked';}?>>
					院级通报表扬 加2分（参加五四毅行全程）
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[yjyxtzb]">
					<input type="checkbox" value="1" name="deyu[yjyxtzb]" <?if($zcmasterinfo->yjyxtzb){echo 'checked';}?>>
					院级优秀团支部 加1分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[xx]">
					<input type="checkbox" value="3" name="deyu[xx]" <?if($zcmasterinfo->xx){echo 'checked';}?>>
					献血 加3分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[pwjns]">
					<input type="checkbox" value="1" name="deyu[pwjns]" <?if($zcmasterinfo->pwjns){echo 'checked';}?>>
					排舞吉尼斯 加1分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[wsyx]">
					<input type="checkbox" value="1" name="deyu[wsyx]" <?if($zcmasterinfo->wsyx){echo 'checked';}?>>
					参加五四毅行 加1分（参加五四毅行）
				</label>
			</div>


		</div>
		<div class="col-lg-6">
			<h3><span>减分项</span></h3>

			<div class="form-group">
				<label>课堂行为规范（按相应考核办法执行 由班长填写）</label>
				<input class="form-control" type="text" name="deyu[ktxwgf]" value="<?echo $zcmasterinfo->ktxwgf;?>">
			</div>
			<div class="form-group">
				<label>宿舍减分</label>
				<select class="form-control" name="deyu[ssjf]" >
					<option value="0" <?if($zcmasterinfo->ssjf== 0){echo 'selected';}?>>点击选择</option>
					<option value="-2" <?if($zcmasterinfo->ssjf== -2){echo 'selected';}?>>院级 -2分</option>
					<option value="-4" <?if($zcmasterinfo->ssjf== -4){echo 'selected';}?>>校级 -4分</option>
				</select>
			</div>

			<div class="form-group">
				<label>不文明行为纪实（2分一次 需要在下面备注）</label>
				<input class="form-control" type="text" name="deyu[bwmxwsj]" value="<?echo $zcmasterinfo->bwmxwsj;?>">
			</div>
			<div class="form-group">
				<label>违纪处分（由班长填写）</label>
				<input class="form-control" type="text" name="deyu[wjcf]" value="<?echo $zcmasterinfo->wjcf;?>">
			</div>
			<div class="form-group">
				<label>二级学院确定的减分（由班长填写）</label>
				<input class="form-control" type="text" name="deyu[rjxyqdjf]" value="<?echo $zcmasterinfo->rjxyqdjf;?>">
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[xsgbkhbhg]">
					<input type="checkbox" value="-2" name="deyu[xsgbkhbhg]" <?if($zcmasterinfo->xsgbkhbhg){echo 'checked';}?>>
					学生干部考核不合格 扣2分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[sxxcxy70]">
					<input type="checkbox" value="-3" name="deyu[sxxcxy70]" <?if($zcmasterinfo->sxxcxy70){echo 'checked';}?>>
					《学生手册》内容考查70分以下或不参加考查者（含试读生）扣3分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[bcjsqsqshhd]">
					<input type="checkbox" value="-3" name="deyu[bcjsqsqshhd]" <?if($zcmasterinfo->bcjsqsqshhd){echo 'checked';}?>>
					不参加暑期社会实践活动 扣3分
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="hidden" value="0" name="deyu[wgbasjf]">
					<input type="checkbox" value="-6" name="deyu[wgbasjf]" <?if($zcmasterinfo->wgbasjf){echo 'checked';}?>>
					无故不按时缴付学杂费或办理相关手续 扣6分
				</label>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="form-group">
			<label>备注栏(一行一条，格式：某某项目 +1分 请计算后填在上方相应处，此处仅供备注不统计分数)</label>
			<textarea class="form-control" rows="3" name="deyu[dybeizhu]"><?echo $zcmasterinfo->dybeizhu;?></textarea>
		</div>
	</div>
</div>
<div class="step-pane" id="step2">
	<div class="row">
		<br/>
		<h4>学业成绩 （满分70）</h4>

		<div class="form-group">
			<label>学分加权平均分（输入数据后得出)</label>
			<input class="form-control" id="xyall" type="text" name="xy[all]" value="<?echo $zcmasterinfo->all;?>" readonly="true">
		</div>
		<div class="col-lg-12">
			<h3><span>体育健康标准分（百分制）</span></h3>

			<p>国家学生体育健康标准作为独立一门课程计入学业测评成绩中，课程学分按6学分计算（相当于三门课的学分），成绩由体军部根据相关标准和规章提供。</p>

			<div class="form-group">
				<label>体测分数 (请输入最高的一次)</label>
				<input class="form-control" id="sports" type="text" name="xy[sports]" value="<?echo $zcmasterinfo->sports;?>" >
			</div>
			<div class="form-group">
				<label>已获得学分 (本学年获得学分)</label>
				<input class="form-control" id="hadcredit" type="text" name="xy[hadcredit]" value="<?echo $zcmasterinfo->hadcredit;?>" >
			</div>
			<div class="form-group">
				<label>学分加权平均分（百分制）</label>
				<input class="form-control" id="average" type="text" name="xy[average]" value="<?echo $zcmasterinfo->average;?>" >
			</div>
			<p><span id="xycalc" class="btn btn-default">计算值</span></p>

			<p>
				考察点：<br/>
				1.公共基础课<br/>
				2.专业课<br/>
				3.实践性环节<br/>
				4.国家学生体育健康标准<br/><br/>
			</p>
		</div>

	</div>
</div>
<div class="step-pane" id="step3">
<div class="row">
<br/>
<h4>能力成绩 （满分15）</h4>

<p>能力测评的基本分为6分，能力测评奖励分最高不超过9分。</p>
<p>基本分已添加，仅需填写奖励分。</p>
<div class="col-lg-6">
	<h3><span>自主学习</span></h3>


	<div class="form-group">
		<label>课程学习成绩在专业排名情况</label>
		<select class="form-control" name="nl[zypm]">
			<option value="0" <?if($zcmasterinfo->zypm== 0){echo 'selected';}?>>点击选择</option>
			<option value="0.5" <?if($zcmasterinfo->zypm== 0.5){echo 'selected';}?>>一学年无不及格课程 加0.5分</option>
			<option value="0.6" <?if($zcmasterinfo->zypm== 0.6){echo 'selected';}?>>专业排名前30% 加0.6分</option>
			<option value="0.7" <?if($zcmasterinfo->zypm== 0.7){echo 'selected';}?>>专业排名前20% 加0.7分</option>
			<option value="0.8" <?if($zcmasterinfo->zypm== 0.8){echo 'selected';}?>>专业排名前10% 加0.8分</option>
			<option value="1" <?if($zcmasterinfo->zypm== 1){echo 'selected';}?>> 专业排名前3% 加1 分</option>
		</select>
	</div>
	<p>转专业学生与转入专业同学相比，每学年多学的课程参照辅修课的加分标准执行。<br/>
		仅算2014年09月01日~2015年08月31日止的课程
	</p>

	<div class="form-group">
		<label>主修专业成绩合格以上，辅修课程每通过一门，加0.2分，需要在下面备注课程名</label>
		<input class="form-control" type="text" name="nl[fxk]" value="<?echo $zcmasterinfo->fxk;?>">
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.3" name="nl[zysy]" <?if($zcmasterinfo->zysy){echo 'checked';}?>>
			参加并递交职业生涯规划大赛文本的加0.3分
		</label>
	</div>
	<p>学术报告上限3场</p>

	<div class="form-group">
		<label>听学术讲座报告（0.2分一场 需要备注 弘毅讲堂不算入在内）</label>
		<input class="form-control" type="text" name="nl[xsbg]" value="<?echo $zcmasterinfo->xsbg;?>">
	</div>
	<p>驾照，计算机和英语证书一直有效；<br/>其他证书须是本学年（2014年09月01日~2015年08月31日）<br />
		专业类加0.4分一本，非专业类0.2分一本 需要备注</p>

	<div class="form-group">
		<label>考证情况（下面已有的选项不用计算在内）</label>
		<input class="form-control" type="text" name="nl[zs]" value="<?echo $zcmasterinfo->zs;?>">
	</div>
	<div class="form-group">
		<label>英语四六级</label>
		<select class="form-control" name="nl[english]">
			<option value="0" <?if($zcmasterinfo->english== 0){echo 'selected';}?>>点击选择</option>
			<option value="0.5" <?if($zcmasterinfo->english== 0.5){echo 'selected';}?>>英语四级加0.5分</option>
			<option value="1" <?if($zcmasterinfo->english== 1){echo 'selected';}?>>英语六级加1分</option>
		</select>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="nl[enky]" <?if($zcmasterinfo->enky){echo 'checked';}?>>
			英语中级口译 1分
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.4" name="nl[computer]" <?if($zcmasterinfo->computer){echo 'checked';}?>>
			计算机二、三级 0.4分
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.2" name="nl[jz]" <?if($zcmasterinfo->jz){echo 'checked';}?>>
			中华人民共和国机动车驾驶证 0.2分
		</label>
	</div>
	<h3><span>组织交流</span></h3>
	<p>① 加分原则：学生干部的加分必须严格掌握、认真考核，与学生干部在班级学风建设及寝室文明、社团活动创建中的表现实绩挂钩，凡所在班级学风较差，所在寝室的卫生、文明较差的一律不能评为称职，不能加分，由于工作疏忽或者故意漏报、瞒报，影响班级、学院安全稳定的，一律严格扣分，分数由学院认定。
		<br />② 加分范围：担任班委、团支委、党支委、寝室长；校院两级团委、学生会、校院两级社团联合会（社管中心）、校院两级青年志愿者协会、邓小平理论读书会等组织副部长以上干部。以上干部需任职一般要满一年，且年度工作考核定为称职以上者。
		<br />③校级及以上先进个人加分标准：校级1分，省级4分，国家级6分。先进个人称号包括：优秀学生干部，优秀团员，暑期社会实践先进个人，优秀志愿者，优秀社团干部等。
		<br />④同一类项目或荣誉不累计加分，以最高分计算。集体获奖的个人可累计加分。</p>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="nl[z1]" <?if($zcmasterinfo->z1){echo 'checked';}?>>
			院学生会主席团成员及班长、团支书。 1分
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.8" name="nl[z8]" <?if($zcmasterinfo->z8){echo 'checked';}?>>
			院分团委委员、院学生会正部长、副部长。 0.8分
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.5" name="nl[z5]" <?if($zcmasterinfo->z5){echo 'checked';}?>>
			担任一年级的助班或导读 0.5分
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.3" name="nl[z3]" <?if($zcmasterinfo->z3){echo 'checked';}?>>
			校、院系学生会、团委干事、班委；0.3分
		</label>
	</div>
	<div class="form-group">
		<label>先进个人</label>
		<select class="form-control" name="nl[xjgr]">
			<option value="0" <?if($zcmasterinfo->xjgr== 0){echo 'selected';}?>>点击选择</option>
			<option value="1" <?if($zcmasterinfo->xjgr== 1){echo 'selected';}?>>校级1分</option>
			<option value="4" <?if($zcmasterinfo->xjgr== 4){echo 'selected';}?>>省级4分</option>
			<option value="6" <?if($zcmasterinfo->xjgr== 6){echo 'selected';}?>>国家级6分</option>
		</select>
	</div>
</div>
<div class="col-lg-6">
	<h3><span>实践创新</span></h3>

	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.2" name="nl[shsj]" <?if($zcmasterinfo->shsj){echo 'checked';}?>>
			参加社会实践
		</label>
	</div>
	<div class="form-group">
		<label>参加开放性实验（每参加一项加0.1分）</label>
		<input class="form-control" id="sports" type="text" name="nl[cjkfxsy]" value="<?echo $zcmasterinfo->cjkfxsy;?>" >
	</div>
	<div class="form-group">
		<label>尝试发明（以受理单为依据每项0.1分）</label>
		<input class="form-control" id="sports" type="text" name="nl[csfm]" value="<?echo $zcmasterinfo->csfm;?>" >
	</div>
	<div class="form-group">
		<label>焊接技能比赛</label>
		<select class="form-control" name="nl[hjjn]">
			<option value="0" <?if($zcmasterinfo->hjjn== 0){echo 'selected';}?>>点击选择</option>
			<option value="0.5" <?if($zcmasterinfo->hjjn== 0.5){echo 'selected';}?>>第三名 0.5分</option>
			<option value="0.7" <?if($zcmasterinfo->hjjn== 0.7){echo 'selected';}?>>第二名 0.7分</option>
			<option value="1" <?if($zcmasterinfo->hjjn== 1){echo 'selected';}?>>第一名 1分</option>
		</select>
	</div>
	<div class="form-group">
		<label>无线电测向运动</label>
		<select class="form-control" name="nl[wxdcx]">
			<option value="0" <?if($zcmasterinfo->wxdcx== 0){echo 'selected';}?>>点击选择</option>
			<option value="0.5" <?if($zcmasterinfo->wxdcx== 0.5){echo 'selected';}?>>第三名 0.5分</option>
			<option value="0.7" <?if($zcmasterinfo->wxdcx== 0.7){echo 'selected';}?>>第二名 0.7分</option>
			<option value="1" <?if($zcmasterinfo->wxdcx== 1){echo 'selected';}?>>第一名 1分</option>
		</select>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.3" name="nl[tzb]" <?if($zcmasterinfo->tzb){echo 'checked';}?>>
			参加“挑战杯”项目的申报、新苗计划、春萌计划等（申报书成功上报到校团委） 0.3分
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.1" name="nl[zzjs]" <?if($zcmasterinfo->zzjs){echo 'checked';}?>>
			积极参加校组织及以上的各项竞赛（如数学建模、电子设计竞赛等）（参与全过程但<strong><span style="color : red;">未获奖</span></strong>）0.1分
		</label>
	</div>
	<div class="form-group">
		<label>运动月（需要备注内容）</label>
		<input class="form-control" name="nl[ydy]" type="text" value="<?echo $zcmasterinfo->ydy;?>">
	</div>
	<div class="form-group">
		<label>参加弘毅讲堂 (0.1分一次 需要备注参加时间)</label>
		<input class="form-control" name="nl[hyjt]" type="text" value="<?echo $zcmasterinfo->hyjt;?>">
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.3" name="nl[ydh]" <?if($zcmasterinfo->ydh){echo 'checked';}?>>
			参加运动会项目
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.2" name="nl[r5000]" <?if($zcmasterinfo->r5000){echo 'checked';}?>>
			运动会5000米跑完全程
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.15" name="nl[r1500]" <?if($zcmasterinfo->r1500){echo 'checked';}?> >
			运动会女子1500米跑完全程
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.1" name="nl[fzgbc]" <?if($zcmasterinfo->fzgbc){echo 'checked';}?>>
			运动会方阵、广播操
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="0.4" name="nl[ydhfzr]" <?if($zcmasterinfo->ydhfzr){echo 'checked';}?>>
			运动会负责人及其工作人员
		</label>
	</div>
	<div class="form-group">
		<label>院十佳寝室</label>
		<select class="form-control" name="nl[sjqs]">
			<option value="0" <?if($zcmasterinfo->sjqs== 0){echo 'selected';}?>>点击选择</option>
			<option value="0.5" <?if($zcmasterinfo->sjqs== 0.5){echo 'selected';}?>>第三名 0.5分</option>
			<option value="0.7" <?if($zcmasterinfo->sjqs== 0.7){echo 'selected';}?>>第二名 0.7分</option>
			<option value="1" <?if($zcmasterinfo->sjqs== 1){echo 'selected';}?>>第一名 1分</option>
		</select>
	</div>
	<p>大型活动：（院杯、募捐活动、院十佳寝室、万人舞、广播操、方阵、无线电测向、焊接大赛、运动月）</p>
	<div class="form-group">
		<label>学院大型活动负责人  0.1分/次  1-2人（请在下方备注活动名称和负责人姓名）</label>
		<input class="form-control" name="nl[fzr]" type="text" value="<?echo $zcmasterinfo->fzr;?>">
	</div>
	<p>评比中，5次90分以上的，寝室成员每人加0.5分，4次的，加0.4，逐次递减，被评为优秀寝室的，每人寝室成员再加0.5分</p>
	<div class="form-group">
		<label>文明寝室</label>
		<input class="form-control" name="nl[wmqs]" type="text" value="<?echo $zcmasterinfo->wmqs;?>">
	</div>
	<div class="form-group">
		<label>进行文明寝室建设的人员 0.2分/次</label>
		<input class="form-control" name="nl[wmqsry]" type="text" value="<?echo $zcmasterinfo->wmqsry;?>">
	</div>
</div>
</div>
<div class="row">
	<div class="form-group">
		<label>备注栏(一行一条，格式：某某项目 +1分 请计算后填在上方相应处，此处仅供备注不统计分数)</label>
		<textarea class="form-control" rows="3" name="nl[nlbeizhu]"><?echo $zcmasterinfo->nlbeizhu;?></textarea>
	</div>
</div>
</div>
<div class="step-pane" id="step4">
	<div class="row">
		<br/>
		<h4>个性 （满分40）</h4>

		<p>个性分为裸加</p>
		<div class="col-lg-6">
			<table class="table table-condensed table-striped table-bordered">
				<tr>
					<td width="33">类别</td>
					<td width="31">序号</td>
					<td width="177">竞赛名称</td>
					<td width="35">序号</td>
					<td width="193">竞赛名称</td>
				</tr>
				<tr>
					<td width="33" rowspan="10">A</td>
					<td width="31">1</td>
					<td width="177">机械创新设计竞赛</td>
					<td width="35">11</td>
					<td width="193">浙江省第三届大学生工业设计竞赛</td>
				</tr>
				<tr>
					<td width="31">2</td>
					<td width="177">浙江省大学生电子设计竞赛</td>
					<td width="35">12</td>
					<td width="193">浙江省大学生财会信息化竞赛 </td>
				</tr>
				<tr>
					<td width="31">3</td>
					<td width="177">全国大学生&ldquo;飞思卡尔&rdquo;杯智能汽车竞赛 </td>
					<td width="35">13</td>
					<td width="193">浙江省大学生电子商务竞赛 </td>
				</tr>
				<tr>
					<td width="31">4</td>
					<td width="177">浙江省大学生多媒体设计大赛 </td>
					<td width="35">14</td>
					<td width="193">浙江省大学生统计调查方案设计竞赛 </td>
				</tr>
				<tr>
					<td width="31">5</td>
					<td width="177">浙江省大学生服务外包创新应用大赛 </td>
					<td width="35">15</td>
					<td width="193">全国大学生物流设计大赛 </td>
				</tr>
				<tr>
					<td width="31">6</td>
					<td width="177">浙江省大学生程序设计大赛 </td>
					<td width="35">16</td>
					<td width="193">第七届浙江省大学生英语演讲比赛 </td>
				</tr>
				<tr>
					<td width="31">7</td>
					<td width="177">浙江省大学生结构设计竞赛 </td>
					<td width="35">17</td>
					<td width="193">全国大学生数学建模竞赛 </td>
				</tr>
				<tr>
					<td width="31">8</td>
					<td width="177">全国大学生周培源力学竞赛 </td>
					<td width="35">18</td>
					<td width="193">全国大学生工程训练竞赛（浙江赛区） </td>
				</tr>
				<tr>
					<td width="31">9</td>
					<td width="177">浙江省大学生化工设计大赛 </td>
					<td width="35">19</td>
					<td width="193">浙江省大学生职业生涯规划竞赛 </td>
				</tr>
				<tr>
					<td width="31">10</td>
					<td width="177">浙江省大学生生命科学竞赛 </td>
					<td width="35" nowrap></td>
					<td width="193" nowrap></td>
				</tr>
				<tr>
					<td width="33" rowspan="9">B</td>
					<td width="31">1</td>
					<td width="177">全国大学生机械创新设计大赛慧鱼组竞赛 </td>
					<td width="35">10</td>
					<td width="193">德国&ldquo;iF concept&rdquo;大赛 </td>
				</tr>
				<tr>
					<td width="31">2</td>
					<td width="177">全国三维数字化创新设计大赛 </td>
					<td width="35">11</td>
					<td width="193">中国环境艺术设计学年奖 </td>
				</tr>
				<tr>
					<td width="31">3</td>
					<td width="177">中国机器人竞赛 </td>
					<td width="35">12</td>
					<td width="193">&ldquo;绮丽杯&rdquo;中国时装设计新人奖 </td>
				</tr>
				<tr>
					<td width="31">4</td>
					<td width="177">全国建筑电气技能大赛 </td>
					<td width="35">13</td>
					<td width="193">2012全国大学生英语竞赛 </td>
				</tr>
				<tr>
					<td width="31">5</td>
					<td width="177">中国大学生计算机设计大赛 </td>
					<td width="35">14</td>
					<td width="193">浙江省中华经典诗文诵读大赛暨浙江省推广普通话形象大使大赛 </td>
				</tr>
				<tr>
					<td width="31">6</td>
					<td width="177">全国大学生嵌入式设计大赛 </td>
					<td width="35">15</td>
					<td width="193">全国大学生演讲大赛 </td>
				</tr>
				<tr>
					<td width="31">7</td>
					<td width="177">全国软件专业人才设计与开发大赛 </td>
					<td width="35">16</td>
					<td width="193">国际大学生数学建模竞赛 </td>
				</tr>
				<tr>
					<td width="31">8</td>
					<td width="177">浙江省给水排水工程大学生创新大赛 </td>
					<td width="35">17</td>
					<td width="193">全国大学生数学竞赛 </td>
				</tr>
				<tr>
					<td width="31">9</td>
					<td width="177">浙江省基础化学知识竞赛 </td>
					<td width="35">18</td>
					<td width="193">全国大学生航空航模锦标赛（科研类） </td>
				</tr>
				<tr>
					<td width="33" rowspan="9">C</td>
					<td width="31">1</td>
					<td width="177">第六届&ldquo;潍柴动力&rdquo;汽车创新设计大赛 </td>
					<td width="35">10</td>
					<td width="193">中国包装&ldquo;创意设计&rdquo;大奖赛 </td>
				</tr>
				<tr>
					<td width="31">2</td>
					<td width="177">全国电子专业人才设计与技能大赛 </td>
					<td width="35">11</td>
					<td width="193">&ldquo;汉帛奖&rdquo;中国国际青年设计师时装作品大赛 </td>
				</tr>
				<tr>
					<td width="31">3</td>
					<td width="177">全国大学生电子信息类实践创新作品评选 </td>
					<td width="35">12</td>
					<td width="193">中国国际游艇模特大赛 </td>
				</tr>
				<tr>
					<td width="31">4</td>
					<td width="177">全国大学生网络技术大赛 </td>
					<td width="35">13</td>
					<td width="193">21世纪杯全国大学生英语演讲比赛 </td>
				</tr>
				<tr>
					<td width="31">5</td>
					<td width="177">&ldquo;中联杯&rdquo;全国大学生建筑设计竞赛 </td>
					<td width="35">14</td>
					<td width="193">浙江省高校英语报刊信息采集与解码竞赛 </td>
				</tr>
				<tr>
					<td width="31">6</td>
					<td width="177">全国城市规划专业课程作业（规划设计、调查报告）评优竞赛 </td>
					<td width="35">15</td>
					<td width="193">浙江省大学生高等数学竞赛 </td>
				</tr>
				<tr>
					<td width="31">7</td>
					<td width="177">包装结构设计大赛 </td>
					<td width="35">16</td>
					<td width="193">浙江省大学物理创新竞赛（实验） </td>
				</tr>
				<tr>
					<td width="31">8</td>
					<td width="177">&ldquo;世界之星&rdquo;包装设计竞赛 </td>
					<td width="35">17</td>
					<td width="193">浙江省大学物理创新竞赛（理论） </td>
				</tr>
				<tr>
					<td width="31">9</td>
					<td width="177">全国第三届印刷行业职业技能大赛 </td>
					<td width="35">18</td>
					<td width="193">全国光电设计竞赛 </td>
				</tr>
			</table>
		</div>
		<div class="col-lg-6">
			<h3><span>请自行添加</span></h3>

			<p>
				其中创新创业类分A、B、C三类<br/>
				<a href="http://jssb.zust.edu.cn/contents.aspx?tableName=5" target="_blank">A类竞赛查询</a>
				<br/>
				A类（省教育厅质量监控指标范围）竞赛加分标准，B类（教育部各教学指导委员会举办的全国性竞赛）竞赛加分调节系数为相应加分的0.7，C类（省级各教学指导委员会、全国性行业学会、协会举办的竞赛）竞赛加分调节系数为相应加分的0.5
				<br/>
			</p>

			<p>
				<span style="color: red"> 仅本学年（2014年09月01日~2015年08月31日）有效</span>
			</p>
			<ul class="list-group">
				<?foreach($zcgx as $val){?>
					<li class="list-group-item">
						<a href="<?=base_url("task/gxdel/$val->id");?>"><span class="badge badge-danger">删除</span></a>
					<span class="badge"><?
						switch($val->lb){
							case "a":
								$l=1;
								break;
							case "b":
								$l=0.7;
								break;
							case "c":
								$l=0.5;
								break;
							case "cy":
								$l=1;
								break;
							case "cxlqt":
								$l=1;
								break;
							case "ty":
								$l=1;
								break;
							case "gxyb":
								$l=1;
								break;
							case "gxydh":
								$l=1;
								break;
						}
						echo $s=$val->sorce."\t*\t".$l;
						echo "\t=".$s*$l;?></span>
						<?=$val->xmname;?>(<?
						switch($val->lb) {
							case 'a'    :
								echo '创新创业A类';
								break;
							case 'b'  :
								echo '创新创业B类';
								break;
							case 'c'  :
								echo '创新创业C类';
								break;
							case "cxlqt":
								echo '创新类其他';
								break;
							case 'cy' :
								echo '才艺';
								break;
							case 'ty' :
								echo '体育';
								break;
							case "gxyb":
								echo '运动会院杯';
								break;
							case "gxydh":
								echo "运动会";
								break;
							default:
								break;
						}?>)
					</li>
				<?}?>
			</ul>
			<a href="#" id="AddMoreFileBox" class="btn btn-info">添加更多</a></span></p>
			<table class="gx" id="InputsWrapper">
				<tr>
					<td>项目名</td>
					<td>比赛类别</td>
					<td>分数</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><input class="form-control" id="field_1" type="text" name="gx[0][xmname]" placeholder="填写项目名称"></td>
					<td>
						<select class="form-control" name="gx[0][lb]">
							<option value="0">请选择</option>
							<option value="a">创新创业A类</option>
							<option value="b">创新创业B类</option>
							<option value="c">创新创业C类</option>
							<option value="cxlqt">创新创业C类</option>
							<option value="cy">才艺</option>
							<option value="ty">体育</option>
							<option value="gxyb">运动会院杯</option>
							<option value="gxydh">运动会</option>
						</select>
					</td>
					<td>
						<input class="form-control" id="field_1" type="text" name="gx[0][sorce]" placeholder="(无需乘系数)">
					</td>
					<td>
						<a href="#" class="removeclass">×</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<br/>
			<br/>
			<br/>
			<input name="postAction" value="zcpost" type="hidden">
			<button type="submit" class="btn btn-success col-xs-12">提交</button>
		</div>
	</div>
</div>


</form>
</div>
</div>
<?}?>
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

<?php require_once('part/temple_config_tool.php');//右侧样式个性设置?>

<script src="<?php echo base_url(); ?>js/demo-skin-changer.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url(); ?>js/demo.js"></script>

<script src="<?php echo base_url(); ?>js/wizard.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.maskedinput.min.js"></script>

<script src="<?php echo base_url(); ?>js/scripts.js"></script>
<script src="<?php echo base_url(); ?>js/pace.min.js"></script>

<script>
	$(function () {
		$('#myWizard').wizard();

	});

	$(function () {
		var xyall = $("#xyall");// 获得jQuery对象
		var sports = $("#sports");
		var hadcredit = $("#hadcredit");
		var average = $("#average");

		average.change(function () {
			var sportnum = sports.val();//体测分数
			var hadnum = hadcredit.val();//已获得学分
			var avenum = average.val();//加权平均分

			var sum = (parseFloat(hadnum) * parseFloat(avenum) + parseFloat(sportnum) * 6) / (parseFloat(hadnum) + 6);
			xyall.val(sum.toFixed(2));
		});
		$("#xycalc").click(function () {
			var sportnum = sports.val();//体测分数
			var hadnum = hadcredit.val();//已获得学分
			var avenum = average.val();//加权平均分

			var sum = (parseFloat(hadnum) * parseFloat(avenum) + parseFloat(sportnum) * 6) / (parseFloat(hadnum) + 6);
			xyall.val(sum.toFixed(2));
		});
	});
	$(document).ready(function () {

		var MaxInputs = 20; //maximum input boxes allowed
		var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
		var AddButton = $("#AddMoreFileBox"); //Add button ID

		var x = InputsWrapper.length; //initlal text box count
		var FieldCount = 1; //to keep track of text box added

		$(AddButton).click(function (e)  //on add input button click
		{
			if (x <= MaxInputs) //max input box allowed
			{
				FieldCount++; //text box added increment
				//add input box
				var trHtml =
					'<tr><td><input class="form-control" id="field_' + FieldCount + '" type="text" name="gx[' + FieldCount + '][xmname]" placeholder="填写项目名称" ></td> <td> ' +
					'<select class="form-control" name="gx[' + FieldCount + '][lb]">' +
					'<option value="0">请选择</option>'+
					'<option value="a">创新创业A类</option>'+
					'<option value="b">创新创业B类</option>'+
					'<option value="c">创新创业C类</option>'+
					'<option value="cxlqt">创新创业C类</option>'+
					'<option value="cy">才艺</option>'+
					'<option value="ty">体育</option>'+
					'<option value="gxyb">运动会院杯</option>'+
					'<option value="gxydh">运动会</option>'+
					'</select> </td>' +
					'<td> <input class="form-control" type="text" name="gx[' + FieldCount + '][sorce]" placeholder="(无需乘系数)" > </td> ' +
					'<td> <a href="#" class="removeclass">×</a> </td> </tr>';
//                $(InputsWrapper).append('<tr><td><input type="text" name="mytext[]" id="field_'+ FieldCount +'" value="Text '+ FieldCount +'"/><a href="#" class="removeclass">×</a></td></tr>');
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

	});
</script>
</body>
</html>