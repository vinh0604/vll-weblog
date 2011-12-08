<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=$persona['tieude']?></title>
<link href="<?=base_url()?>css/themes/theme1/style.css" rel="stylesheet" type="text/css">
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
   <?php foreach ($keywords as $key):?>$('.post').highlight('<?=$key?>');<?php endforeach;?>
 });
 </script>
</head>
<body <?php if($persona['anhnen']):?>style="background: url('<?=base_url()?>images/background/<?=$persona['anhnen']?>');"<?php endif;?>>
	<div id="wrapper">
		<?=$header?><!--/header -->
		<div id="content">
		<strong class="hentry" style="height: 50px">Tìm thấy <?=$num_result?> kết quả cho từ khóa "<?=$keyword?>":</strong>
		<?php foreach ($posts as $post):?>
			<div class="post hentry" style="padding: 0">
				<h2 class="post-title"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$post['mabaiviet']?>" title="<?=$post['tuade']?>"><?=$post['tuade']?></a></h2>
				<p><?=$post['noidung']?></p>
				<div class="sharedaddy"></div>		
			</div><!--/post -->
		<?php endforeach;?>
			<p class="post-nav">
				<?php if($prevpage):?><span class="previous"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/search?keyword=<?=$keyword?>&page=<?=$prevpage?>"><em>Trước</em> Các kết quả trước</a></span><?php endif;?> 
				<?php if(isset($nextpage)):?><span class="next"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/search?keyword=<?=$keyword?>&page=<?=$nextpage?>"><em>Sau</em> Các kết quả sau</a></span><?php endif;?>
			</p>
		</div><!--/content -->
		<?=$sidebar?><!--/sidebar -->
		<?=$footer?><!--/footer -->

	</div><!--/wrapper -->
</body></html>