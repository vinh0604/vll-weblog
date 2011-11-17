<h3 class="widget-title">Sửa Thẻ</h3>
<div id="wrapper-Them">
    <h4 class="title">Tên Thẻ:</h4>
    <?php foreach($tags as $tag):?>
    <div align="right" >
            <input type="text" id="TagName" matag=<?=$tag['MATAG']?> name="TagName" placeholder="Nhập Tên Thẻ..." value="<?=$tag['TENTAG']?>"/>
    </div>
    <h4 class="title">Mô Tả:</h4>
    <div align="right">
            <textarea id="description" name="description" rows="10" placeholder="Mô tả ở đây..."><?=$tag['MOTA']?></textarea>
    </div>
    <div align="center">
            <input type="button" class="a-button" id="btnSua" value="Sửa Thẻ"/>
    </div>
    <?php endforeach;?>
</div>