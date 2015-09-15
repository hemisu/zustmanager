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
		</div>
	</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
	<h2>提交内容</h2>
</header>
<div class="main-box-body clearfix">
<div class="row cf nestable-lists">
<div class="col-md-6 dd" id="nestable">
<ol class="dd-list">
<li class="dd-item dd-item-list">
	<div class="dd-handle-list"><i class="fa fa-bars"></i></div>
	<div class="dd-handle">
		德育总分
		<div class="nested-links">
			<span class="badge"><? echo $dysum; ?></span>
		</div>
	</div>
</li>
<ol class="dd-list">
	<?
	foreach ($deyu as $key => $val) {
		switch ($key) {
			case "ztyxf"    :
				$key = '总体印象分(百分制)';
				break;
			case "xfbtzb"   :
				$key = '优良学风班、先进团支部';
				break;
			case "yxqs"     :
				$key = '优秀寝室';
				break;
			case "qtxjxjjt" :
				$key = '其他校级先进集体';
				break;
			case "tbby"     :
				$key = '通报表扬';
				break;
			case "zgdb"     :
				$key = '撰稿登播';
				break;
			case "wxtchlwjy":
				$key = '为校（院）提出合理化建议';
				break;
			case "ejxyqdjf" :
				$key = '二级学院确定的加分';
				break;
			case "xssc90"   :
				$key = '学生手册考查90分以上';
				break;
			case "zyzdx"    :
				$key = '青协星级志愿者，党校优秀学员';
				break;
			case "yjtbby"   :
				$key = '院级通报表扬';
				break;
			case "yjyxtzb"  :
				$key = '院级优秀团支部';
				break;
			case "xx"       :
				$key = '献血';
				break;
			case "pwjns"    :
				$key = '排舞吉尼斯';
				break;
			case "wsyx"     :
				$key = '参加五四毅行';
				break;
			case "ktxwgf"   :
				$key = '课堂行为规范';
				break;
			case "ssjf"     :
				$key = '宿舍减分';
				break;
			case "bwmxwsj"  :
				$key = '不文明行为纪实';
				break;
			case "wjcf"     :
				$key = '违纪处分';
				break;
			case "rjxyqdjf" :
				$key = '二级学院确定的减分';
				break;
			case "xsgbkhbhg":
				$key = '学生干部考核不合格';
				break;
			case "sxxcxy70" :
				$key = '《学生手册》内容考查70分以下或不参加考查';
				break;
			case "bcjsqsqshhd":
				$key = '不参加暑期社会实践活动';
				break;
			case "wgbasjf"  :
				$key = '无故不按时缴付学杂费或办理相关手续';
				break;
			case "dybeizhu"   :
				$key = '德育项目备注';
				if(empty($val)){break;}
				$val = explode("\n", $val);
				break;
			default:
				break;
		}
		if (!$val) {
			$val = "未填";
		}
		?>
		<li class="dd-item">
			<div class="dd-handle">
				<? echo $key; ?>
				<div class="nested-links">
          <span class="badge"><?if (!is_array($val)) {
		          echo $val;
	          }?></span>
				</div>
			</div>
		</li>
		<?
		if (is_array($val)) {
			?>
			<ol class="dd-list">
				<? foreach ($val as $key => $val) { ?>
					<li class="dd-item">
						<div class="dd-handle">
							<? echo $val; ?>
						</div>
					</li>
				<? } ?>
			</ol>
		<?
		}
	}
	?>
</ol>
<li class="dd-item dd-item-list">
	<div class="dd-handle-list"><i class="fa fa-bars"></i></div>
	<div class="dd-handle">
		学业总分
		<div class="nested-links">
      <span class="badge"><?
        if (!$xy['all']) {
          echo '未填';
          $xysum = 0;
        } else {
          if ($xy['all'] > 100) {
            echo $xysum = 70;
          } else {
            echo $xysum = $xy['all'] * 0.7;
          }
        }
        ?>
      </span>
		</div>
	</div>
</li>
<ol class="dd-list">
	<?
	foreach ($xy as $key => $val) {
		switch ($key) {
			case "all"      :
				$key = "学业总成绩(百分制)";
				break;
			case "sports"   :
				$key = "体测分数";
				break;
			case "hadcredit":
				$key = "已获得学分";
				break;
			case "average"  :
				$key = "学业加权平均分";
				break;
			default:
				break;
		}
		if (!$val) {
			$val = "未填";
		}
		?>
		<li class="dd-item">
			<div class="dd-handle">
				<? echo $key; ?>
				<div class="nested-links">
					<span class="badge"><? echo $val; ?></span>
				</div>
			</div>
		</li>
	<?
	}
	?>
</ol>
<li class="dd-item dd-item-list">
	<div class="dd-handle-list"><i class="fa fa-bars"></i></div>
	<div class="dd-handle">
		个性总分
		<div class="nested-links">
			<span class="badge"><? echo $gxsum; ?></span>
		</div>
	</div>
