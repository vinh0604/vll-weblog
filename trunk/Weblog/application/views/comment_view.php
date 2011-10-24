<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
		$('#example').dataTable( {
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"bSearchable": false, "bSortable": false},
						  null,
			              null,
			              null,
			              null,
			              {"bSearchable": false, "bSortable": false}]
		});
		$('.viewBtn').hover(function(){
			$(this).attr('src','<?=base_url()?>images/65_hover.png');
		}, function(){
			$(this).attr('src','<?=base_url()?>images/65.png');
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
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
    		<form action="" method="get" name="my_form">
				<div class="widget-title"><span style="font-style:italic">Chào mừng blog owner!</span></div>
				<hr>

				Xem theo bài viết:&nbsp;<select name="bai" id="bai" onChange="">
					<option value='0'>Tất cả</option>
					<option value="1">Đã đăng</option>
					<option value="2">Nháp</option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Xem theo chuyên mục:&nbsp;<select name="muc" id="muc" onChange="">
					<option value='0'>Xem tất cả các chuyên mục</option>
					<option value="1">Uncategorized</option>
					<option value="2">Category 1</option>
					<option value="3">Category 3</option>
				</select>
				<hr>
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
						<th width="8%">Số thứ tự</th>
						<th>Bình luận</th>
						<th>Tác giả</th>
						<th>Bài viết</th>
						<th>Ngày đăng</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$link_xem = "";
					$link_xoa = "";
					for($i=0; $i<5; $i++){
				
						echo"<tr class='gradeU'>";
							echo"<td align='center'>".($i+1)."</td>";
							echo"<td><a href='' style='text-decoration:none'>Hello world!</a></td>";
							echo"<td>Vinh$i</td>";
							echo"<td>Bài viết ".($i+1)."</td>";
							echo"<td class='center'>20/08/2011</td>";
							echo"<td class='center'>
							<a href='$link_xem' title='View comment'><img class='viewBtn' src='".base_url()."images/65.png' height='32' width='32'></a>
							<input class='delBtn' type='image' src='".base_url()."images/trash.png' height='32' width='32' title='Delete comment'/></td>";
						echo"</tr>";
					}
				?>
				</tbody>
			</table>
		</form>	
    </div>
</div>
</div>
</body>
</html>