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
});
</script>
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
            <input class="delBtn" machuyenmuc ="<?=$chuyenmuc['MACHUYENMUC']?>" type="image" src="<?=base_url()?>images/trash.png" height="32" width="32" title="Xóa Chuyên Mục"/>
        </td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>