<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />

<style>
	.field{ width:70%; height:30px; font-family:"Times New Roman", Times, serif; font-size:18px;}
</style>

<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var count = 0;
		$('#insert').live('click',function(){
			if(count==0)
			{
				$.ajax({
					url: "<?=base_url()?>index.php/profile/changepassword",
					cache: false,
					success: function(data){
						$('#profile').html(data);
					}
				});
			}
			else
			{
				$("form").submit();
			}
			count++;
		})
	});
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #setting').addClass('current-top');
	$('#setting-pass').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
	<h2 class="title">Mật khẩu người dùng <input name="insert" type="button" id="insert" class="a-button" value="Thay Đổi"></h2>
    <div class="tpl-container" id="profile">
<?php foreach($thongtins as $thongtin):?>
        <table class="form-table">
            <tbody>
            	<tr>
                    <th>Tên Đăng Nhập:</th>
                    <td><?=$thongtin['TENDANGNHAP']?></td>
                </tr>
                <tr>
                    <th>Mật khẩu cũ:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Mật khẩu mới:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Nhập lại mật khẩu mới:</th>
                    <td></td>
                </tr>
                <tr>
                	<th>&nbsp;</th>
                    <td><span style="color:red; font-family:'Times New Roman', Times, serif"> <?php echo $_SESSION['thongbao'];?></span></td>
                </tr>
            </tbody>
        </table>
<?php endforeach;?>
    </div>
    </div>
</div>
</div>
</body>
</html>