<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Centaurus - Bootstrap Admin Template</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap/bootstrap.min.css"/>
 
<script src="js/demo-rtl.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/libs/nanoscroller.css"/>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/compiled/theme_styles.css"/>
 
<link rel="stylesheet" href="<?php echo base_url();?>css/libs/fullcalendar.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/libs/fullcalendar.print.css" type="text/css" media="print"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/compiled/calendar.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/libs/morris.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/libs/jquery-jvectormap-1.2.2.css" type="text/css"/>
 
<link type="image/x-icon" href="<?php echo base_url();?>favicon.png" rel="shortcut icon"/>
 
<link href='http://fonts.useso.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
<script type="text/javascript">
(function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);b=0;for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
/* ]]> */
</script>
</head>
<body>
<div id="theme-wrapper">
	<header class="navbar" id="header-navbar">
	<div class="container">
	<a href="index.html" id="logo" class="navbar-brand">
	<img src="<?php echo base_url();?>img/logo.png" alt="" class="normal-logo logo-white"/>
	<img src="<?php echo base_url();?>img/logo-black.png" alt="" class="normal-logo logo-black"/>
	<img src="<?php echo base_url();?>img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
	</a>
	<div class="clearfix">
	<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
	<span class="sr-only">Toggle navigation</span>
	<span class="fa fa-bars"></span>
	</button>
	<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
	<ul class="nav navbar-nav pull-left">
	<li>
	<a class="btn" id="make-small-nav">
	<i class="fa fa-bars"></i>
	</a>
	</li>
	</ul>
	</div>
	<div class="nav-no-collapse pull-right" id="header-nav">
	<ul class="nav navbar-nav pull-right">
	<li class="mobile-search">
	<a class="btn">
	<i class="fa fa-search"></i>
	</a>
	<div class="drowdown-search">
		<form role="search">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="搜索...">
		<i class="fa fa-search nav-search-icon"></i>
		</div>
		</form>
	</div>
	</li>
		<li class="dropdown hidden-xs">
		<a class="btn dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-warning"></i>
		<span class="count">1</span>
		</a>
			<ul class="dropdown-menu notifications-list">
			<li class="pointer">
			<div class="pointer-inner">
			<div class="arrow"></div>
			</div>
			</li>
			<li class="item-header">你有6条新消息</li>
			<li class="item">
			<a href="#">
			<i class="fa fa-comment"></i>
			<span class="content">在XXX有了新的评论</span>
			<span class="time"><i class="fa fa-clock-o"></i>13 min前.</span>
			</a>
			</li>
			<li class="item">
			<a href="#">
			<i class="fa fa-plus"></i>
			<span class="content">新的任务</span>
			<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
			</a>
			</li>
			
			<li class="item-footer">
			<a href="#">
			查看所有的消息
			</a>
			</li>
			</ul>
	</li>
	<li class="dropdown hidden-xs">
	<a class="btn dropdown-toggle" data-toggle="dropdown">
	<i class="fa fa-envelope-o"></i>
	<span class="count">2</span>
	</a>
		<ul class="dropdown-menu notifications-list messages-list">
		<li class="pointer">
		<div class="pointer-inner">
		<div class="arrow"></div>
		</div>
		</li>
		<li class="item first-item">
		<a href="#">
		<img src="<?php echo base_url();?>img/samples/messages-photo-1.png" alt="头像"/>
		<span class="content">
		<span class="content-headline">
		李某某
		</span>
		<span class="content-text">
		看，我给你发了一条消息
		</span>
		</span>
		<span class="time"><i class="fa fa-clock-o"></i>13 min前.</span>
		</a>
		</li>
		<li class="item">
		<a href="#">
		<img src="<?php echo base_url();?>img/samples/messages-photo-2.png" alt=""/>
		<span class="content">
		<span class="content-headline">
		赵某某
		</span>
		<span class="content-text">
		你好，这是我的联系方式
		</span>
		</span>
		<span class="time"><i class="fa fa-clock-o"></i>13 min前.</span>
		</a>
		</li>
		
		<li class="item-footer">
		<a href="#">
		查看所有的私信
		</a>
		</li>
		</ul>
	</li>
	<li class="hidden-xs">
	<a class="btn">
	<i class="fa fa-cog"></i>
	</a>
	</li>
	<li class="dropdown profile-dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<img src="<?php echo base_url();?>img/samples/scribble.jpg" alt=""/>
	<span class="hidden-xs">何米酥</span> <b class="caret"></b>
	</a>
	<ul class="dropdown-menu">
	<li><a href="user-profile.html"><i class="fa fa-user"></i>个人资料</a></li>
	<li><a href="#"><i class="fa fa-cog"></i>设置</a></li>
	<li><a href="#"><i class="fa fa-envelope-o"></i>消息</a></li>
	<li><a href="#"><i class="fa fa-power-off"></i>注销</a></li>
	</ul>
	</li>
	<li class="hidden-xxs">
	<a class="btn">
	<i class="fa fa-power-off"></i>
	</a>
	</li>
	</ul>
	</div>
	</div>
	</div>
