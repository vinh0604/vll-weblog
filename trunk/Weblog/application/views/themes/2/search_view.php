<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$persona['tieude']?></title>
<link href="<?=base_url()?>css/themes/theme2/style.css" type="text/css" media="screen" rel="stylesheet">
<link href="<?=base_url()?>css/poll.css" rel="stylesheet" type="text/css">
<style>
<?php if($persona['anhnen']):?>
#header,#footer {
	background-image: none;
}
<?php endif;?>
.highlight {
	background-color: yellow;
}
</style>
<!--[if lte IE 8]><script type="text/javascript" src="<?=base_url()?>js/excanvas.js"></script><![endif]-->
<script src="<?=base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/jquery.tagcanvas.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/jquery.highlight-3.yui.js" type="text/javascript"></script>
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
   <?php foreach ($keywords as $key):?>$('.post').highlight('<?=$key?>');<?php endforeach;?>
 });
</script>
</head>
<body <?php if($persona['anhnen']):?>style="background: url('<?=base_url()?>images/background/<?=$persona['anhnen']?>');"<?php endif;?>>
	<?=$header?><!--end header-->
	<div class="content-background">
		<div class="wrapper">
			<div class="notice"><strong>Tìm thấy <?=$num_result?> kết quả cho từ khóa "<?=$keyword?>":</strong></div><!--end notice-->
			<div id="content">	
			<?php foreach ($posts as $post):?>		
				<div class="post hentry">
					<div class="post-header">
						<h2 style="margin: 0"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$post['mabaiviet']?>" title="<?=$post['tuade']?>"><?=$post['tuade']?></a></h2>
					</div><!--end post header-->
					<div class="entry clear" style="margin: 0">
						<p><?=$post['noidung']?></p>
						<div class="sharedaddy"></div>							
					</div><!--end entry-->
					<div class="post-footer">			
					</div><!--end post footer-->
				</div><!--end post-->
			<?php endforeach;?>
				<div class="navigation index">
					<?php if($prevpage):?><div class="alignleft"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/search?keyword=<?=$keyword?>&page=<?=$prevpage?>">«  Các kết quả cũ hơn</a></div><?php endif;?>
					<?php if(isset($nextpage)):?><div class="alignright"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/search?keyword=<?=$keyword?>&page=<?=$nextpage?>">Các kết quả mới hơn »</a></div><?php endif;?>
				</div><!--end navigation-->
			</div><!--end content-->
			<?=$sidebar?><!--end sidebar--></div><!--end wrapper-->
	</div><!--end content-background-->

	<?=$footer?><!--end footer-->

</body></html>