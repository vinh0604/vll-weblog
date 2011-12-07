<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Trang quản lý - <?=$_SESSION['tieude']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<style>
#avatar {
	border: 1px solid #DFDFDF;
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
	$('#persona-avt').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    	<h2 class="title">Tùy Chỉnh Avatar</h2>
        <table class="form-table">
        	<tbody>
            <tr>
            	<th>Avatar hiện tại</th>
                <td>
                	<img src="<?=base_url()?>images/<?php if($ispreview) {echo 'temporary';} else {echo 'avatar';}?>/<?=$avatar?>" height="200" width="200"/>
                </td>
            </tr>
            <?php if($ispreview==false):?>
            <tr>
            	<th></th>
                <td>
                	<form action="<?=base_url()?>index.php/avatar/delete" method="post">
                    	<input type="submit" class="a-button" value="Không sử dụng Avatar"/>
                    </form>
                </td>
            </tr>
            <?php endif;?>
            <tr>
            	<?php if($ispreview==false):?>
            	<th>Tải ảnh lên</th>
                <td>
                	<form action="<?=base_url()?>index.php/avatar/upload" method="post" enctype="multipart/form-data">
                    	<input name="imagefile" type="file" value="Duyệt..."/>
                        <input type="submit" class="a-button" value="Tải lên" style="padding: 1px 10px;"/>
                    </form>
                </td>
                <?php else :?>
                <td>
                	<form action="<?=base_url()?>index.php/avatar/submit" method="post">
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