﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=$base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
<link href="<?=$base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<style>
	.left{margin-right:5px}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ margin-right:5px}
	h4{ margin-top:20px; margin-bottom:5px;}
	#link, #name{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
	#btnThem{ margin-top:10px;}
</style>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"sWidth":'20%'},
			              {"sWidth":'60%'},
			              {"bSearchable": false, "bSortable": false, "sWidth":'20%'}]
		});
		$('.editBtn').hover(function(){
			$(this).attr('src','<?=$base_url()?>images/edit_hover.png');
		}, function(){
			$(this).attr('src','<?=$base_url()?>images/edit.png');
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
    <h2 class="title">Quản Lý Link <input class="content-submit"  type="button" id="insert" value="Thêm Link"/></h2>
    <div class="right">
            <div class="widget-box">
            	<h3 class="widget-title">Danh Sách Link</h3>
                <div class="dataTables_wrapper">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
                        <thead>
                            <tr>
                                <th>Tên Link</th>
                                <th>Link</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            <tr class="gradeU">
                                <td class="center">Nguyễn Phúc Lộc</td>       
                                <td class="center">Sinh Viên VN</td>
                                <td class="center">
                                    <a href="#" title="Sửa Chuyên Mục"><img class="editBtn" src="<?=$base_url()?>images/edit.png" height="32" width="32"></a>
                                    <input class="delBtn" type="image" src="<?=$base_url()?>images/trash.png" height="32" width="32" title="Xóa Chuyên Mục"/>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </div>
</div>
</div>
</body>
</html>