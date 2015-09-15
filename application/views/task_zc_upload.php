<?php
/**
 * Created by PhpStorm.
 * User: Misu
 * Date: 2015/9/12
 * Time: 20:42
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>综合测评凭证上传 - 学生管理系统</title>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/bootstrap/bootstrap.min.css"/>

	<script src="<?php echo QINIUYUN; ?>js/demo-rtl.js"></script>


	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/nanoscroller.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/compiled/theme_styles.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/libs/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/uploader.css">
	<link rel="stylesheet" type="text/css" href="<?php echo QINIUYUN; ?>css/demo.css">

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
								<li class="active"><span>综合测评凭证提交</span></li>
							</ol>
							<h1>综测凭证提交</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
								<h2>综合测评凭证提交</h2>（<a href="<?=base_url('task/tlist')?>">总表</a>）
								（<a href="<?=base_url("task/zc/sid/$loginUserid")?>">个人表</a>）
							</header>
							<div class="main-box-body clearfix">
								<div class="container demo-wrapper">
									<div class="page-header">
										<h1>Upload <small>请将自己的证书以照片的形式上传，刷新本页面查看文件列表</small></h1>
<!--										--><?//=urldecode("%E7%9A%84%E7%BB%BC%E6%B5%8B%E5%87%AD%E6%8D%AE");?>
									</div>
									<table class="table table-condensed table-hover">
										<tr>
											<td>文件名</td>
											<td>浏览(点击浏览大图)</td>
											<td>操作</td>
										</tr>
										<?
										$filelist=$this->db->from('upload')->where('student_id',$userinfo['student_id'])->get()->result();
										foreach($filelist as $row){
											?>
											<tr>
												<td><?=$row->fname;?></td>
												<td><a href="http://7xliuv.com1.z0.glb.clouddn.com/<?=$row->fkey;?>"> <img src="http://7xliuv.com1.z0.glb.clouddn.com/<?=$row->fkey;?>?imageView2/1/w/80/interlace/1"> </a></td>
												<td><a href="<?=base_url("upload/delkey/$row->fkey");?>">删除</a> </td>
											</tr>
										<?
										}
										?>
									</table>
									<div class="row demo-columns">
										<div class="col-md-6">
											<!-- D&D Zone-->
											<div id="drag-and-drop-zone" class="uploader">
												<div>将照片拖入此</div>
												<div class="or">-or-</div>
												<div class="browser">
													<label>
														<span>点击浏览</span>
														<input type="file" name="files[]"  accept="image/*" multiple="multiple" title='Click to add Images'>
													</label>
												</div>
											</div>
											<!-- /D&D Zone -->

											<!-- Debug box -->
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">调试台</h3>
												</div>
												<div class="panel-body demo-panel-debug">
													<ul id="demo-debug">
													</ul>
												</div>
											</div>
											<!-- /Debug box -->
										</div>
										<!-- / Left column -->

										<div class="col-md-6">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">上传列表</h3>
												</div>
												<div class="panel-body demo-panel-files" id='demo-files'>
													<span class="demo-note">No Files have been selected/droped yet...</span>
												</div>
											</div>
										</div>
										<!-- / Right column -->
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
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/bootstrap.js"></script>
<script src="<?php echo QINIUYUN; ?>js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/demo.js"></script>


<script src="<?php echo QINIUYUN; ?>js/jquery.slimscroll.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/jquery.magnific-popup.min.js"></script>

<script src="<?php echo QINIUYUN; ?>js/scripts.js"></script>
<script src="<?php echo QINIUYUN; ?>js/pace.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/demo-preview.min.js"></script>
<script src="<?php echo QINIUYUN; ?>js/dmuploader.min.js"></script>
<script type="text/javascript">
	$('#drag-and-drop-zone').dmUploader({
		url: 'http://up.qiniu.com',
		dataType: 'json',
		extraData: {
			"token":"<?=$upToken;?>",
			"x:desc":"<?=$loginUserid.'zc_evidence';?>"
		},
		allowedTypes: 'image/*',
		extFilter:'jpg;png;gif',
		onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
		},
		onBeforeUpload: function(id){
			$.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

			$.danidemo.updateFileStatus(id, 'default', 'Uploading...');
		},
		onNewFile: function(id, file){
			$.danidemo.addFile('#demo-files', id, file);

			/*** Begins Image preview loader ***/
			if (typeof FileReader !== "undefined"){

				var reader = new FileReader();

				// Last image added
				var img = $('#demo-files').find('.demo-image-preview').eq(0);

				reader.onload = function (e) {
					img.attr('src', e.target.result);
				}

				reader.readAsDataURL(file);

			} else {
				// Hide/Remove all Images if FileReader isn't supported
				$('#demo-files').find('.demo-image-preview').remove();
			}
			/*** Ends Image preview loader ***/

		},
		onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
		},
		onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
		},
		onUploadSuccess: function(id, data){
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
		},
		onUploadError: function(id, message){
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
		},
		onFileTypeError: function(file){
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
		},
		onFileSizeError: function(file){
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
		},
		onFallbackMode: function(message){
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
		}
	});
</script>


</body>
</html>