</li>
<ol class="dd-list">
	<?foreach($zcgx as $val){?>
	<li class="dd-item">
	<div class="dd-handle">
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
			case 'cxlqt'  :
				echo '创新创业其他';
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
		<div class="nested-links">
      <span
        class="badge"><?
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
	        case "cxlqt":
		        $l=1;
		        break;
          case "cy":
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
		</div>
	</div>
	</li>
	<?}?>
</ol>
</ol>
</div>
<div class="col-md-6 dd" id="nestable">
	<ol class="dd-list">
		<li class="dd-item dd-item-list">
			<div class="dd-handle-list"><i class="fa fa-bars"></i></div>
			<div class="dd-handle">
				能力总分
				<div class="nested-links">
          <span class="badge"><?
            $nlsum = array_sum($nl)+6;//基础能力分+6
            if ($nlsum > 15) {
              echo $nlsum = 15;;
            } else {
              echo $nlsum;
            }?></span>
				</div>
			</div>
		</li>
		<ol class="dd-list">
			<li class="dd-item">
				<div class="dd-handle">
					基础能力分
					<div class="nested-links">
							<span class="badge">6</span>
					</div>
				</div>
			</li>
			<?
			foreach ($nl as $key => $val) {
				switch ($key) {
					case "zypm"     :
						$key = "课程学习成绩在专业排名情况";
						break;
					case "fxk"      :
						$key = "辅修课";
						break;
					case "zysy"     :
						$key = "参加并递交职业生涯规划大赛文本";
						break;
					case "xsbg"     :
						$key = "听学术讲座报告";
						if ($val >= 0.6) {
							$val = 0.6;
						}
						break;
					case "zs"       :
						$key = "考证情况";
						break;
					case "english"  :
						$key = "英语四六级";
						break;
					case "enky"     :
						$key = "英语中级口译";
						break;
					case "computer" :
						$key = "计算机二、三级";
						break;
					case "jz"       :
						$key = "驾照";
						break;
					case "z1"       :
						$key = "院学生会主席团成员及班长、团支书";
						break;
					case "z8"       :
						$key = "院分团委委员、院学生会正部长、副部长";
						break;
					case "z5"       :
						$key = "担任一年级的助班或导读";
						break;
					case "z3"       :
						$key = "校、院系学生会、团委干事、班委；";
						break;
					case "xjgr"     :
						$key = "先进个人";
						break;
					case "shsj"     :
						$key = "参加社会实践";
						break;
					case "cjkfxsy"     :
						$key = "参加开放性试验";
						break;
					case "csfm"     :
						$key = "尝试发明";
						break;
					case "hjjn"     :
						$key = "焊接技能比赛";
						break;
					case "wxdcx"    :
						$key = "无线电测向运动";
						break;
					case "tzb"      :
						$key = "参加“挑战杯”项目的申报、新苗计划、春萌计划等";
						break;
					case "zzjs"     :
						$key = "积极参加校组织及以上的各项竞赛但未获奖";
						break;
					case "ydy"      :
						$key = "运动月";
						break;
					case "hyjt"     :
						$key = "参加弘毅讲堂";
						break;
					case "ydh"      :
						$key = "参加运动会项目";
						break;
					case "r5000"     :
						$key = "运动会5000米跑完全程";
						break;
					case "r1500"     :
						$key = "运动会女子1500米跑完全程";
						break;
					case "fzgbc"    :
						$key = "运动会方阵、广播操";
						break;
					case "ydhfzr"   :
						$key = "运动会负责人及其工作人员";
						break;
					case "sjqs"     :
						$key = "院十佳寝室";
						break;
					case "fzr"      :
						$key = "学院大型活动负责人";
						break;
					case "wmqs"     :
						$key = "文明寝室";
						break;
					case "wmqsry"   :
						$key = "进行文明寝室建设的人员";
						break;
					case "nlbeizhu"   :
						$key = '能力项目备注';
						if(empty($val)){break;}
						$val = explode("\n", $val);
						break;
					default:
						break;
				}
				if (!$val) {
					$val = "未填";
				}
				?>
				<li class="dd-item">
					<div class="dd-handle">
						<? echo $key; ?>
						<div class="nested-links">
							<span class="badge"><? if (!is_array($val)) {
									echo $val;
								} ?></span>
						</div>
					</div>
				</li>
				<?
				if (is_array($val)) {
					?>
					<ol class="dd-list">
						<? foreach ($val as $key => $val) { ?>
							<li class="dd-item">
								<div class="dd-handle">
									<? echo $val; ?>
								</div>
							</li>
						<? } ?>
					</ol>
				<?
				}
			}
			?>
		</ol>
		<li class="dd-item dd-item-list">
			<div class="dd-handle-list"><i class="fa fa-bars"></i></div>
			<div class="dd-handle">
				综合测评总分
				<div class="nested-links">
          <span class="badge"><?
            echo $dysum + $xysum + $nlsum + $gxsum;?></span>
				</div>
			</div>
		</li>
		<div class="alert alert-success">
			<i class="fa fa-check-circle fa-fw fa-lg"></i>
			<strong>提交成功！</strong> 如果还需要修改请点击下方按钮修改
		</div>
		<a class="btn btn-info col-xs-12" href="<?=base_url('task')?>">重新填写</a>
	</ol>
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


</body>
</html>