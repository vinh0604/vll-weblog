<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?=base_url()?>css/admin-bar.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin-menu.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/admin.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url()?>css/validationEngine.jquery.css" type="text/css" rel="stylesheet" />
<style>
	.field{ width:70%; height:30px; font-family:"Times New Roman", Times, serif; font-size:18px;}
</style>

<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.validationEngine-vi.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#frm").validationEngine();
	})
</script>
</head>
<body>
<?=$bar?>
<div id="main-content">
<?=$sidemenu?>
<script type="text/javascript">
	$('#sidemenu #setting').addClass('current-top');
	$('#setting-disp').addClass('current');
</script>
<div id="content">
	<div id="content-head">
    	<h1><?=$_SESSION['tieude']?></h1>
    </div>
    <div id="content-body">
	<h2 class="title">Cài đặt hiển thị</h2>
    <div class="tpl-container" id="profile">
    <form action="<?=base_url()?>index.php/profile/changedisplay" method="post" id="frm">
        <table class="form-table">
            <tbody>
                <tr>
                    <th>Số items:</th>
                    <td><input type="text" value="<?=$sobai?>" name="sobai" id="sobai" class="validate[required,custom[integer]] field"/></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" class="content-submit" value="Lưu Thay Đổi" style="margin:10px"/>
    </form>
    </div>
    </div>
</div>
</div>
</body>
</html>