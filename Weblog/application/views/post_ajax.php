<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
    <thead>
        <tr>
            <th width="8%">Số thứ tự</th>
            <th>Tựa đề</th>
            <th>Nội dung</th>
            <th>Chuyên mục</th>
            <th>Thẻ</th>
            <th>Ngày đăng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody id="noidung_ajax">
	<?php
        for($i=0; $i<count($baiviet); $i++){
            $noi_dung =  $baiviet[$i]['noidung'];
            if(strlen($noi_dung)>=65){
                $tom_tat = substr($noi_dung, 0, 65);
                $index = strrpos($tom_tat, " " );
                $tom_tat = substr($tom_tat, 0, $index+1)."...";
            }else{
                $tom_tat = $noi_dung;
            }
            $link_sua = base_url()."index.php/post/editPost/".$baiviet[$i]['mabaiviet'];
            $link_xoa = base_url()."index.php/post/deletePost/".$baiviet[$i]['mabaiviet'];

            echo"<tr class='gradeU'>";
                echo"<td align='center'>".($i+1)."</td>";
                echo"<td>".$baiviet[$i]['tuade']."</td>";
                echo"<td>".$tom_tat."</td>";
                echo"<td>".$baiviet[$i]['chuyenmuc']."</td>";
                echo"<td>".$tag[$baiviet[$i]['mabaiviet']]."</td>";
                echo"<td class='center'>".$baiviet[$i]['ngaydang']."</td>";
                echo"<td class='center'><a href='$link_sua' title='View comment'><img class='editBtn' src='".base_url()."images/edit.png' height='32' width='32' ></a><a href='$link_xoa' title='Delete comment' onclick='return show_confirm();'><img class='delBtn' src='".base_url()."images/trash.png' height='32' width='32' ></a></td>";
            echo"</tr>";
        }
    ?>
    </tbody>
</table>
 <script type="text/javascript">
		$('#example').dataTable( {
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumns": [{"bSearchable": false, "bSortable": false},
						  null,
			              null,
			              {"bSearchable": false},
			              {"bSortable": false},
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
</script>
