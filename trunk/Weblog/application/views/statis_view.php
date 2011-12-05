<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<style>
	span{ font-family:Georgia, "Times New Roman", Times, serif; color:#FF0000; font-size:18px}
	a{ font-family:"Times New Roman", Times, serif; font-size:14px; color:#993333; text-decoration:none;}
	#wp-post-comment{ width:45%; float:left; margin-right:10px;}
	#wp-draft-views{ width:45%; float:left; margin-left:10px; }
	#flot-views{ width:100%; height:200px;}
	.cataName{width:98%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif; margin: 5px}
	.write{ width:98%; margin:5px;}
	#xoa{ margin-left:30px; margin-right: 150px;}
	#chuyenmuc{ width:98%; margin:5px; font-size:16px; height:30px;}
	.thongbao{color:red; font-size:16px; font-weight:bold}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url()?>ckfinder/ckfinder.js"></script>
<script>
$(document).ready(function(){
	//flot
	var data = [[0, 3], [4, 8], [8, 5], [9, 13]];
	var option = {series : { bars : { show : true, barWidth: 5, align: "center"}} };
	$.plot($("#flot-views"), data, option);
	//ckeditor
	var editor = CKEDITOR.replace( 'noidung', { enterMode: 2, shiftEnterMode: 2,extraPlugins : 'uicolor',
								uiColor: '#CCCCCC',
								toolbar :
								[
									[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
									[ 'UIColor' ]
								]} );
	CKFinder.setupCKEditor( editor, '<?=base_url()?>ckfinder/' );
	
	//viet nhanh
	$('#baiviet').click(function(){
		$('.thongbao').text('');
		if($('#tieude').val() == '' || $('#chuyenmuc').val() =='-1')
		{
			if($('#tieude').val() == '')
				$('#tieude').next().text('Chưa nhập tiêu đề');
			if($('#chuyenmuc').val() =='-1')
				$('#chuyenmuc').next().text('Chưa chọn chuyên mục');
			$('.thongbao').show().fadeOut(2000);
		}
		else
		{
			$.ajax({
				url : '<?=base_url()?>index.php/statis/post',
				data : {tieude:$('#tieude').val(), chuyenmuc:$('#chuyenmuc').val(), noidung:editor.getData()},
				type: 'post',
				success: function(){
				}	
			});			
			$('#tieude').val('');
			$('#chuyenmuc').val('-1');
			editor.setData('');
		}
	});
	
	$('#bannhap').click(function(){
		$('.thongbao').text('');
		if($('#tieude').val() == '' || $('#chuyenmuc').val() =='-1')
		{
			if($('#tieude').val() == '')
				$('#tieude').next().text('Chưa nhập tiêu đề');
			if($('#chuyenmuc').val() =='-1')
				$('#chuyenmuc').next().text('Chưa chọn chuyên mục');
			$('.thongbao').show().fadeOut(2000);
		}
		else
		{
		$.ajax({
			url : '<?=base_url()?>index.php/statis/draftpost',
			data : {tieude:$('#tieude').val(), chuyenmuc:$('#chuyenmuc').val(), noidung:editor.getData()},
			type: 'post',
			success: function(data){
				$('#w-draft').html(data);
			}	
		});
		$('#tieude').val('');
		$('#chuyenmuc').val('-1');
		editor.setData('');
		}
	});
	
	$('#xoa').click(function(){
		$('#tieude').val('');
		$('#chuyenmuc').val('-1');
		editor.setData('');
	});
});
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
    	<h2 class="title">Thống Kê</h2>
        
        <div id="wp-post-comment">
            <div class="widget-box" id="w-post">
                <h3 class="widget-title">Bài Viết</h3>
                <div class="widget-body">
                    	<table class="form-table">
                        	<thead>
                            	<th>Nội Dung</th>
                                <th>Thảo Luận</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span><?=$post?></span>&nbsp;<a href="<?=base_url()?>index.php/">Bài Viết</a><br/></td>
                                    <td><span><?=$comment?></span>&nbsp;<a href="<?=base_url()?>index.php/">Phản hồi</a><br/></td>
                                </tr>
                                <tr>
                                    <td> <span><?=$page?></span>&nbsp;<a href="<?=base_url()?>index.php/page">Trang</a><br/></td>
                                    <td><span><?=$draft?></span>&nbsp;<a href="<?=base_url()?>index.php/">Bản Nháp</a><br/></td>
                                </tr>
                                <tr>
                                    <td> <span><?=$category?></span>&nbsp;<a href="<?=base_url()?>index.php/category">Chuyên Mục</a><br/></td>
                                </tr>
                                <tr>
                                    <td><span><?=$tag?></span>&nbsp;<a href="<?=base_url()?>index.php/tag">Thẻ</a><br/></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
            
            <div class="widget-box" id="w-draft">
                <h3 class="widget-title">Bản Nháp</h3>
                <div class="widget-body">
                    <div id="inside">
                        <ul id="list-draft" style="margin-left:10px;">
                            <?php foreach ($nhaps as $nhap):?>
                            <li>
                                <a href="<?=base_url()?>index.php/post"><?=$nhap['tuade']?></a>
                                <abbr><?=$nhap['ngay']?></abbr>
                                <p><?=$nhap['noidung']?></p>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        
            <div class="widget-box" id="w-comment">
                <h3 class="widget-title">Phản Hồi</h3>
                <div class="widget-body">
                    <div>
                    	<ul>
                        	<?php foreach($phanhois as $phanhoi):?>
                        	<li style="margin-left:10px;">
                            	<h4>Bởi <?=$phanhoi['hoten']?> trong bài viết <a href="<?=base_url?>index.php/comment"><?=$phanhoi['tuade']?></a> vào ngày <?=$phanhoi['ngay']?> tháng <?=$phanhoi['thang']?> năm <?=$phanhoi['nam']?></h4>
                                <p><?=$phanhoi['noidung']?></p>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="wp-draft-views">
			
			<div class="widget-box" id="w-write">
                <h3 class="widget-title">Viết Nhanh</h3>
                <input class="cataName" id="tieude" name="tieude" placeholder="Nhập tiêu đề...">
                <span class="thongbao"></span>
                <select id="chuyenmuc">
                	<option value="-1">---chọn chuyên mục---</option>
                    <?php foreach($chuyenmucs as $chuyenmuc):?>
                    <option value="<?=$chuyenmuc['MACHUYENMUC']?>"><?=$chuyenmuc['TENCHUYENMUC']?></option>
                    <?php endforeach;?>
                </select>
                <span class="thongbao"></span>
                <div class="write">
                <textarea name="noidung" id="noidung"></textarea>
                </div>
                <div style="text-align:center; margin-bottom:5px; margin-top:5px">
                	<input type="button" class="a-button" id="bannhap" name="bannhap" value = "Bản nháp"/>
                    <input type="button" class="a-button" id="xoa" name="xoa" value = "Xóa"/>
                    <input type="button" class="content-submit" id="baiviet" name="baiviet" value = "Đăng bài"/>
                </div>
           </div>
            
            <div class="widget-box" id="w-views">
                <h3 class="widget-title">Số lượt xem</h3>
                <div class="widget-body" id="flot-views">
                
                </div>
            </div>
       
       </div>
        
        
</div>
</div>
</body>
</html>