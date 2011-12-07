<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Trang quản lý - <?=$_SESSION['tieude']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<style>
	.left{margin-right:5px}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ margin-right:5px}
	h4{ margin-top:20px; margin-bottom:5px;}
	#link, #name{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
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
			"aoColumns": [{"sWidth":'20%'},
			              {"sWidth":'60%'},
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
			
		});
		
		$('#insert').click(function(){
			window.location = "<?=base_url()?>index.php/link/insertlink";	
		});
		
	})
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #link').addClass('current-top');
</script>
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Link <input class="content-submit"  type="button" id="insert" value="Thêm Link"/></h2>
    <div class="right">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
                        <thead>
                            <tr>
                                <th>Tên Link</th>
                                <th>Link</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($links as $link):?>
                            <tr class="gradeU">
                                <td class="center"><?=$link['TENLIENKET']?></td>       
                                <td class="center"><?=$link['DUONGDAN']?></td>
                                <td class="center">
                                <form action="<?=base_url()?>index.php/link/delete" method="post">
                                    <a href="<?=base_url()?>index.php/link/edit/<?=$link['MALIENKET']?>" title="Sửa Liên Kết"><img class="editBtn" src="<?=base_url()?>images/edit.png" height="32" width="32"></a>
                                    <input class="delBtn" name="lienket" value="<?=$link['MALIENKET']?>" type="image" src="<?=base_url()?>images/trash.png" height="32" width="32" title="Xóa Liên Kết"/>
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