<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<style>
#heading {
	border: 1px solid #DFDFDF;
    min-height: 100px;
	width: 100%;
	background-position: 0 100%;
    background-repeat: no-repeat;
    padding-top: 100px;
	height: 200px; max-width: 980px;
}
#heading h1{
	margin: -100px 0 0;
	font: bold 45px/1 Arial,Helvetica,sans-serif;
    letter-spacing: -0.05em;
	text-decoration: none;
}
#heading #desc {
	font: italic 20px/1 Georgia,"Times New Roman",Times,serif;
    margin: 10px 0 20px;
}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.wheelcolorpicker.min.js"></script>
<script type="text/javascript">
function preSubmit(){
	$('#tieude').val($('#blog-title').val());
	$('#mota').val($('#blog-desc').val());
	$('#mauchu').val($('#color').val());
}
$(function() {
	$('#color').wheelColorPicker({dir: '<?=base_url()?>images'});
}); 
$(document).ready(function(){
	$('#blog-title').keyup(function(){
		$('#title').text($(this).val());
	});
	$('#blog-desc').keyup(function(){
		$('#desc').text($(this).val());
	});
	$('#change-color').click(function(){
		$('#desc,#title').css('color','#'+$('#color').val());
	});
});
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #persona').addClass('current-top');
	$('#persona-hdr').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    	<h2 class="title">Tùy Chỉnh Header</h2>
        <table class="form-table">
        	<tbody>
            <tr>
            	<th>Tiêu đề Blog</th>
                <td>
                    <input id="blog-title" value="<?=$tieude?>" placeholder="Điền tiêu đề Blog ở đây..." type="text" style="font-size: 1.4em;width: 100%;padding: 4px 3px;"/>
                </td>
            </tr>
            <tr>
            	<th>Mô tả về Blog</th>
                <td>
                    <input id="blog-desc" value="<?=$mota?>" placeholder="Điền mô tả về Blog ở đây..." type="text" style="padding: 2px 1px;width: 100%;"/>
                </td>
            </tr>
            <tr>
            	<th>Header hiện tại</th>
                <td>
                	<div id="heading" style="<?php if($nenheader!=null):?>background: url('<?=base_url()?>images/header/<?=$nenheader?>') repeat-x 0 100px;<?php endif;?>">
                    	<h1 id="title" style="color:#<?=$mauchu?>;"><?=$tieude?></h1>
                        <div id="desc" style="color:#<?=$mauchu?>;"><?=$mota?></div>
                    </div>
                </td>
            </tr>
            <tr>
            	<th></th>
                <td>
                	<form action="<?=base_url()?>index.php/header/removeimage" method="post">
                    	<input type="submit" class="a-button" value="Không Sử Dụng Ảnh Nền"/>
                    </form>
                </td>
            </tr>
            <tr>
            	<th>Tải ảnh lên</th>
                <td>
                	<form action="<?=base_url()?>index.php/header/upload" method="post" enctype="multipart/form-data">
                    	<input name="imagefile" type="file" value="Duyệt..."/>
                        <input type="submit" class="a-button" value="Tải lên" style="padding:1px 10px;"/>
                    </form>
                </td>
            </tr>
            <tr>
            	<th>Màu Chữ</th>
                <td>
                    <input id="color" value="#<?=$mauchu?>" type="text" style="padding: 2px 1px;"/>
                    <input id="change-color" type="button" class="a-button" value="Đổi Màu Chữ" style="padding:1px 10px;"/>
                </td>
            </tr>
            </tbody>
        </table>
        <form action="<?=base_url()?>index.php/header/submit" method="post">
        <input type="hidden" name="mauchu" id="mauchu" value="<?=$mauchu?>"/>
        <input type="hidden" name="tieude" id="tieude" value="<?=$tieude?>"/>
        <input type="hidden" name="mota" id="mota" value="<?=$mota?>"/>
        <input type="submit" class="content-submit" value="Lưu Thay Đổi" style="float:left;margin:20px 10px" onclick="preSubmit()"/>
        </form>
    </div>
</div>
</div>
</body>
</html>