</header>
<div id="page-wrapper" class="container">
	<div class="row">
	<div id="nav-col">
	<section id="col-left" class="col-left-nano">
	<div id="col-left-inner" class="col-left-nano-content">
	<div id="user-left-box" class="clearfix hidden-sm hidden-xs">
	<img alt="" src="<?php echo base_url();?>img/samples/scribble.jpg"/>
	<div class="user-box">
	<span class="name">
	Welcome<br/>
	何米酥
	</span>
	<span class="status">
	<i class="fa fa-circle"></i> Online
	</span>
	</div>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
	<ul class="nav nav-pills nav-stacked">
	<li class="active">
	<a href="index.html">
	<i class="fa fa-dashboard"></i>
	<span>控制台</span>
	<span class="label label-info label-circle pull-right">3</span>
	</a>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-table"></i>
	<span>表格</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="tables.html">
	Simple
	</a>
	</li>
	<li>
	<a href="tables-advanced.html">
	Advanced
	</a>
	</li>
	<li>
	<a href="users.html">
	Users
	</a>
	</li>
	</ul>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-envelope"></i>
	<span>邮件</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="email-inbox.html">
	Inbox
	</a>
	</li>
	<li>
	<a href="email-detail.html">
	Detail
	</a>
	</li>
	<li>
	<a href="email-compose.html">
	Compose
	</a>
	</li>
	</ul>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-bar-chart-o"></i>
	<span>图表</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="graphs-morris.html">
	Morris &amp; Mixed
	</a>
	</li>
	<li>
	<a href="graphs-flot.html">
	Flot
	</a>
	</li>
	<li>
	<a href="graphs-dygraphs.html">
	Dygraphs
	</a>
	</li>
	<li>
	<a href="graphs-xcharts.html">
	xCharts
	</a>
	</li>
	</ul>
	</li>
	<li>
	<a href="widgets.html">
	<i class="fa fa-th-large"></i>
	<span>工具</span>
	<span class="label label-success pull-right">New</span>
	</a>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-desktop"></i>
	<span>页面</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="calendar.html">
	Calendar
	</a>
	</li>
	<li>
	<a href="gallery.html">
	Gallery
	</a>
	</li>
	<li>
	<a href="gallery-v2.html">
	Gallery v2
	</a>
	</li>
	<li>
	<a href="pricing.html">
	Pricing
	</a>
	</li>
	<li>
	<a href="projects.html">
	Projects
	</a>
	</li>
	<li>
	<a href="team-members.html">
	Team Members
	</a>
	</li>
	<li>
	<a href="timeline.html">
	Timeline
	</a>
	</li>
	<li>
	<a href="timeline-grid.html">
	Timeline Grid
	</a>
	</li>
	<li>
	<a href="user-profile.html">
	User Profile
	</a>
	</li>
	<li>
	<a href="search.html">
	Search Results
	</a>
	</li>
	<li>
	<a href="invoice.html">
	Invoice
	</a>
	</li>
	<li>
	<a href="intro.html">
	Tour Layout
	</a>
	</li>
	</ul>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-edit"></i>
	<span>表单</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="form-elements.html">
	Elements
	</a>
	</li>
	<li>
	<a href="x-editable.html">
	X-Editable
	</a>
	</li>
	<li>
	<a href="form-wizard.html">
	Wizard
	</a>
	</li>
	<li>
	<a href="form-wizard-popup.html">
	Wizard popup
	</a>
	</li>
	<li>
	<a href="form-wysiwyg.html">
	WYSIWYG
	</a>
	</li>
	<li>
	<a href="form-summernote.html">
	WYSIWYG Summernote
	</a>
	</li>
	<li>
	<a href="form-ckeditor.html">
	WYSIWYG CKEditor
	</a>
	</li>
	<li>
	<a href="form-dropzone.html">
	Multiple File Upload
	</a>
	</li>
	</ul>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-desktop"></i>
	<span>UI工具</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="ui-elements.html">
	Elements
	</a>
	</li>
	<li>
	<a href="notifications.html">
	Notifications &amp; Alerts
	</a>
	</li>
	<li>
	<a href="modals.html">
	Modals
	</a>
	</li>
	<li>
	<a href="video.html">
	Video
	</a>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	Icons
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="icons-awesome.html">
	Awesome Icons
	</a>
	</li>
	<li>
	<a href="icons-halflings.html">
	Halflings Icons
	</a>
	</li>
	</ul>
	</li>
	<li>
	<a href="ui-nestable.html">
	Nestable List
	</a>
	</li>
	<li>
	<a href="typography.html">
	Typography
	</a>
	</li>
	<li>
	<a href="#" class="dropdown-toggle">
	3 Level Menu
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="#">
	3rd Level
	</a>
	</li>
	<li>
	<a href="#">
	3rd Level
	</a>
	</li>
	<li>
	<a href="#">
	3rd Level
	</a>
	</li>
	</ul>
	</li>
	</ul>
	</li>
	
	<li>
	<a href="#" class="dropdown-toggle">
	<i class="fa fa-file-text-o"></i>
	<span>其他页面</span>
	<i class="fa fa-chevron-circle-right drop-icon"></i>
	</a>
	<ul class="submenu">
	<li>
	<a href="faq.html">
	FAQ
	</a>
	</li>
	<li>
	<a href="emails.html">
	Email Templates
	</a>
	</li>
	<li>
	<a href="login.html">
	Login
	</a>
	</li>
	<li>
	<a href="login-full.html">
	Login Full
	</a>
	</li>
	<li>
	<a href="registration.html">
	Registration
	</a>
	</li>
	<li>
	<a href="registration-full.html">
	Registration Full
	</a>
	</li>
	<li>
	<a href="forgot-password.html">
	Forgot Password
	</a>
	</li>
	<li>
	<a href="forgot-password-full.html">
	Forgot Password Full
	</a>
	</li>
	<li>
	<a href="lock-screen.html">
	Lock Screen
	</a>
	</li>
	<li>
	<a href="lock-screen-full.html">
	Lock Screen Full
	</a>
	</li>
	<li>
	<a href="error-404.html">
	Error 404
	</a>
	</li>
	<li>
	<a href="error-404-v2.html">
	Error 404 Nested
	</a>
	</li>
	<li>
	<a href="error-500.html">
	Error 500
	</a>
	</li>
	<li>
	<a href="extra-grid.html">
	Grid
	</a>
	</li>
	</ul>
	</li>
	</ul>
	</div>
	</div>
	</section>
	</div>
	<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
			<div class="col-lg-12">
			<ol class="breadcrumb">
			<li><a href="#">主页</a></li>
			<li class="active"><span>控制台</span></li>
			</ol>
			<h1>控制台</h1>
			</div>
			</div>
			
			<div class="row">
			<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box">
			<i class="fa fa-user red-bg"></i>
			<span class="headline">用户</span>
			<span class="value">
			<span class="timer" data-from="120" data-to="2562" data-speed="1000" data-refresh-interval="50">
			2562
			</span>
			</span>
			</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box">
			<i class="fa fa-shopping-cart emerald-bg"></i>
			<span class="headline">购物</span>
			<span class="value">
			<span class="timer" data-from="30" data-to="658" data-speed="800" data-refresh-interval="30">
			658
			</span>
			</span>
			</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box">
			<i class="fa fa-money green-bg"></i>
			<span class="headline">收入</span>
			<span class="value">
			&#36;<span class="timer" data-from="83" data-to="8400" data-speed="900" data-refresh-interval="60">
			8400
			</span>
			</span>
			</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box">
			<i class="fa fa-eye yellow-bg"></i>
			<span class="headline">被访问量</span>
			<span class="value">
			<span class="timer" data-from="539" data-to="12526" data-speed="1100">
			12526
			</span>
			</span>
			</div>
			</div>
			</div>

		<div class="row">
		<div class="col-lg-12">
			<div class="main-box clearfix">
				<header class="main-box-header clearfix">
				<h2 class="pull-left">最新任务</h2>
				<div class="filter-block pull-right">
				<div class="form-group pull-left">
				<input type="text" class="form-control" placeholder="Search...">
				<i class="fa fa-search search-icon"></i>
				</div>
				<a href="#" class="btn btn-primary pull-right">
				<i class="fa fa-eye fa-lg"></i> View all tasks
				</a>
				</div>
				</header>
				<div class="main-box-body clearfix">
					<div class="table-responsive clearfix">
						<table class="table table-hover">
							<thead>
							<tr>
							<th><a href="#"><span>任务 ID</span></a></th>
							<th><a href="#" class="desc"><span>时间</span></a></th>
							<th><a href="#" class="asc"><span>简介</span></a></th>
							<th class="text-center"><span>状态</span></th>
							<th class="text-right"><span>备注</span></th>
							<th>&nbsp;</th>
							</tr>
							</thead>
						<tbody>
						<tr>
							<td>
							<a href="#">#150620</a>
							</td>
							<td>
							2015/06/20
							</td>
							<td>
							<a href="#">2015暑假留校统计</a>
							</td>
							<td class="text-center">
							<span class="label label-success">Completed</span>
							</td>
							<td class="text-right">
							&dollar; 825.50
							</td>
							<td class="text-center" style="width: 15%;">
							<a href="#" class="table-link">
							<span class="fa-stack">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
							</span>
							</a>
							</td>
						</tr>
						<tr>
							<td>
							<a href="#">#5832</a>
							</td>
							<td>
							2013/08/06
							</td>
							<td>
							<a href="#">John Wayne</a>
							</td>
							<td class="text-center">
							<span class="label label-warning">On hold</span>
							</td>
							<td class="text-right">
							&dollar; 923.93
							</td>
							<td class="text-center" style="width: 15%;">
							<a href="#" class="table-link">
							<span class="fa-stack">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
							</span>
							</a>
							</td>
						</tr>
						<tr>
							<td>
							<a href="#">#2547</a>
							</td>
							<td>
							2013/08/07
							</td>
							<td>
							<a href="#">Anthony Hopkins</a>
							</td>
							<td class="text-center">
							<span class="label label-info">Pending</span>
							</td>
							<td class="text-right">
							&dollar; 1.625.50
							</td>
							<td class="text-center" style="width: 15%;">
							<a href="#" class="table-link">
							<span class="fa-stack">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
							</span>
							</a>
							</td>
						</tr>
						<tr>
							<td>
							<a href="#">#9274</a>
							</td>
							<td>
							2013/08/08
							</td>
							<td>
							<a href="#">Charles Chaplin</a>
							</td>
							<td class="text-center">
							<span class="label label-danger">Cancelled</span>
							</td>
							<td class="text-right">
							&dollar; 35.34
							</td>
							<td class="text-center" style="width: 15%;">
							<a href="#" class="table-link">
							<span class="fa-stack">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
							</span>
							</a>
							</td>
						</tr>
						<tr>
							<td>
							<a href="#">#8463</a>
							</td>
							<td>
							2013/08/08
							</td>
							<td>
							<a href="#">Gary Cooper</a>
							</td>
							<td class="text-center">
							<span class="label label-success">Completed</span>
							</td>
							<td class="text-right">
							&dollar; 34.199.99
							</td>
							<td class="text-center" style="width: 15%;">
							<a href="#" class="table-link">
							<span class="fa-stack">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
							</span>
							</a>
							</td>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>





			<footer id="footer-bar" class="row">
			<p id="footer-copyright" class="col-xs-12">
			&copy; 2014 <a href="http://www.adbee.sk/" target="_blank">Adbee digital</a>. Powered by Centaurus Theme.
			</p>
			</footer>
		</div>
	</div>
	</div>
	</div>
