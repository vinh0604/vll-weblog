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
<!--[if lte IE 8]><script type="text/javascript" src="<?=base_url()?>js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url()?>ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function showTooltip(x, y, contents) {
    $('<div class="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'none',
        top: y + 5,
        left: x + 5,
        border: '1px solid #fdd',
        padding: '2px',
        'background-color': '#fee',
        opacity: 0.80
    }).appendTo("body").fadeIn(200);
}
$(document).ready(function(){
	//flot
	var series = {color: 'gray',  
				data: <?=$plotdata?>, 
				bars: {show :true, 
						fill: true, 
						barWidth: 0.9, 
						align: 'center'}};
	var settings = {grid: {hoverable: true},
					xaxis: {ticks : <?=$plotlabel?>},
					yaxis: {min : 0}};
	$.plot($("#placeholder"), [series], settings);
	$("#placeholder").bind("plothover", function(event, pos, item) {
    	if (item) {
			var y = item.datapoint[1];
			showTooltip(item.pageX, item.pageY, y + "lượt xem");
		}							
		else {
			$(".tooltip").remove();
		}
	});	
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
<script type="text/javascript">
	$('#sidemenu #home').addClass('current-top');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
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
                                    <td><span><?=$post?></span>&nbsp;<a href="<?=base_url()?>index.php/post">Bài Viết</a><br/></td>
                                    <td><span><?=$comment?></span>&nbsp;<a href="<?=base_url()?>index.php/comment">Phản hồi</a><br/></td>
                                </tr>
                                <tr>
                                    <td> <span><?=$page?></span>&nbsp;<a href="<?=base_url()?>index.php/page">Trang</a><br/></td>
                                    <td><span><?=$draft?></span>&nbsp;<a href="<?=base_url()?>index.php/post">Bản Nháp</a><br/></td>
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
                            	<h4>Bởi <?=$phanhoi['hoten']?> trong bài viết <a href="<?=base_url()?>index.php/blog/<?=$_SESSION['tendangnhap']?>/post/<?=$phanhoi['mabaiviet']?>#comment"><?=$phanhoi['tuade']?></a> vào ngày <?=$phanhoi['ngay']?> tháng <?=$phanhoi['thang']?> năm <?=$phanhoi['nam']?></h4>
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
                	<div id="left-nav" style="width:18px;padding:91px 0;position:absolute;left:-18px"><img src="<?=base_url()?>images/back.png" width="16" height="16" style="display: none; cursor: pointer;" date-value="<?=$prevdate?>"/></div>
                	<div style="width: 95%; height: 200px" id="placeholder">
                	</div>
                	<div id="right-nav" style="width:18px;padding: 91px 0;position:absolute;top:0;right:0"><img src="<?=base_url()?>images/next.png" width="16" height="16" style="display: none; cursor: pointer;" date-value="<?=$nextdate?>"/></div>
                	<script>
                	$("#left-nav,#right-nav").hover(
                        	function(){
                            	$(this).children().css("display","block");
                            },
                            function(){
                                $(this).children().css("display","none");
                            });
                	$("#left-nav img").hover(
                        	function(){
                            	$(this).attr("src","<?=base_url()?>images/back_hover.png");
                            },
                            function(){
                            	$(this).attr("src","<?=base_url()?>images/back.png");
                            });
                	$("#right-nav img").hover(
                        	function(){
                            	$(this).attr("src","<?=base_url()?>images/next_hover.png");
                            },
                            function(){
                            	$(this).attr("src","<?=base_url()?>images/next.png");
                            });
                	$("#right-nav img,#left-nav img").click(
                        	function(){
                        		$.ajax({type:'post',
									url:'<?=base_url()?>index.php/statis/navplot',
									data:{'date':$(this).attr('date-value')},
									dataType: 'json',
									success: function(data){
										series = {color: 'gray',  
												data: data.value, 
												bars: {show :true, 
														fill: true, 
														barWidth: 0.9, 
														align: 'center'}};
										settings = {grid: {hoverable: true},
													xaxis: {ticks : data.label},
													yaxis: {min : 0}};
										$.plot($("#placeholder"), [series], settings);
										$("#left-nav img").attr('date-value',data.prevdate);
										$("#right-nav img").attr('date-value',data.nextdate);
									}
                            	});
                            });
                	</script>
                </div>
            </div>
       
       </div>
        
        
</div>
</div>
</body>
</html>