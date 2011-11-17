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
            <th>Tên Thẻ</th>
            <th>Posts</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tags as $tag):?>
        <tr class="gradeU">
            <td class="center"><?=$tag['TENTAG']?></td>       
            <td class="center"><?=$tag['POST']?></td>
            <td class="center">
                <a href="#" title="Sửa Chuyên Mục"><img class="editBtn" matag="<?=$tag['MATAG']?>" src="<?=base_url()?>images/edit.png" height="32" width="32"></a>
                <input class="delBtn" type="image" src="<?=base_url()?>images/trash.png" matag="<?=$tag['MATAG']?>" height="32" width="32" title="Xóa Chuyên Mục"/>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>