<div id="config-tool" class="closed">
<a id="config-tool-cog">
<i class="fa fa-cog"></i>
</a>
<div id="config-tool-options">
<h4>Layout Options</h4>
<ul>
<li>
<div class="checkbox-nice">
<input type="checkbox" id="config-fixed-header"/>
<label for="config-fixed-header">
Fixed Header
</label>
</div>
</li>
<li>
<div class="checkbox-nice">
<input type="checkbox" id="config-fixed-sidebar"/>
<label for="config-fixed-sidebar">
Fixed Left Menu
</label>
</div>
</li>
<li>
<div class="checkbox-nice">
<input type="checkbox" id="config-fixed-footer"/>
<label for="config-fixed-footer">
Fixed Footer
</label>
</div>
</li>
<li>
<div class="checkbox-nice">
<input type="checkbox" id="config-boxed-layout"/>
<label for="config-boxed-layout">
Boxed Layout
</label>
</div>
</li>

</ul>
<br/>
<h4>Skin Color</h4>
<ul id="skin-colors" class="clearfix">
<li>
<a class="skin-changer" data-skin="" data-toggle="tooltip" title="Default" style="background-color: #34495e;">
</a>
</li>
<li>
<a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #2ecc71;">
</a>
</li>
<li>
<a class="skin-changer blue-gradient" data-skin="theme-blue-gradient" data-toggle="tooltip" title="Gradient">
</a>
</li>
<li>
<a class="skin-changer" data-skin="theme-turquoise" data-toggle="tooltip" title="Green Sea" style="background-color: #1abc9c;">
</a>
</li>
<li>
<a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9b59b6;">
</a>
</li>
<li>
<a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #2980b9;">
</a>
</li>
<li>
<a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e74c3c;">
</a>
</li>
<li>
<a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #3498db;">
</a>
</li>
</ul>
</div>
</div>
 
