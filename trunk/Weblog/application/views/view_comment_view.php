<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Trang quản lý - <?=$_SESSION['tieude']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #comment').addClass('current-top');
</script>
<div id="content"  class="widget-box">
	<div id="content-head"  class="widget-title">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    		<?php
				foreach ($binhluan_1 as $binhluan):
					echo $binhluan['noidung'];
				endforeach;
			?>
    </div>
</div>
</div>
</body>
</html>