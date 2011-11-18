<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/demo_page.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/demo_table_jui.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url()?>ckfinder/ckfinder.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #poll').addClass('current-top');
</script>

<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">

	<form action="<?=base_url()?>index.php/post/addPost" method="post">
    	<table style="width:100%" border="0" cellspacing="10" cellpadding="2">
			<tr>
				<td width="78%">
				<p><h2>Thêm bài viết</h2></p>
				</td>
				<td>&nbsp;
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" style="width:100%; height:50px; margin-bottom:10px; font-size:20px; font-family:'Times New Roman', Times, serif; background-color:#CCCCCC; color:#666666" value="<?=$bv_tam[0]['tuade']?>" placeholder="Điền tiêu đề bài viết..." name="title" id="title" onFocus="if(this.value=='Điền tiêu đề bài viết...'){this.value=''}; this.style.backgroundColor='#fffda8';" onBlur="this.style.backgroundColor='#CCCCCC';if(this.value==''){this.value='Điền tiêu đề bài viết...'};" >
				
					<textarea cols="100" id="editor1" name="editor1" rows="10"><?=$bv_tam[0]['luunhap']?></textarea>
					
					<script type="text/javascript">
						var flag = true;
						var timer_start = false;
						var timer;
					//<![CDATA[
						// Replace the <textarea id="editor1"> with an CKEditor instance.
						var editor = CKEDITOR.replace( 'editor1', { enterMode		: 2, shiftEnterMode	: 2} );
						CKFinder.setupCKEditor( editor, '<?=base_url()?>ckfinder/' );
					//]]>
						CKEDITOR.instances.editor1.on('instanceReady',function(e){
							this.document.on("keyup", function() {
								
								if(timer_start == false) {
									timer_start = true;
									timer = setInterval(function(){
										$('#notice').text('Saving...');
										$.ajax({type:'post',
												url:'<?=base_url()?>index.php/post/autoSave',
												data :{data:CKEDITOR.instances.editor1.getData(),title:document.getElementById('title').value},
												dataType: 'text',
												success: function(data){
													$('#notice').text('Saved');
													setTimeout(function(){
														$('#notice').text('');
													},1000);								
												}
											});
										if(flag) {
											flag=false;
										} else {
											clearInterval(timer);
											timer_start = false;
										}
									},5000);
								}
								flag = true;
							})
						})
					</script>
					<div id="notice" style="color:#FF0000; text-shadow: 5px 5px 5px #FF00FF;"></div>
				</td>
				<td valign="top">
					<div class="widget-box">
						<div class="widget-title">
							<h3>Đăng bài viết</h3>
						</div>
						<div class="widget-body">
							<input type="submit" class="a-button" name="dang_bai" style="background-color:#CCCCCC; font-size:15px" value="Đăng bài">
							<input type="submit" class="a-button" name="xem_truoc" style="background-color:#CCCCCC; font-size:15px" value="Xem trước">
							<input type="submit" class="a-button" name="luu_nhap" style="background-color:#CCCCCC; font-size:15px" value="Lưu nháp">
						</div>
					</div>
				
					<div class="widget-box">
						<div class="widget-title">
							<h3>Categories</h3>
						</div>
						<div class="widget-body">
							<select name="category" style="margin-bottom:10px; height:25px; font-size:16px">
								<?php
									foreach($chuyenmuc as $cat):
										echo "<option value='$cat[machuyenmuc]'>".$cat['tenchuyenmuc']."</option>";
									endforeach;
								?>
							</select>						
							<ul type="disc"><a href="" style="color:#0000FF">Thêm category</a></ul>
						</div>
					</div>
					<div class="widget-box">
						<div class="widget-title">
							<h3>Tags</h3>
						</div>
						<div class="widget-body">
							<input type="text" size="40px" style="height:30px; background:#CCCCCC" name="tag">
							<!--<input type="button" class="a-button" name="them_tag"  value="&nbsp;Thêm&nbsp;" style="margin-top:5px">-->
						</div>
					</div>
				</td>
			</tr>
			
		</table>
	</form>
    </div>
</div>
</div>
</body>
</html>