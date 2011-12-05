<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/demo_table.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css"/>
<style>
	.left{ width:35%; float:left; height:100px; margin-right:5px}
	.right{ width:60%; float:left;}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	#them{ float:left; width:35%; margin-right:5px}
	h4{ margin-top:15px; margin-bottom:5px;}
	#cataName{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif}
	#description{ width:100%; font-family:"Times New Roman", Times, serif; font-size:15px}
	#btnThem{ margin-top:10px; margin-bottom:14px}
	#btnSua{ margin-top:10px; margin-bottom:14px}
	.thongbao{color:red; font-size:16px; font-weight:bold}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"iDisplayLength": 6,
			"bLengthChange": false,
			"aoColumns": [null,
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
		
		//ajax submit insert category
		$('#btnThem').live('click', function(){
			$('.thongbao').text('');
			if($('#cataName').val() == '')
			{
				$('#cataName').next().text('Chưa nhập tên chuyên mục');
				$('.thongbao').show().fadeOut(2000);
			}
			else
			{
				var tenchuyenmuc = $('#cataName').val();
				var mota = $('#description').val();
				$.ajax({
					url: '<?=base_url()?>/index.php/category/submitinsert',
					cache: false,
					data : {tenchuyenmuc : tenchuyenmuc, mota : mota},
					type : 'POST',
					success: function(data){
						$('#table').html(data);
					}
				});
				$('#cataName').val('');
				$('#description').val('');
			}
		});
		
		//ajax delete category
		$('.delBtn').live('click', function(){
			var machuyenmuc = $(this).attr("machuyenmuc");
			$.ajax({
				url : '<?=base_url()?>/index.php/category/delete',
				cache: false,
				data: {machuyenmuc : machuyenmuc},
				type :'POST',
				success : function(data){
					$('#table').html(data);
				}
			});	
		});
		
		//ajax edit category
		$('.editBtn').live('click',function(){
			var machuyenmuc = $(this).attr("machuyenmuc");
			$.ajax({
				url : '<?=base_url()?>/index.php/category/edit',
				cache: false,
				data: {machuyenmuc : machuyenmuc},
				type :'POST',
				success : function(data){
					$('#them').html(data);
				}
			});	
		});
		
		//ajax update category
		$('#btnSua').live('click', function(){
			$('.thongbao').text('');
			if($('#cataName').val() == '')
			{
				$('#cataName').next().text('Chưa nhập tên chuyên mục');
				$('.thongbao').show().fadeOut(2000);
			}
			else
			{
				var machuyenmuc = $('#machuyenmuc').val();
				var tenchuyenmuc = $('#cataName').val();
				var mota = $('#description').val();	
				$.ajax({
					url : '<?=base_url()?>/index.php/category/submitedit',
					cache: false,
					data: {machuyenmuc : machuyenmuc, tenchuyenmuc : tenchuyenmuc, mota : mota},
					type :'POST',
					success : function(data){
						$('#them').html(data);
					}
				});
	
				$.ajax({
					url: '<?=base_url()?>/index.php/category/manage',
					cache: false,
					success: function(data){
						$('#table').html(data);
					}	
				});	
			}
		});
	})
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #post').addClass('current-top');
	$('#post-cat').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Chuyên Mục</h2>
    <div class="widget-box" id="them">
    	<h3 class="widget-title">Thêm Chuyên Mục</h3>
        <div id="wrapper-Them">
        	<h4 class="title">Tên Chuyên Mục:</h4>
            <div >
                    <input type="text" id="cataName" placeholder="Nhập Tên Chuyên Mục..."/>
                    <span class="thongbao"></span>
            </div>
            <h4 class="title">Mô Tả:</h4>
            <div align="right">
                    <textarea id="description" rows="10" placeholder="Mô tả ở đây..."></textarea>
            </div>
            <div align="center">
					<input type="button" class="a-button" id="btnThem"value="Thêm Chuyên Mục"/>
            </div>
        </div>
    </div>
    <div class="right" id="table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
                        <thead>
                            <tr>
                                <th>Tên Chuyên Mục</th>
                                <th>Posts</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
    						<?php foreach($chuyenmucs as $chuyenmuc): ?>
                            <tr class="gradeU">
                                <td class="center"><?=$chuyenmuc['TENCHUYENMUC']?></td>       
                                <td class="center"><?=$chuyenmuc['POST']?></td>
                                <td class="center">
                                    <a title="Sửa Chuyên Mục"><img class="editBtn" machuyenmuc="<?=$chuyenmuc['MACHUYENMUC']?>" src="<?=base_url()?>images/edit.png" height="32" width="32"></a>
                                    <input class="delBtn" machuyenmuc="<?=$chuyenmuc['MACHUYENMUC']?>" type="image" src="<?=base_url()?>images/trash.png" height="32" width="32" title="Xóa Chuyên Mục"/>
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