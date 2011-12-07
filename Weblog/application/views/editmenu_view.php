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
	.thongbao{color:red; font-size:16px; font-weight:bold}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript">
//////////////////////Them item vào mảng và hiển thị item vào danh sách///////////////////////////////////////
	var item_ar = [<?=$mang?>];
	var item_arr = [];
	var item_del = [];
	
	function checkItem(r_item)
	{
		var kt = true;
		$.each(item_arr, function(index, value){
					if(item_arr[index]['tenitem'] == r_item['tenitem'] && item_arr[index]['loai'] == r_item['loai'] && String(item_arr[index]['thongtin']) == String(r_item['thongtin']) )	
						kt = false;
		});	
		$.each(item_ar, function(index, value){
					if(item_ar[index]['tenitem'] == r_item['tenitem'] && item_ar[index]['loai'] == r_item['loai'] && String(item_ar[index]['thongtin']) == String(r_item['thongtin']) )	
						kt = false;
		});	
		return kt;
	}
	
	function addLink(e){
		$('.thongbao').text("");
		if($('#linkname').val()!='' && $('#linkurl').val() != 'http://')
		{
			var item = {'tenitem':$('#linkname').val(), 'loai': 'lienket','thongtin_ma': null,'thongtin':$('#linkurl').val()};
			if(checkItem(item)==false)
			{	
				$('#linkurl').next().text("Đã có Item này trong danh sách");
			}
			else
			{
				item_arr.push(item);
				$('#listitem').append("<div class=\"widget-box\" style=\"height:25px\" loai=\"lienket\" tenitem=\""+ $('#linkname').val()+"\" thongtin_ma = \"null\" thongtin=\""+$('#linkurl').val()+"\"><span>" + $('#linkname').val() + "</span><img src=\"<?=base_url()?>images/delete.png\"  loai=\"lienket\" tenitem=\""+ $('#linkname').val()+"\" thongtin_ma = \"null\" thongtin=\""+$('#linkurl').val()+"\" align=\"right\" class = \"xoa\"/></div>");	
				$('#linkname').val('');
				$('#linkurl').val('http://');
			}
		}
		else
		{
			if($('#linkname').val()!='' && $('#linkurl').val()=='http://')
				$('#linkurl').next().text("Chưa nhập link");
			else
				$('#linkurl').next().text("Chưa nhập tên item");
		}
		$('.thongbao').show();
		$('.thongbao').fadeOut(2000);
	}

	function addCategory(e){
		$('.thongbao').text("");
		if($('#category').val() != '-1')
		{
			var item = {'tenitem':$('#category :selected').text(), 'loai': 'chuyenmuc', 'thongtin_ma':$('#category').val(), 'thongtin':null};
			if(checkItem(item)==false)
				$('#category').next().text("Đã có Item này trong danh sách");
			else
			{
				item_arr.push(item);
				$('#listitem').append("<div class=\"widget-box\" style=\"height:25px\" loai=\"chuyenmuc\" tenitem = \""+ $('#category :selected').text()+"\" thongtin_ma = \""+$('#category').val()+"\" thongtin=\""+null+"\"><span>" + $('#category :selected').text()+ "</span><img src=\"<?=base_url()?>images/delete.png\" loai=\"chuyenmuc\" tenitem = \""+ $('#category :selected').text()+"\" thongtin_ma = \""+$('#category').val()+"\" thongtin=\""+null+"\" align=\"right\" class = \"xoa\" /></div>");
				$('#category').val('-1');
			}
		}
		else
		{
			$('#category').next().text("Chưa chọn chuyên mục");
		}
		$('.thongbao').show();
		$('.thongbao').fadeOut(2000);
	}
	
	function addPage(e){
		$('.thongbao').text("");
		if($('#trang').val() != '-1')
		{
			var item = {'tenitem':$('#trang :selected').text(), 'loai': 'trang', 'thongtin_ma':$('#trang').val(), 'thongtin': null };
			if(checkItem(item)==false)
				$('#trang').next().text("Đã có Item này trong danh sách");
			else
			{	
				item_arr.push(item);
				$('#listitem').append("<div class=\"widget-box\" style=\"height:25px\" loai=\"trang\" tenitem=\""+ $('#trang :selected').text()+"\" thongtin_ma = \""+$('#trang').val()+"\" thongtin=\""+null+"\"> <span>" + $('#trang :selected').text()+ "</span><img src=\"<?=base_url()?>images/delete.png\" loai=\"trang\" tenitem=\""+ $('#trang :selected').text()+"\" thongtin_ma = \""+$('#trang').val()+"\" thongtin=\""+null+"\" align=\"right\" class = \"xoa\" /></div>");
				$('#trang').val('-1');
			}
		}
		else
		{
			$('#trang').next().text("Chưa chọn page");
		}
		$('.thongbao').show();
		$('.thongbao').fadeOut(2000);
	}
