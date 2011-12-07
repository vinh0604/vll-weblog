<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Trang quản lý - <?=$_SESSION['tieude']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/jquery.Jcrop.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.Jcrop.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#crop-image').Jcrop({onChange: getCoords,
								allowResize: false,
								allowSelect: false,
								setSelect: [ 0, 0, 980, 200 ]});
	});
	function getCoords(c)
			{
				$('#x1').val(c.x);
				$('#y1').val(c.y);
				$('#x2').val(c.x2);
				$('#y2').val(c.y2);
			};
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    	<h2 class="title">Tùy Chỉnh Header</h2>
    	Chọn phần ảnh mà bạn muốn dùng làm ảnh nền header.
        <img src="<?=base_url()?>images/temporary/<?=$file_name?>" width="980" height="100%" id="crop-image"/>
        <form method="post" action="<?=base_url()?>index.php/header/crop">
            <input type="hidden" id="x1" name="x1"/> 
            <input type="hidden" id="y1" name="y1"/> 
            <input type="hidden" id="x2" name="x2"/> 
            <input type="hidden" id="y2" name="y2"/> 
            <input type="submit" class="content-submit" value="Chấp Nhận" style="float:left;margin:20px 10px"/>
        </form>
    </div>
</div>
</div>
</body>
</html>