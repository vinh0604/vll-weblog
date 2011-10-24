<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=$base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<style>
	.left{margin-right:5px}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ margin-right:15px}
	h4{ margin-top:20px; margin-bottom:5px;}
	#link, #name{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
	#btnThem{ margin-top:10px; margin-bottom:20px;}
</style>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.min.js"></script>
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
        <div id="wrapper-Them">
        	<h4 class="title">Tên Link:</h4>
            <div align="right" >
                    <input type="text" id="name" placeholder="Nhập Tên Link..."/>
            </div>
            <h4 class="title">Link:</h4>
            <div align="right" >
                    <input type="text" id="link" placeholder="Nhập Link..."/>
            </div>
            <div align="center">
					<input type="button" class="content-submit" id="btnThem" value="Thêm Link"/>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</body>
</html>