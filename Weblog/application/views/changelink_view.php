<html>
<head>
<meta content="text/html; charset=utf-8"/>
<link href="<?=$base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<style>
	.left{margin-right:5px}
	#wrapper-Them{ padding-left:15px; padding-right:15px; font-size:15px;}
	#them{ margin-right:15px}
	h4{ margin-top:20px; margin-bottom:5px;}
	#link, #name{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
	#btnSua{ margin-top:10px; margin-bottom:20px}
</style>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"sWidth":'20%'},
			              {"sWidth":'40%'},
						  {"sWidth":'20%'},
			              {"bSearchable": false, "bSortable": false, "sWidth":'10%'}]
		});
		$('.editBtn').hover(function(){
			$(this).attr('src','<?=$base_url()?>images/edit_hover.png');
		}, function(){
			$(this).attr('src','images/edit.png');
		});
		$('.delBtn').hover(function(){
			$(this).attr('src','<?=$base_url()?>images/trash_hover.png');
		}, function(){
			$(this).attr('src','<?=$base_url()?>images/trash.png');
		});
	})
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
    	<h3 class="widget-title">Sửa Link</h3>
        <div id="wrapper-Them">
        	<h4 class="title">Tên Link:</h4>
            <div align="right" >
                    <input type="text" id="name" placeholder="Nhập Tên Link..."/>
            </div>
            <h4 class="title">Link:</h4>
            <div align="right" >
                    <input type="text" id="link" placeholder="Nhập Link..."/>
            </div>
            <h4 class="title">Mô Tả:</h4>
            <div align="right">
                    <textarea id="description" rows="10" placeholder="Mô tả ở đây..."></textarea>
            </div>
            <div align="center">
					<input type="button" class="content-submit" id="btnSua"value="Sửa Link"/>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</body>
</html>