////////////////////////////////////////////////////////////////////////////////

	$(document).ready(function(){
//////////////Kiem tra truoc khi them neu chua co ten cua menu/////////////////
		$('#btnThem').click(function(){
			$('.thongbao').text("");
			if($('#name').val()=='')
			{
				$('#name').next().text("Chưa nhập tên menu");
				$('.thongbao').show();
				$('.thongbao').fadeOut(2000);
				return false;
			}
			else
			{
				$('#name').next().text("");
				return true;
			}
		});	
		
		$(".xoa").live('click',function(){
			var maitem = $(this).attr('maitem');
			var loai = $(this).attr('loai');
			var tenitem = $(this).attr('tenitem');
			var thongtin_ma = $(this).attr('thongtin_ma');
			var thongtin = $(this).attr('thongtin');
			if(maitem != null)
			{
				var item = {'maitem':maitem, 'loai':loai, 'tenitem':tenitem, 'thongtin_ma':thongtin_ma, 'thongtin':thongtin};
				item_del.push(item);
			}
			else
			{
			//xu ly
			var r_item = {'tenitem':tenitem, 'loai': loai,'thongtin_ma': thongtin_ma,'thongtin':thongtin};
			var index = $.each(item_arr, function(index, value){
					if(item_arr[index]['tenitem'] == r_item['tenitem'] && item_arr[index]['loai'] == r_item['loai'] && item_arr[index]['thongtin_ma'] == r_item['thongtin_ma'] && String(item_arr[index]['thongtin']) == String(r_item['thongtin']) )	
						return index;
			});
			item_arr.splice(index,1);
			}
			//hien thi
			$("div[tenitem=\""+tenitem+"\"][loai=\""+loai+"\"][thongtin_ma=\""+thongtin_ma+"\"][thongtin=\""+thongtin+"\"]").remove();
		});
		
	});
////////////////////////////////////////////////////////////////////////////////


</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #menu').addClass('current-top');
</script>
<script type="text/javascript">
	$('#sidemenu #persona').addClass('current-top');
	$('#persona-menu').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
    <h2 class="title">Quản Lý Menu</h2>
    <table cellpadding="0" cellspacing="0" width="100%">
	<tr>
    	<td valign="top" style="width:45%">
		<div class="widget-box">
			<h3 class="widget-title">Sửa Menu</h3>
            <div class="widget-body">
            	<?php 	$maitem = 0;
						foreach($imenu as $i): 
							$maitem = $i['MAMENU'];
				?>
				<input id="name" type="text" class="cataName" placeholder="Nhập tiêu đề menu..." value="<?=$i['TENMENU']?>"/>
                <?php endforeach;?>
                <span class="thongbao"></span>
            </div>
		</div>
		
		<div class="widget-box">
			<h3 class="widget-title">Link</h3>
			<div class="widget-body">
            	<input id="linkname" type="text" class="cataName" placeholder="Tên Item..."/>
                <input id="linkurl" type="text" class="cataName" value="http://"/>
                <span class="thongbao"></span></br>
                <input type="button" class="content-submit" style="margin-left:43%" value="Cập nhật" onclick="addLink(event)"/>
			</div>
		</div>
            
		<div class="widget-box">
			<h3 class="widget-title">Chuyên Mục</h3>
			<div class="widget-body">
				<select class="cataName" id="category">
                	<option value="-1">--Chọn chuyên mục--</option>
                <?php foreach($catagorys as $catagory):?>
					<option value ="<?=$catagory['MACHUYENMUC']?>"><?=$catagory['TENCHUYENMUC']?></option>
                <?php endforeach;?>
				</select>
                <span class="thongbao"></span></br>
				<input type="button" class="content-submit" style="margin-left:43%" value="Cập nhật" onclick="addCategory(event)"/>  
            </div>  
		</div>
        
        <div class="widget-box">
			<h3 class="widget-title">Trang</h3>
			<div class="widget-body">
				<select class="cataName" id="trang">
                	<option value = "-1">--Chọn trang--</option>
                <?php foreach($pages as $page):?>
					<option value = "<?=$page['MATRANG']?>"><?=$page['TIEUDE']?></option>
                <?php endforeach;?>
				</select>
                <span class="thongbao"></span></br>
				<input type="button" class="content-submit" style="margin-left:43%" value="Cập nhật" onclick="addPage(event)"/>  
            </div>       
		</div>
        
		</td>
        <td valign="top" style="padding:0 20px;">
        	<div class="widget-box" style="height:490px">
                <h3 class="widget-title">Danh Sách Item</h3>
                <div class="widget-body" id="listitem" >
                	<?php foreach($items as $item):?>
                	<div class="widget-box" style="height:25px" maitem="<?=$item['MAITEM']?>" loai="<?=$item['LOAIITEM']?>" tenitem="<?=$item['TENITEM']?>" thongtin_ma = "<?=$item['THONGTIN_MA']?>" thongtin="<?=$item['THONGTIN_LK']?>" > <span><?=$item['TENITEM']?></span><img src="<?=base_url()?>images/delete.png" maitem="<?=$item['MAITEM']?>" loai="<?=$item['LOAIITEM']?>" tenitem="<?=$item['TENITEM']?>" thongtin_ma = "<?=$item['THONGTIN_MA']?>" thongtin="<?=$item['THONGTIN_LK']?>" align="right" class = "xoa" /></div>
                    <?php endforeach;?>
                </div>
            </div>
    	</td>
     </tr>	
    </table>
    
    <form action="<?=base_url()?>index.php/menu/submiteditmenu/<?=$maitem?>" method="post">
    <input id="menuitemupdate" type="hidden" value="" name="danhsachitemsua" />
    <input id="menuitemdel" type="hidden" value="" name="danhsachitemxoa" />
    <input id="menuitems" type="hidden" value="" name="danhsachitem"/>
    <input id="menuname" type="hidden" value="" name="tenmenu"/>
    <input type="submit" class="content-submit" id="btnThem" value="Cập nhật Menu" onclick="$('#menuitems').val(JSON.stringify(item_arr));$('#menuname').val($('#name').val());$('#menuitemdel').val(JSON.stringify(item_del))"/>
    </form>
    
    </div>
</div>
</div>
</body>
</html>