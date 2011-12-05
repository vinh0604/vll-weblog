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
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
		<div class="widget-box" style="width:50%" align="left">
			<div class="widget-title"><h2>&nbsp;Quick Post</h2>
			</div>
				<input type="text" style="width:100%; height:50px; margin-bottom:10px; font-size:20px; font-family:'Times New Roman', Times, serif; background-color:#CCCCCC; color:#666666" value="Điền tiêu đề bài viết..." name="title" onFocus="if(this.value=='Điền tiêu đề bài viết...'){this.value=''}; this.style.backgroundColor='#fffda8';" onBlur="this.style.backgroundColor='#CCCCCC';if(this.value==''){this.value='Điền tiêu đề bài viết...'};" >

				<div class="widget-title"><font size="+1">Category</font>
					<select name="category">
						<option value="Uncategorized">Uncategorized</option>
						<option value="Categorize 1">Categorize 1</option>
						<option value="Categorize 2">Categorize 2</option>
						<option value="Categorize 3">Categorize 3</option>
					</select>
				</div>
				<div class="widget-title"><font size="+1">Nội dung</font>
				</div>
				<textarea cols="100" id="editor1" name="editor1" rows="10"></textarea>
					<script type="text/javascript">
					//<![CDATA[
						// Replace the <textarea id="editor1"> with an CKEditor instance.
						var editor = CKEDITOR.replace( 'editor1', { enterMode		: 2, shiftEnterMode	: 2,extraPlugins : 'uicolor',
								uiColor: '#CCCCCC',
								toolbar :
								[
									[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
									[ 'UIColor' ]
								]} );
						CKFinder.setupCKEditor( editor, '<?=base_url()?>ckfinder/' );
					//]]>
					</script>
				<div class="widget-title"><font size="+1">Thẻ(tags)<input type="text" size="100px" style="height:30px; background:#CCCCCC" name="tag"></font>
				</div>
				<input type="submit" name="dang_bai" style="background-color:#CCCCCC; font-size:15px" value="Đăng bài" class="a-button">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="luu_nhap" style="background-color:#CCCCCC; font-size:15px" value="Lưu nháp" class="a-button">
		</div>
    </div>
</div>
</div>
</body>
</html>