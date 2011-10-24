<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=$base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=$base_url()?>css/admin.css" type="text/css" rel="stylesheet" />

<style>
	.field{ width:70%; height:30px; font-family:"Times New Roman", Times, serif; font-size:18px;}
</style>

<script type="text/javascript" src="<?=$base_url()?>js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var count = 0;
		$('#insert').live('click',function(){
			if(count==0)
			{
				$.ajax({
					url: "ajax/ajax.ManageProfile.html",
					cache: false,
					success: function(data){
						$('#profile').html(data);
					}
				});
			}
			else
			{
				window.location = '<?=$base_url()?>manageprofile.php';
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
<div id="content">
	<div id="content-head">
    	<h1>Blog Title</h1>
    </div>
    <div id="content-body">
	<h2 class="title">Thông Tin Cá Nhân <input name="insert" type="button" id="insert" class="a-button" value="Thay Đổi"></h2>
    <div class="tpl-container" id="profile">
        <table class="form-table">
            <tbody>
                <tr>
                    <th>Tên Đăng Nhập:</th>
                    <td>npl.is.uit</td>
                </tr>
                <tr>
                    <th>Tên</th>
                    <td>Lộc</td>
                </tr>
                <tr>
                    <th>Họ</th>
                    <td>Nguyễn Phúc</td>
                </tr>
                <tr>
                    <th>Tên trong cộng đồng Blog:</th>
                    <td>NPL</td>
                </tr>
                <tr>
                    <th>Địa chỉ liên hệ:</th>
                    <td>11/6, KP6, P.Linh Trung, Quận Thủ Đức</td>
                </tr>
                <tr>
                    <th>Thông tin:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>npl.is.uit@gmail.com</td>
                </tr>
                <tr>
                    <th>Nick name:</th>
                    <td>happy.lucky1990</td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td>0907176622</td>
                </tr>
                <tr>
                    <th>Nơi làm việc:</th>
                    <td>UIT</td>
                </tr>
                <tr>
                    <th>Link:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Tiêu đề Link:</th>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
</div>
</body>
</html>