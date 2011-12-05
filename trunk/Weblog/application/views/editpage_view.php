<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<style>
	.left{margin-right:5px}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ margin-right:15px}
	h4{ margin-top:20px; margin-bottom:5px;}
	#tieude, #tacgia{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
	#btnThem{ margin-top:10px; margin-bottom:20px;}
	.thongbao{color:red; font-size:16px; font-weight:bold}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url()?>ckfinder/ckfinder.js"></script>
<script>
	$(document).ready(function(){
			var editor = CKEDITOR.replace( 'noidung', { enterMode		: 2, shiftEnterMode	: 2} );
			CKFinder.setupCKEditor( editor, '<?=base_url()?>ckfinder/' );
			$('#btnThem').click(function(){
					$('.thongbao').text('');
					if($('#tieude').val() == '' && $('#tacgia').val() == '')
					{	
						$('#tieude').next().text('Chưa nhập tiêu đề');
						$('#tacgia').next().text('Chưa nhập tên tác giả');
						$('.thongbao').show().fadeOut(2000);
						return false;
					}
					if($('#tieude').val() == '')
					{	
						$('#tieude').next().text('Chưa nhập tiêu đề');
						$('.thongbao').show().fadeOut(2000);
						return false;
					}
					if($('#tacgia').val() == '')
					{
						$('#tacgia').next().text('Chưa nhập tên tác giả');
						$('.thongbao').show().fadeOut(2000);
						return false;
					}
					return true;
					
			});
	});
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #page').addClass('current-top');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Trang</h2>
    <div class="widget-box" id="them">
    	<?php foreach($trangs as $trang):?>
    	<form action="<?=base_url()?>/index.php/page/submitedit/<?=$trang['MATRANG']?>" method="post">
    	<h3 class="widget-title">Sửa Trang</h3>
        <div id="wrapper-Them">
        	<h4 class="title">Tiêu Đề:</h4>
            <div >
                    <input type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề..." value="<?=$trang['TIEUDE']?>"/>
                    <span class="thongbao"></span>
            </div>
            <h4 class="title">Tác giả:</h4>
            <div >
                    <input type="text" name="tacgia" id="tacgia" placeholder="Nhập tên tác giả..." value="<?=$trang['TACGIA']?>"/>
                    <span class="thongbao"></span>
            </div>
            <h4 class="title">Nội Dung:</h4>
            <div align="right">
                    <textarea name="noidung" id="noidung" rows="10" placeholder="Nôi dung..."><?=$trang['NOIDUNG']?></textarea>
            </div>
            <div align="center">
					<input type="submit" class="content-submit" id="btnThem" value="Sửa Trang"/>
            </div>
        <? endforeach;?>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
</body>
</html>