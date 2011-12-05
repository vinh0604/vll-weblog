<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<style>
.tpl-container {
	width:40%;
	padding:30px;
	float:left;
}
.widget-body {
	height: 230px;
}
.tpl-image {
	display: block;
    margin-left: auto;
    margin-right: auto;
}
.footer-left, .footer-right {
	position: absolute;
	bottom: 20px;
}
.footer-left {
	left: 20px;
}
.footer-right {
	right: 20px;
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
	$('#persona-tmpl').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    	<h2 class="title">Quản Lý Giao Diện</h2>
    	<?php foreach ($giaodiens as $giaodien):?>
    	<div class="tpl-container">
        	<div class="widget-box">
            	<h3 class="widget-title"><?=$giaodien['TENGIAODIEN']?></h3>
                <div class="widget-body">
                	<div>
						<img class="tpl-image" src="<?=base_url()?>images/themes/<?=$giaodien['THUMBNAIL']?>" width="250" height="100%"/>
                	</div>
                    <div class="footer-left">
                        <input type="button" class="widget-button" value="Xem Thử" onclick="window.location = '<?=base_url()?>index.php/blog/<?=$_SESSION['tendangnhap']?>/preview/<?=$giaodien['MAGIAODIEN']?>';"/>
                    </div>
                    <div class="footer-right">
                    <form action="<?=base_url()?>index.php/template/activate" method="post">
                    	<input type="hidden" name="magiaodien" value="<?=$giaodien['MAGIAODIEN']?>"/>
                    	<input type="submit" class="widget-button" value="Kích hoạt"/>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
</div>
</body>
</html>