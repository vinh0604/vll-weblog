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
<link href="<?=base_url()?>css/jquery.bubblepopup.v2.3.1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>

<script src="<?=base_url()?>js/jquery.bubblepopup.v2.3.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#example').dataTable( {
			"aaSorting":[[4,'desc']],
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"bSearchable": false, "bSortable": false},
						  {"sWidth":"25%"},
			              {"sWidth":"15%"},
			              null,
			              null,
			              {"bSearchable": false, "bSortable": false}]
		});
		
		$('.delBtn').hover(function(){
			$(this).attr('src','<?=base_url()?>images/trash_hover.png');
		}, function(){
			$(this).attr('src','<?=base_url()?>images/trash.png');
		});
		
		//create bubble popups for each element with class "button"
		$('.noidung').CreateBubblePopup();
	
		//set customized mouseover event for each button
		$('.noidung').mouseover(function(){
		var noidung = $(this).attr('lang');
			//show the bubble popup with new options
		$(this).ShowBubblePopup({
										innerHtml: noidung,
										innerHtmlStyle: {	
															color: ($(this).attr('id')!='azure' ? '#FFFFFF' : '#333333'), 
															'text-align':'left',
														},										
										themeName: 	$(this).attr('id'),
										themePath: 	'<?=base_url()?>css/jquerybubblepopup-theme',
										position: 'top',
										width:'500px'		 
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
    		<form action="" method="get" name="my_form">
				<div class="widget-title"><span style="font-style:italic">Chào mừng <b style="color:red"><?php echo $_SESSION['tendangnhap']; ?></b></span></div>
				<hr>
				<b><h2>Quản lý bình luận</h2></b>
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
					for($i=0; $i<count($binhluan); $i++){
						$noi_dung =  $binhluan[$i]['noidung'];
						if(strlen($noi_dung)>=65){
							$tom_tat = substr($noi_dung, 0, 65);
							$index = strrpos($tom_tat, " " );
							$tom_tat = substr($tom_tat, 0, $index+1)."...";
						}else{
							$tom_tat = $noi_dung;
						}
						
						$link_xoa = base_url()."index.php/comment/deleteComment/".$binhluan[$i]['mabl'];

						echo"<tr class='gradeU'>";
							echo"<td align='center'>".($i+1)."</td>";
							echo"<td><a href='' lang='$noi_dung' style='text-decoration:none' class='noidung' id='azure'>".$tom_tat."</a></td>";
							echo"<td>".$binhluan[$i]['hoten']."</td>";
							echo"<td>".$binhluan[$i]['tuade']."</td>";
							echo"<td class='center'>".$binhluan[$i]['ngaydang']."</td>";
							echo"<td class='center'><a href='$link_xoa' title='Delete comment' onclick='return show_confirm();'><img class='delBtn' src='".base_url()."images/trash.png' height='32' width='32' ></a></td>";
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