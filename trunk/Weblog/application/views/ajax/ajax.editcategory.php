<h3 class="widget-title">Sửa Chuyên Mục</h3>
<div id="wrapper-Them">
	<?php foreach($chuyenmucs as $chuyenmuc):?>
    <h4 class="title">Tên Chuyên Mục:</h4>
    <div align="right" >
            <input type="text" id="cataName" placeholder="Nhập Tên Chuyên Mục..." value="<?=$chuyenmuc['TENCHUYENMUC']?>"/>
            <input type="hidden" id="machuyenmuc" value="<?=$chuyenmuc['MACHUYENMUC']?>" />
    </div>
    <h4 class="title">Mô Tả:</h4>
    <div align="right">
            <textarea id="description" rows="10" placeholder="Mô tả ở đây..."><?=$chuyenmuc['MOTA']?></textarea>
    </div>
    <div align="center">
            <input type="button" class="a-button" id="btnSua"value="Sửa Chuyên Mục"/>
    </div>
    <? endforeach;?>
</div>