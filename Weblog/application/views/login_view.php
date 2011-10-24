<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/validationEngine.jquery.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine-vi.js"></script>
<?php
	if(!isset($_POST['username'])){
?>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#login").hide();
			$("#anh").click(function(){
				$("#login").slideToggle("slow");
			});
			$(".widget-title").click(function(){
				$("#login").slideToggle("slow");
			});
			$('#loginform').validationEngine();
		});
		</script>
<?php
	}else{
?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#login").show();
			$('#loginform').validationEngine();
		});
	</script>
<?php
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<center>
    <div style="margin-top:20px; color:#FF0000"><?=$error?></div>
	<div class="widget-box" style="width:310px; height:30px; margin:auto" align="center">
		<div class="widget-title"><h3>Đăng nhập</h3></div>
			<div id="anh" align="center"><img src="<?=base_url()?>images/1318862576_secure-server-px-png.png" width="40px" height="40px" /></div>
			<div id="login">
		
				<form id="loginform" method="post" action="<?=base_url()?>index.php/login" name="loginform">
				<p>
					<label>
						Tên đăng nhập
						<br>
						<input id="user_login" class="input validate[required,custom[noSpecialCaracters]]" type="text" tabindex="10" size="20" value="<?=$username?>" name="username">
					</label>
				</p>
				<p>
					<label>
						Mật khẩu
						<br>
						<input id="user_pass" class="input validate[required]" type="password" tabindex="20" size="20" value="" name="password">
					</label>
				</p>
		
				<p class="submit-left">
					<a href="<?=base_url()?>index.php/signup" style="color:#00FFFF"><i>Đăng ký</i></a>
				</p>
				<p class="submit-right">
					<input id="wp-submit" class="button-primary" type="submit" tabindex="100" value="Đăng nhập" name="dang_nhap">
				</p>
				</form>
		
			</div>
	</div>
</center>
</body>
</html>
