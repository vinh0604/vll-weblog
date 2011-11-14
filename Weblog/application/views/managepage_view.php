<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"sWidth":'40%'},
			              {"sWidth":'40%'},
			              {"bSearchable": false, "bSortable": false, "sWidth":'20%'}]
		});
		$('.editBtn').hover(function(){
			$(this).attr('src','<?=base_url()?>images/edit_hover.png');
		}, function(){
			$(this).attr('src','<?=base_url()?>images/edit.png');
		});
		$('.delBtn').hover(function(){
			$(this).attr('src','<?=base_url()?>images/trash_hover.png');
		}, function(){
			$(this).attr('src','<?=base_url()?>images/trash.png');
		});
		$('.delBtn').click(function(){
			$('form #del').submit();	
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
    <h2 class="title">
    	<form action="<?=base_url()?>/index.php/page/insert">
            Quản Lý Trang 
        	<input class="content-submit"  type="submit" id="insert" value="Thêm Trang"/>
        </form>
    </h2>
    <div class="right">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
                        <thead>
                            <tr>
                                <th>Tiêu Đề</th>
                                <th>Tác Giả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
    						<?php foreach($pages as $page):?>
                            <tr class="gradeU">
                                <td class="center"><?=$page['TIEUDE']?></td>       
                                <td class="center"><?=$page['TACGIA']?></td>
                                <td class="center">
                                <form id="del" method="post" action="<?=base_url()?>index.php/page/delete">
                                    <a href="<?=base_url()?>index.php/page/edit/<?=$page['MATRANG']?>" title="Sửa Trang"><img class="editBtn" src="<?=base_url()?>images/edit.png" height="32" width="32"></a>
                                    <input class="delBtn" name="trang" value="<?=$page['MATRANG']?>" type="image" src="<?=base_url()?>images/trash.png" height="32" width="32" title="Xóa Trang"/>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            
                        </tbody>
                    </table>
    </div>
    </div>
</div>
</div>
</body>
</html>