<script src="<?=base_url();?>js/demo-skin-changer.js"></script>
<script src="<?=base_url();?>js/jquery.js"></script>
<script src="<?=base_url();?>js/bootstrap.js"></script>
<script src="<?=base_url();?>js/jquery.nanoscroller.min.js"></script>
<script src="<?=base_url();?>js/demo.js"></script>
 
<script src="<?=base_url();?>js/jquery-ui.custom.min.js"></script>
<script src="<?=base_url();?>js/fullcalendar.min.js"></script>
<script src="<?=base_url();?>js/jquery.slimscroll.min.js"></script>
<script src="<?=base_url();?>js/raphael-min.js"></script>
<script src="<?=base_url();?>js/morris.min.js"></script>
<script src="<?=base_url();?>js/moment.min.js"></script>
<script src="<?=base_url();?>js/daterangepicker.js"></script>
<script src="<?=base_url();?>js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url();?>js/jquery-jvectormap-world-merc-en.js"></script>
<script src="<?=base_url();?>js/gdp-data.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.min.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.pie.min.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.stack.min.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.resize.min.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.time.min.js"></script>
<script src="<?=base_url();?>js/flot/jquery.flot.threshold.js"></script>
<script src="<?=base_url();?>js/jquery.countTo.js"></script>
 
