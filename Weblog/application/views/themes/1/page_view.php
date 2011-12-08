<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=$persona['tieude']?></title>
<link href="<?=base_url()?>css/themes/theme1/style.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>css/poll.css" rel="stylesheet" type="text/css">
<?php if($persona['anhnen']):?>
<style>
#header,#footer {
	background-image: none;
}
</style>
<?php endif;?>
<!--[if lte IE 8]><script type="text/javascript" src="<?=base_url()?>js/excanvas.js"></script><![endif]-->
<script src="<?=base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/jquery.tagcanvas.min.js" type="text/javascript"></script>
 <script type="text/javascript">
 $(document).ready(function() {
   if( ! $('#myCanvas').tagcanvas({
     textColour : '#644C33',
     outlineThickness : 1,
	 maxSpeed : 0.02,
	 outlineColour : '#E50000',
     depth : 0.75,
	 weight: true,
	 weightFrom: 'data-weight',
	 weightSize : 1
   })) {
     $('#myCanvasContainer').hide();
   }
 });
 </script>
</head>
<body <?php if($persona['anhnen']):?>style="background: url('<?=base_url()?>images/background/<?=$persona['anhnen']?>');"<?php endif;?>>
	<div id="wrapper">
		<?=$header?><!--/header -->
		<div id="content">
			<h2 class="post-title"><?=$page['tieude']?></h2>
			<br/>
			<p><?=$page['noidung']?></p>
		</div><!--/content -->
		<?=$sidebar?><!--/sidebar -->
		<?=$footer?><!--/footer -->
	</div><!--/wrapper -->
</body></html>