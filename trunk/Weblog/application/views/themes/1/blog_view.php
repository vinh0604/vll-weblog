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
	 maxSpeed : 0.03,
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
		<?php foreach ($posts as $post):?>
			<div class="post hentry">
				<h2 class="post-title"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$post['mabaiviet']?>" title="<?=$post['tuade']?>"><?=$post['tuade']?></a></h2>
				<p class="post-date">
				<?php $postdate = getdate(strtotime($post['ngaydang']))?>
					<span class="day"><?=$postdate['mday']?></span> <span class="month">Tháng <?=$postdate['mon']?></span> <span class="year"><?=$postdate['year']?></span> 
					<span class="postcomment"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$post['mabaiviet']?>#comment" title="Phản hồi cho <?=$post['tuade']?>">Để lại phản hồi</a></span>
				</p>
				<p class="post-data">
					<span class="postcategory">in <a href="<?=base_url()?>index.php/blog/<?=$blogname?>/category/<?=$post['machuyenmuc']?>" title="Xem các bài viết trong <?=$post['tenchuyenmuc']?>"><?=$post['tenchuyenmuc']?></a></span>		
				</p>
				<p><?=$post['noidung']?></p>
				<div class="sharedaddy"></div>		
			</div><!--/post -->
		<?php endforeach;?>
			<p class="post-nav">
				<?php if($prevpost):?><span class="previous"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/page/<?=$prevpost?>"><em>Trước</em> Các bài cũ hơn</a></span><?php endif;?> 
				<?php if(isset($nextpost)):?><span class="next"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/page/<?=$nextpost?>"><em>Sau</em> Các bài mới hơn</a></span><?php endif;?>
			</p>
		</div><!--/content -->
		<?=$sidebar?><!--/sidebar -->
		<?=$footer?><!--/footer -->

	</div><!--/wrapper -->
</body></html>