<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #home').addClass('current-top');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$blogtitle?></h1>
    </div>
    <div id="content-body">
		<?php
			//echo "Xin chào <i style='color:blue'>". $_SESSION['tendangnhap']."</i>";
			echo "Xin chào <i style='color:blue'>". $name."</i><a href='".base_url()."index.php/logout'>Logout</a>";
		?>
    </div>
</div>
</div>
</body>
</html>