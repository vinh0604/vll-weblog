<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<style>
#background-image {
	border: 1px solid #DFDFDF;
    min-height: 100px;
}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #persona').addClass('current-top');
	$('#persona-bgrd').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    	<h2 class="title">Tùy Chỉnh Ảnh Nền</h2>
        <table class="form-table">
        	<tbody>
            <tr>
            	<th>Ảnh nền hiện tại</th>
                <td>
                	<div id="background-image" style="background-image: <?php if($anhnen!=null):?>url('<?=base_url()?>images/<?php if($ispreview) {echo 'temporary';} else {echo 'background';}?>/<?=$anhnen?>');<?php endif;?>
    background-position: left top;
    background-repeat: repeat;background-size: 50% auto;">
                    </div>
                </td>
            </tr>
            <?php if($ispreview==false):?>
            <tr>
            	<th></th>
                <td>
                	<form action="<?=base_url()?>index.php/background/delete" method="post">
                    	<input type="submit" class="a-button" value="Xóa ảnh nền hiện tại"/>
                    </form>
                </td>
            </tr>
            <?php endif;?>
            <tr>
            	<?php if($ispreview==false):?>
            	<th>Tải ảnh lên</th>
                <td>
                	<form action="<?=base_url()?>index.php/background/upload" method="post" enctype="multipart/form-data">
                    	<input name="imagefile" type="file" value="Duyệt..."/>
                        <input type="submit" class="a-button" value="Tải lên" style="padding: 1px 10px;"/>
                    </form>
                </td>
                <?php else :?>
                <td>
                	<form action="<?=base_url()?>index.php/background/submit" method="post">
                        <input type="submit" class="content-submit" value="Lưu Thay Đổi" style="padding: 1px 10px;"/>
                    </form>
                </td>
                <?php endif;?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>