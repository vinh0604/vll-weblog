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
	function in(){
		alert(document.getElementById("bai").value);
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#example').dataTable( {
			"aaSorting":[[5,'desc']],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"bSearchable": false, "bSortable": false},
						  null,
			              null,
			              {"bSearchable": false},
			              {"bSortable": false},
			              null,
			              {"bSearchable": false, "bSortable": false}]
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

		$('#bai').change(function(){
			
			var bai = ($(this).attr('value'));
			//alert(bai);
			$.post("<?=base_url()?>index.php/post/post_ajax",{bai:bai},function(data){
				//alert(data);
				$('#noi_dung').html(data);
			});
			
		});
	})
</script>
<script type="text/javascript">
	function show_confirm(){
		var conf = confirm("Bạn thật sự muốn xóa?");
		if(conf == true){
			return true;
		}else{
			return false;
		}
	}
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
    	<h1><?php echo $_SESSION['tieude']; ?></h1>
    </div>
    <div id="content-body">
		<form name="post_form" action="" method="get">
			<span style="font-style:italic">Chào mừng <b style="color:red"><?php echo $_SESSION['tendangnhap']; ?></b></span>
			<hr>
			<h2><a href="<?=base_url()?>index.php/post/addpost" style="background-color:#CCCCCC; font-size:14px; font-style:normal; text-decoration:none" class="content-submit">Viết bài mới</a></h2>
			Xem theo bài viết:&nbsp;<select name="bai" id="bai">
				<option value='0'>Tất cả</option>
				<option value="1">Đã đăng</option>
				<option value="2">Nháp</option>
			</select>
			<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Xem theo chuyên mục:&nbsp;<select name="muc" id="muc" onChange="">
				<option value='0'>Xem tất cả các chuyên mục</option>
				<?php /*?><?php
					foreach($chuyenmuc as $cat):
						echo "<option value='$cat[machuyenmuc]'>".$cat['tenchuyenmuc']."</option>";
					endforeach;
				?><?php */?>
			</select>-->
			<hr>
         	<div id="noi_dung">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
						<th width="8%">Số thứ tự</th>
						<th>Tựa đề</th>
						<th>Nội dung</th>
						<th>Chuyên mục</th>
						<th>Thẻ</th>
						<th>Ngày đăng</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody id="noidung_ajax">

					<?php
						for($i=0; $i<count($baiviet); $i++){
							$noi_dung =  $baiviet[$i]['noidung'];
							if(strlen($noi_dung)>=65){
								$tom_tat = substr($noi_dung, 0, 65);
								$index = strrpos($tom_tat, " " );
								$tom_tat = substr($tom_tat, 0, $index+1)."...";
							}else{
								$tom_tat = $noi_dung;
							}
							$link_sua = base_url()."index.php/post/editPost/".$baiviet[$i]['mabaiviet'];
							$link_xoa = base_url()."index.php/post/deletePost/".$baiviet[$i]['mabaiviet'];
	
							echo"<tr class='gradeU'>";
								echo"<td align='center'>".($i+1)."</td>";
								echo"<td>".$baiviet[$i]['tuade']."</td>";
								echo"<td>".$tom_tat."</td>";
								echo"<td>".$baiviet[$i]['chuyenmuc']."</td>";
								echo"<td>".$tag[$baiviet[$i]['mabaiviet']]."</td>";
								echo"<td class='center'>".$baiviet[$i]['ngaydang']."</td>";
								echo"<td class='center'><a href='$link_sua' title='View comment'><img class='editBtn' src='".base_url()."images/edit.png' height='32' width='32' ></a><a href='$link_xoa' title='Delete comment' onclick='return show_confirm();'><img class='delBtn' src='".base_url()."images/trash.png' height='32' width='32' ></a></td>";
							echo"</tr>";
						}
					?>
				</tbody>
			</table>
            </div>		
		</form>
    </div>
</div>
</div>
</body>
</html>