<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<style>
.del-answer {
	float: right;
	margin-right:15%; 
	cursor:pointer;
}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript">
	function deleteAnswer(e) {
		if(confirm('Bạn có chắc muốn xóa đáp án này?')) {
			$(e.target).parent().remove();
		}
	};
	$(document).ready(function(){
		$('#addAnswer').live('click',function(){
			$('#answer-box > .widget-line:last').before('<div class="widget-line">'
				+'<input type="text" name="dapan[]" placeholder="Điền một đáp án..." style="width:80%" />'
				+' <img class="del-answer" src="<?=base_url()?>images/delete.png" width="16" height="16" title="Xóa đáp án"/>'
				+'</div>');
			$('#answer-box > .widget-line:last').prev().children('.del-answer').click(deleteAnswer);
		});
		$('.del-answer').click(deleteAnswer);
	});
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
    	<h2 class="title">Tạo Bình Chọn Mới</h2>
        <div style="width:70%;">
        <form method="post" action="<?=base_url()?>index.php/poll/submitadd">
        	<input name="cauhoi" type="text" placeholder="Điền Câu Hỏi Ở Đây..." style="width:100%;font-size:1.4em;
    padding: 4px 3px; margin-bottom:10px;"/>
    		<div class="widget-box">
            	<h3 class="widget-title">Danh sách đáp án</h3>
                <div id="answer-box" class="widget-body">
                	<div class="widget-line">
                    <input name="dapan[]" type="text" placeholder="Điền một đáp án..." style="width:80%" />
                    <img class="del-answer" src="<?=base_url()?>images/delete.png" width="16" height="16" title="Xóa đáp án"/>
                    </div>
                	<div class="widget-line">
                    <input name="dapan[]" type="text" placeholder="Điền một đáp án..." style="width:80%" />
                    <img class="del-answer" src="<?=base_url()?>images/delete.png" width="16" height="16" title="Xóa đáp án"/>
                    </div>
                    <div class="widget-line">
                    <input name="dapan[]" type="text" placeholder="Điền một đáp án..." style="width:80%" />
                    <img class="del-answer" src="<?=base_url()?>images/delete.png" width="16" height="16" title="Xóa đáp án"/>
                    </div>
                    <div class="widget-line">
                    <input id="addAnswer" type="button" class="widget-button" value="Thêm Đáp Án"/>
                    </div>
                </div>
            </div>
        <input name="trangthai" type="checkbox" style="float:left;margin-right:10px"/> Hiển thị
        <input type="submit" class="content-submit" value="Lưu Bình Chọn" style="float:right;margin-right:10px"/>
        </form>
        </div>
    </div>
</div>
</div>
</body>
</html>
