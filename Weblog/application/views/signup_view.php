<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/validationEngine.jquery.css" type="text/css" rel="stylesheet"/>
<link href="<?=base_url()?>css/smoothness/jquery-ui-1.8.16.custom.css"  type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine-vi.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/validate.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/captcha.js"></script>

<script type="text/javascript">
	function setFocus()
	{
		document.getElementById("account").focus();

	}
	
	$(document).ready(function(){
		$('#signupform').validationEngine();
		$('#sn').datepicker({dateFormat:'dd/mm/yy', changeMonth:true, changeYear:true});
		$('#account').blur(function(){
			var acc = $(this).val();
			alert(acc);
			$.post("<?=base_url()?>index.php/signup/checkUser", { name: acc},
			   function(data) {
				 //alert("Data Loaded: " + data);
				 $('#alert_2').html(data);
		   });
		});
		
	});
	
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body onLoad="setFocus()">
<div id="content-body">
	<center>
		<div class="widget-box" style="width:600px; padding-top:20px; margin-top:60px" align="left">
			<h1 class="widget-title" align="center" style="font-size:20px; font-weight:bold">Đăng ký</h1>
			<form action="<?=base_url()?>index.php/signup" id="signupform" method="post" class="frm_login">
				<table border="1" width="550px" style="border-spacing:10px" bordercolor="#C0C0C0">
					<tr height="30px">
						<td>Tên truy nhập:</td>
						<td width="300px"><input type="text" name="account" class="validate[required,custom[noSpecialCaracters]]" id="account" style="height:25px; width:200px"><b style="color:#FF0000">(*)</b><div id="alert"><?=$alert?></div><div id="alert_2"><?=$alert_2?></div></td>
					</tr>
					<tr>
						<td>Mật khẩu:</td>
						<td><input type="password" style="height:25px; width:200px" name="password" id="password" class="validate[required]"><b style="color:#FF0000">(*)</b></td>
					</tr>
					<tr>
						<td>Xác nhận mật khẩu:</td>
						<td><input type="password" name="verify_password" style="height:25px; width:200px" id="verify_password" class="validate[required, custom[equals[password]]]"><b style="color:#FF0000">(*)</b></td>
					</tr>
					<tr>
						<td>Địa chỉ E-mail:</td>
						<td><input type="text" name="email" id="email" style="height:25px; width:200px" class="validate[required,custom[email]]"><b style="color:#FF0000">(*)</b></td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td>
							<textarea style="width:200px; height:100px" name="address"></textarea>
						</td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td >
							<input type="text" name="phone_no"  style="height:25px; width:200px" />
						</td>
					</tr>
					<tr>
						<td>Tên:</td>
						<td><input type="text" name="name" style="height:25px; width:200px"></td>
					</tr>
					<tr>
						<td>Sinh nhật (Ngày/Tháng/Năm):</td>
						<td><input type="text" name="sn" style="height:25px; width:200px" id="sn" class="validate[required,custom[date]]"><b style="color:#FF0000">(*)</b></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" class="a-button" name="submit" value="Đăng ký tài khoản"></td>
					</tr>
				</table>
			</form>
		</div>
	</center>
</div>

</body>
</html>