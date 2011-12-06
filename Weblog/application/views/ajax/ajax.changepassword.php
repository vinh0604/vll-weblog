<script type="text/javascript">
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
</script>
<?php foreach ($thongtins as $thongtin):?>
<form method="post" action="<?=base_url()?>index.php/profile/password">
<table class="form-table">
    <tbody>
        <tr>
            <th>Tên Đăng Nhập:</th>
            <td><?=$thongtin['TENDANGNHAP']?></td>
        </tr>
        <tr>
            <th>Mật khẩu cũ</th>
            <td><input name="pass_cu" type="password" id="pass_cu" class="field" value="password" onClick="SelectAll('pass_cu');"/></td>
        </tr>
        <tr>
            <th>Mật khẩu mới:</th>
            <td><input name="pass_moi" type="password" id="pass_moi" class="field" /></td>
        </tr>
        <tr>
            <th>Gõ lại mật khẩu mới:</th>
            <td><input name="pass_moi_re" type="password" id="pass_moi_re" class="field" /></td>
        </tr>
    </tbody>
</table>
</form>
<?php endforeach;?>