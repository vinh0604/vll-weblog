<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/demo_page.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">
<style>
	.left{ width:35%; float:left; height:100px; margin-right:5px}
	.right{ width:60%; float:left;}
	#wrapper-Them{ padding-left:15px; padding-right:5px; font-size:15px;}
	h4{ margin-top:15px; margin-bottom:5px;}
	.cataName{width:100%; font-size:18px; height:30px; font-family:"Times New Roman", Times, serif; margin-bottom:10px}
	#description{ width:100%; font-family:"Times New Roman", Times, serif}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	var menuitems = [];
	function addLink(e){
		var item = {'tenitem':$('#linkname').val(), 'loai': 'lienket','thongtin_ma':'','thongtin':$('#linkurl').val()};
		menuitems.push(item);	
	}
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"iDisplayLength": 10,
			"bLengthChange": false,
			"aoColumns": [null,
			              null,
			              {"bSearchable": false, "bSortable": false, "sSortDataType": "dom-checkbox"}]
		});
		
		$('#all-poll1').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"iDisplayLength": 10,
			"bLengthChange": false,
			"aoColumns": [null,
			              null,
			              {"bSearchable": false, "bSortable": false, "sSortDataType": "dom-checkbox"}]
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
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Menu</h2>
    <table cellpadding="0" cellspacing="0" width="100%">
	<tr>
    	<td valign="top" style="width:45%">
		<div class="widget-box">
			<h3 class="widget-title">Thêm Menu</h3>
            <div class="widget-body">
				<input id="name" type="text" class="cataName" placeholder="Nhập tiêu đề menu..."/>
            </div>
		</div>
		
		<div class="widget-box">
			<h3 class="widget-title">Link</h3>
			<div class="widget-body">
                <input id="linkurl" type="text" class="cataName" value="http://"/>
                <input id="linkname" type="text" class="cataName" placeholder="Tên Item..."/>
                <input type="button" class="content-submit" value="Thêm Link" onclick="addLink(event)"/>
			</div>
		</div>
            
		<div class="widget-box">
			<h3 class="widget-title">Chuyên Mục</h3>
			<div class="widget-body">
				<select class="cataName">
                	<option value="-1">--Chọn chuyên mục--</option>
                <?php foreach($catagorys as $catagory):?>
					<option value ="<?=$catagory['MACHUYENMUC']?>"><?=$catagory['TENCHUYENMUC']?></option>
                <?php endforeach;?>
				</select>
				<input type="button" class="content-submit" value="Thêm Chuyên Mục"/>  
            </div>  
		</div>
        
        <div class="widget-box">
			<h3 class="widget-title">Trang</h3>
			<div class="widget-body">
            	<input type="text" class="cataName" placeholder="Tên Item..."/>
				<select class="cataName">
                	<option value = "-1">--Chọn trang--</option>
                <?php foreach($pages as $page):?>
					<option value = "<?=$page['MATRANG']?>"><?=$page['TIEUDETRANG']?></option>
                <?php endforeach;?>
				</select>
				<input type="button" class="content-submit" value="Thêm Trang"/>  
            </div>       
		</div>
        
		</td>
        <td valign="top" style="padding:0 20px;">
        	<div class="widget-box" style="height:490px">
                <h3 class="widget-title">Danh Sách Item</h3>
                <div class="widget-body">
                	<div class="widget-box">Ten Item <img src="<?=base_url()?>images/delete.png" />
                    </div>
                </div>
            </div>
    	</td>
     </tr>
    	
    </table>
    <form action="<?=basse_url()?>index.php/menu/insertsubmit" method="post">
    <input id="menuitems" type="hidden" value="" name="danhsachitem"/>
    <input id="menuname" type="hidden" value="" name="tenmenu"/>
    <input type="submit" class="content-submit" id="btnThem" value="Thêm Menu" onclick="$('#menuitems').val(JSON.stringify(menuitems));$('#menuname').val($('#name').val())"/>
    </form>
    </div>
</div>
</div>
</body>
</html>