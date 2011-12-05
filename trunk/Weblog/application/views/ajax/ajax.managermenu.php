<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		$('#all-poll').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"sWidth":'40%'},
						  {"sWidth":'40%'},
			              {"bSearchable": false, "bSortable": false, "sWidth":'20%'}]
		});
	});
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="all-poll">
    <thead>
        <tr>
            <th>Tên Menu</th>
            <th>Trạng Thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listmenu as $menu):?>
        <tr class="gradeU">
            <td class="center"><?=$menu['TENMENU']?></td>
            <td class="center" loai="trangthai" id="<?=$menu['MAMENU']?>"><?php if($menu['TRANGTHAI'] == 0) echo 'Ẩn'; else echo 'Hiện';?></td>
            <td class="center">
                <form method="post" action="<?=base_url()?>index.php/menu/deletemenu">
                <a href="<?=base_url()?>index.php/menu/editmenu/<?=$menu['MAMENU']?>" title="Sửa Chuyên Mục"><img class="editBtn" src="<?=base_url()?>images/edit.png" height="32" width="32"></a>
                <input class="delBtn" type="image" name="mamenu" id="mamenu" value="<?=$menu['MAMENU']?>" src="<?=base_url()?>images/trash.png" height="32" width="32" title="Xóa Chuyên Mục"/>
                </form>
            </td>
        </tr>    
        <?php endforeach;?>                
       
    </tbody>
</table>