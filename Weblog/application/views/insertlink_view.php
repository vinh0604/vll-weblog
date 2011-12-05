<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<style>
	.left{margin-right:5px}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ margin-right:15px}
	h4{ margin-top:20px; margin-bottom:5px;}
	#linkurl, #name{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
	#btnThem{ margin-top:10px; margin-bottom:20px;}
	.thongbao{color:red; font-size:16px; font-weight:bold}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#btnThem').click(function(){
			$('#name').next().text('');
			$('#linkurl').next().text('');
			if($('#name').val() == '' || $('#linkurl').val() == '')
			{
				if($('#name').val() == '' )
				{
					$('#name').next().text('Chưa nhập tên link');
				}
				if($('#linkurl').val() == '')
				{
					$('#linkurl').next().text('Chưa nhập link');
				}
				$('.thongbao').show();
				$('.thongbao').fadeOut(2000);
				return false;
				
			}
			else
			{
				return true;	
			}
		});	
	});
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Link</h2>
    <div class="widget-box" id="them">
    	<h3 class="widget-title">Thêm Link</h3>
        <form action="<?=base_url()?>index.php/link/submitinsert" method="post">
        <div id="wrapper-Them">
        	<h4 class="title">Tên Link:</h4>
            <div>
                    <input type="text" name="name" id="name" placeholder="Nhập Tên Link..."/>
                    <span class="thongbao"></span>
            </div>
            <h4 class="title">Link:</h4>
            <div>
                    <input type="text" name="link" id="linkurl" placeholder="Nhập Link..."/>
                    <span class="thongbao"></span>
            </div>
            <div align="center">
					<input type="submit" class="content-submit" id="btnThem" value="Thêm Link"/>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
</body>
</html>