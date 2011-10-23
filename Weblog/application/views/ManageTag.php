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
	.left{ width:35%; float:left; height:100px; margin-right:5px}
	.right{ width:60%; float:left;}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ float:left; width:35%; margin-right:5px}
	h4{ margin-top:15px; margin-bottom:5px;}
	#cataName{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
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
			"iDisplayLength": 6,
			"bLengthChange": false,
			"aoColumns": [null,
			              null,
						  null,
			              {"bSearchable": false, "bSortable": false}]
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
    <h2 class="title">Quản Lý Thẻ</h2>
    <div class="widget-box" id="them">
    	<h3 class="widget-title">Thêm Thẻ</h3>
        <div id="wrapper-Them">
        	<h4 class="title">Tên Thẻ:</h4>
            <div align="right" >
                    <input type="text" id="cataName" placeholder="Nhập Tên Thẻ..."/>
            </div>
            <h4 class="title">Mô Tả:</h4>
            <div align="right">
                    <textarea id="description" rows="10" placeholder="Mô tả ở đây..."></textarea>
            </div>
            <div align="center">
					<input type="button" class="a-button" id="btnThem"value="Thêm Thẻ"/>
            </div>
        </div>
    </div>
    <div class="right">
            <div class="widget-box">
            	<h3 class="widget-title">Danh Sách Thẻ</h3>
                <div class="dataTables_wrapper">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
                        <thead>
                            <tr>
                                <th>Tên Thẻ</th>
                                <th>Mô Tả</th>
                                <th>Posts</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            <tr class="gradeU">
                                <td class="center">Nguyễn Phúc Lộc</td>       
                                <td class="center">Sinh Viên VN</td>
                                <td class="center">3</td>
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