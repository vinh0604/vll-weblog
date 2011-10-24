<html>
<head>
<meta content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<style>
	.left{ width:35%; float:left; height:100px; margin-right:5px}
	.right{ width:60%; float:left;}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ float:left; width:35%; margin-right:5px}
	h4{ margin-top:15px; margin-bottom:5px;}
	.cataName{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
	#btnThem{ margin-top:10px;}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"iDisplayLength": 10,
			"bLengthChange": false,
			"aoColumns": [null,
			              null,
			              {"bSearchable": false, "bSortable": false, "sSortDataType": "dom-checkbox"}]
		});
		
		$('#all-poll1').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"iDisplayLength": 10,
			"bLengthChange": false,
			"aoColumns": [null,
			              null,
			              {"bSearchable": false, "bSortable": false, "sSortDataType": "dom-checkbox"}]
		});
		
		$('.editBtn').hover(function(){
			$(this).attr('src','images/edit_hover.png');
		}, function(){
			$(this).attr('src','images/edit.png');
		});
		$('.delBtn').hover(function(){
			$(this).attr('src','images/trash_hover.png');
		}, function(){
			$(this).attr('src','images/trash.png');
		});
	})
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #home').addClass('current-top');
</script>
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Menu</h2>
    <div class="widget-box" id="them">
    	<h3 class="widget-title">Sửa Menu</h3>
        <div id="wrapper-Them">
        	<h4 class="title">Tiêu Đề:</h4>
            <div align="right" >
                    <input type="text" class="cataName" placeholder="Nhập tiêu đề menu..."/>
            </div>
            <h4 class="title">Nội dung:</h4>
            <div align="right">
                    <textarea id="description" rows="10" placeholder="Nội dung..."></textarea>
            </div>
            <div align="center">
					<input type="button" class="content-submit" id="btnThem"value="Sửa Menu"/>
            </div>
        </div>
    </div>
    <div class="right">
            <div class="widget-box">
            	<h3 class="widget-title">Trang</h3>
                <div class="dataTables_wrapper">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
                        <thead>
                            <tr>
                                <th>Tên Trang</th>
                                <th>Mô Tả</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        	<tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                                
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="widget-box">
            	<h3 class="widget-title">Link</h3>
                <div class="widget-body">
                	<h4 class="title">Link:</h4>
                    <div>
                            <input type="text" class="cataName" value="http://"/>
                    </div>
                    <h4 class="title">Label</h4>
                    <div>
                            <input type="text" class="cataName" placeholder="Tên Item..."/>
                    </div>
                    <div align="center">
						<input type="button" class="a-button" id="btnThem" value="Thêm Link"/>
            		</div>
                </div>
            </div>
            
 			<div class="widget-box">
            	<h3 class="widget-title">Chuyên Mục</h3>
                <div class="dataTables_wrapper">
                	<table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll1">
                        <thead>
                                <tr>
                                    <th>Tên Chuyên Mục</th>
                                    <th>Mô Tả</th>
                                    <th>Chọn</th>
                                </tr>
                        </thead>
                        <tbody>
                        
                        	<tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                            <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
                            </tr>
                            
                             <tr class="gradeU">
                            	<td class="center">Vinh</td>
                                <td class="center">Drinking</td>
                                <td class="center"><input name="" type="checkbox" id="idTrang" value=""></td>
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