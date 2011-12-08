<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$persona['tieude']?></title>
<link href="<?=base_url()?>css/themes/theme2/style.css" type="text/css" media="screen" rel="stylesheet">
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
     textColour : '#000000',
     outlineThickness : 1,
	 maxSpeed : 0.02,
	 outlineColour : '#C0C0C0',
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
	<?=$header?><!--end header-->
	<div class="content-background">
		<div class="wrapper">
			<div class="notice"></div><!--end notice-->
			<div id="content">	
			<?php foreach ($posts as $post):?>		
				<div class="post hentry">
					<div class="post-header">
						<div class="date"><?=$post['ngaydang']?></div>
						<h2><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$post['mabaiviet']?>" title="<?=$post['tuade']?>"><?=$post['tuade']?></a></h2>
						<div class="author">in <a href="<?=base_url()?>index.php/blog/<?=$blogname?>/category/<?=$post['machuyenmuc']?>"><?=$post['tenchuyenmuc']?></a></div>
					</div><!--end post header-->
					<div class="entry clear">
						<div class="sharedaddy"></div>							
					</div><!--end entry-->
					<div class="post-footer">
						<div class="comments"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$post['mabaiviet']?>#comment" title="Phản hồi cho <?=$post['tuade']?>">Để lại phản hồi</a></div>
					</div><!--end post footer-->
				</div><!--end post-->
			<?php endforeach;?>
				<div class="navigation index">
				</div><!--end navigation-->
			</div><!--end content-->
			<?=$sidebar?><!--end sidebar--></div><!--end wrapper-->
	</div><!--end content-background-->

	<?=$footer?><!--end footer-->

</body></html>