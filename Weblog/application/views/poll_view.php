<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/demo_page.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/demo_table_jui.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#all-poll').dataTable( {
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"bSortable": false},
			              {"sWidth" :"100px"},
			              {"bSearchable": false,"sWidth" :"150px"},
			              {"sWidth" :"100px"},
			              {"bSearchable": false, "bSortable": false, "sWidth" :"150px"}]
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
	})
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #poll').addClass('current-top');
</script>
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
    	<h2 class="title">
        	Danh Sách Bình Chọn
            <a href="<?=base_url()?>index.php/poll/addnew" class="a-button" style="margin-left:15px">Bình Chọn Mới</a>
        </h2>
        <div>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
            <thead>
                <tr>
                    <th>Câu hỏi</th>
                    <th>Ngày tạo</th>
                    <th>Số người trả lời</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($polls as $poll):?>
                <tr class="gradeU">
                    <td><?=$poll['cauhoi']?></td>
                    <td class="center"><?=$poll['ngaytao']?></td>
                    <td class="center"><?=$poll['luottraloi']?></td>
                    <?php if ($poll['trangthai'] != 0):?>
                    <td>Hiển thị</td>
                    <?php else:?>
                    <td>Ẩn</td>
                    <?php endif;?>
                    <td class="center">
                    	<form action="<?=base_url()?>index.php/poll/delete" method="post">
                        <a href="<?=base_url()?>index.php/poll/modify/<?=$poll['mabinhchon']?>" title="Sửa bình chọn"><img class="editBtn" src="<?=base_url()?>images/edit.png" height="32" width="32"></a>
                        <input type="hidden" name="mabinhchon" value="<?=$poll['mabinhchon']?>"/>
                        <input class="delBtn" type="image" src="<?=base_url()?>images/trash.png" height="32" width="32" title="Xóa bình chọn"/>
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