<script src="<?=base_url();?>js/scripts.js"></script>
<script src="<?=base_url();?>js/pace.min.js"></script>
 
<script>
	$(document).ready(function() {
		
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var calendar = $('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title',
				right: 'prev,next'
			},
			isRTL: $('body').hasClass('rtl'), //rtl support for calendar
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// copy label class from the event object
				var labelClass = $(this).data('eventclass');
				
				if (labelClass) {
					copiedEventObject.className = labelClass;
				}
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			buttonText: {
				prev: '<i class="fa fa-chevron-left"></i>',
				next: '<i class="fa fa-chevron-right"></i>'
			},
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1),
					className: 'label-success'
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false,
					className: 'label-danger'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					className: 'label-info'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					className: 'label-success'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
					className: 'label-info'
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/',
					className: 'label-danger'
				}
			]
		});
		
	    $('.conversation-inner').slimScroll({
	        height: '332px',
	        alwaysVisible: false,
	        railVisible: true,
	        wheelStep: 5,
	        allowPageScroll: false
	    });
		
	    //CHARTS
		graphLine = Morris.Line({
			element: 'graph-line',
			data: [
				{period: '2014-01-01', iphone: 2666, ipad: null, itouch: 2647},
				{period: '2014-01-02', iphone: 9778, ipad: 2294, itouch: 2441},
				{period: '2014-01-03', iphone: 4912, ipad: 1969, itouch: 2501},
				{period: '2014-01-04', iphone: 3767, ipad: 3597, itouch: 5689},
				{period: '2014-01-05', iphone: 6810, ipad: 1914, itouch: 2293},
				{period: '2014-01-06', iphone: 5670, ipad: 4293, itouch: 1881},
				{period: '2014-01-07', iphone: 4820, ipad: 3795, itouch: 1588},
				{period: '2014-01-08', iphone: 15073, ipad: 5967, itouch: 5175},
				{period: '2014-01-09', iphone: 10687, ipad: 4460, itouch: 2028},
				{period: '2014-01-10', iphone: 8432, ipad: 5713, itouch: 1791}
			],
			lineColors: ['#ffffff'],
			xkey: 'period',
			ykeys: ['iphone'],
			labels: ['iPhone'],
			pointSize: 3,
			hideHover: 'auto',
			gridTextColor: '#ffffff',
			gridLineColor: 'rgba(255, 255, 255, 0.3)',
			resize: true
		});
	    
		//WORLD MAP
		$('#world-map').vectorMap({
			map: 'world_merc_en',
			backgroundColor: '#ffffff',
			zoomOnScroll: false,
			regionStyle: {
				initial: {
					fill: '#e1e1e1',
					stroke: 'none',
					"stroke-width": 0,
					"stroke-opacity": 1
				},
				hover: {
					"fill-opacity": 0.8
				},
				selected: {
					fill: '#8dc859'
				},
				selectedHover: {
				}
			},
			series: {
				regions: [{
					values: gdpData,
					scale: ['#6fc4fe', '#2980b9'],
					normalizeFunction: 'polynomial'
				}]
			},
			onRegionLabelShow: function(e, el, code){
				el.html(el.html()+' ('+gdpData[code]+')');
			}
		});
		
		$('.infographic-box .value .timer').countTo({});
		
	});
	</script>
</body>
</html>