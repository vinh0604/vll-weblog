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
    <form action="<?=base_url()?>index.php/post/doEdit/<?=$baiviet[0]['mabaiviet']?>" method="post">
    	<table style="width:100%" border="0" cellspacing="10" cellpadding="2">
			<tr>
				<td width="78%">
				<p><h2>&nbsp;Sửa bài viết</h2></p>
				</td>
				<td>&nbsp;
					
				</td>
			  </tr>
			  <tr>
				<td>
					<input type="text" style="width:100%; height:50px; margin-bottom:10px; font-size:20px; font-family:'Times New Roman', Times, serif; background-color:#CCCCCC; color:#666666" value="<?=$baiviet[0]['tuade']?>" name="title" onFocus="if(this.value=='Điền tiêu đề bài viết...'){this.value=''}; this.style.backgroundColor='#fffda8';" onBlur="this.style.backgroundColor='#CCCCCC';if(this.value==''){this.value='Điền tiêu đề bài viết...'};" >
	
					<textarea cols="100" id="editor1" name="editor1" rows="10"><?=$baiviet[0]['noidung']?></textarea>
					<script type="text/javascript">
					//<![CDATA[
						// Replace the <textarea id="editor1"> with an CKEditor instance.
						var editor = CKEDITOR.replace( 'editor1', { enterMode		: 2, shiftEnterMode	: 2} );
						CKFinder.setupCKEditor( editor, '<?=base_url()?>ckfinder/' );
					//]]>
					</script>
				</td>
				<td valign="top">
					<div class="widget-box">
						<div class="widget-title">
							<h3>Sửa bài viết</h3>
						</div>
						<div class="widget-body">
							<input type="submit" class="a-button" name="sua_bai" style="background-color:#CCCCCC; font-size:15px" value="&nbsp;Sửa bài&nbsp;">
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
										if($chuyenmuc_bv[0][machuyenmuc] == $cat[machuyenmuc]){
											$select = "selected";
										}else{
											$select = "";
										}
										echo "<option value='$cat[machuyenmuc]' $select>".$cat['tenchuyenmuc']."</option>";
										//echo "<option value='$chuyenmuc_bv[0][machuyenmuc]'>".$chuyenmuc_bv[0]['tenchuyenmuc']."</option>";
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
							<input type="text" size="40px" style="height:30px; background:#CCCCCC; font-family:'Times New Roman', Times, serif; font-size:16px " name="tag" value="<?=$tag[$baiviet[0]['mabaiviet']]?>">
							<!--<input type="button" class="a-button" name="sua_tag"  value="&nbsp;&nbsp;Sửa&nbsp;&nbsp;" style="margin-top:5px">-->
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