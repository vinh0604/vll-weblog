<?php foreach ($thongtins as $thongtin):?>
<form method="post" action="<?=base_url()?>index.php/profile">
<table class="form-table">
    <tbody>
        <tr>
            <th>Tên Đăng Nhập:</th>
            <td><?=$thongtin['TENDANGNHAP']?></td>
        </tr>
        <tr>
            <th>Họ Tên</th>
            <td><input name="name" type="text" id="name" class="field" value="<?=$thongtin['HOTEN']?>"/></td>
        </tr>
        <tr>
            <th>Địa chỉ liên hệ:</th>
            <td><input name="address" type="text" id="address" class="field" value="<?=$thongtin['DIACHI']?>"/></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><input name="email" type="text" id="email" class="field" value="<?=$thongtin['EMAIL']?>"/></td>
        </tr>
        <tr>
            <th>Số điện thoại:</th>
            <td><input name="phone" type="text" id="phone" class="field" value="<?=$thongtin['SODIENTHOAI']?>"/></td>
        </tr>
        <tr>
    </tbody>
</table>
</form>
<?php endforeach;?>