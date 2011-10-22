<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/validationEngine.jquery.css" type="text/css" rel="stylesheet" />
<style>
.del-answer {
	float: right;
	margin-right:15%; 
	cursor:pointer;
}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine-vi.js"></script>
<script type="text/javascript">
	var deletedAns = [];
	function deleteAnswer(e) {
		if(confirm('Bạn có chắc muốn xóa đáp án này?')) {
			if($(e.target).parent().children('input:hidden').length > 0) {
				deletedAns.push($(e.target).parent().children('input:hidden').val());
			}
			$(e.target).parent().remove();
		}
	};
	$(document).ready(function(){
		$('#addAnswer').live('click',function(){
			$('#answer-box > .widget-line:last').before('<div class="widget-line">'
				+'<input id="dapan" type="text" name="dapan[]" placeholder="Điền một đáp án..." style="width:80%" class="validate[required]" />'
				+' <img class="del-answer" src="<?=base_url()?>images/delete.png" width="16" height="16" title="Xóa đáp án"/>'
				+'</div>');
			$('#answer-box > .widget-line:last').prev().children('.del-answer').click(deleteAnswer);
			$("#frm").validationEngine('detach');
			$("#frm").validationEngine();
		});
		$('.del-answer').click(deleteAnswer);
		$("#frm").validationEngine();
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
    	<h2 class="title">Chỉnh Sửa Bình Chọn</h2>
        <div style="width:70%;">
        <div style="color:red"><?=validation_errors()?></div>
        <form id="frm" method="post" action="<?=base_url()?>index.php/poll/submitmodify">
        	<input name="mabinhchon" value="<?=$poll['mabinhchon']?>" type="hidden" />
        	<input id="dapanxoa" name="dapanxoa" value='[""]' type="hidden" />
        	<input id="cauhoi" name="cauhoi" type="text" placeholder="Điền Câu Hỏi Ở Đây..." style="width:100%;font-size:1.4em;
    padding: 4px 3px; margin-bottom:10px;" class="validate[required]" value="<?=$poll['cauhoi']?>"/>
    		<div class="widget-box">
            	<h3 class="widget-title">Danh sách đáp án</h3>
                <div id="answer-box" class="widget-body">
                <?php foreach ($poll['dapans'] as $dapan):?>
                	<div class="widget-line">
                	<input type="hidden" value="<?=$dapan['MADAPAN']?>"/>
                    <div class="widget-bar" style="width:80%"><?=$dapan['DAPAN'].' ('.$dapan['SOLUOTCHON'].' bình chọn)'?></div>
                    <img class="del-answer" src="<?=base_url()?>images/delete.png" width="16" height="16" title="Xóa đáp án"/>
                    </div>
                <?php endforeach;?>
                    <div class="widget-line">
                    <input id="addAnswer" type="button" class="widget-button" value="Thêm Đáp Án"/>
                    </div>
                </div>
            </div>
        <input name="trangthai" type="checkbox" <?php if($poll['trangthai']!=0) {echo 'checked ';}?>style="float:left;margin-right:10px"/> Hiển thị
        <input type="submit" class="content-submit" value="Lưu Bình Chọn" style="float:right;margin-right:10px" onclick="if(deletedAns.length>0){$('#dapanxoa').val(JSON.stringify(deletedAns))}" />
        </form>
        </div>
    </div>
</div>
</div>
</body>
</html>
