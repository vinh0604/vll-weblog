<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$persona['tieude']?></title>
<link href="<?=base_url()?>css/themes/theme1/style.css" type="text/css" media="screen" rel="stylesheet">
<link href="<?=base_url()?>css/poll.css" rel="stylesheet" type="text/css">
<?php if($persona['anhnen']):?>
<style>
#header,#footer {
	background-image: none;
}
</style>
<?php endif;?>
<link href="<?=base_url()?>css/comment.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=base_url()?>js/ckeditor/ckeditor.js"></script>
<!--[if lte IE 8]><script type="text/javascript" src="<?=base_url()?>js/excanvas.js"></script><![endif]-->
<script src="<?=base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/jquery.tagcanvas.min.js" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function() {
   if( ! $('#myCanvas').tagcanvas({
     textColour : '#000000',
     outlineThickness : 1,
	 maxSpeed : 0.03,
	 outlineColour : '#C0C0C0',
     depth : 0.75,
	 weight: true,
	 weightFrom: 'data-weight',
	 weightSize : 1
   })) {
     $('#myCanvasContainer').hide();
   }
   $('#like-button').click(function(){
		$.ajax({type:'post',
			url:'<?=base_url()?>index.php/blog/<?=$blogname?>/like',
			data:{mabaiviet:$('#mabaiviet').val()},
			success: function(data){
				$('#like_wrap').html(data);
			}})
	})
 });
</script>
</head>
<body <?php if($persona['anhnen']):?>style="background: url('<?=base_url()?>images/background/<?=$persona['anhnen']?>');"<?php endif;?>>
	<div id="wrapper">
		<?=$header?><!--/header -->
		<div id="content">
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
				<p id="like_wrap">
				<?php if (!$liked):?>
					<a id="like-button" title="Thích bài viết này!"><img src="<?=base_url()?>images/thumbsup.png" width="35" height="33"></a>
				<?php else :?>
					<strong><?=$post['luotlthich']?> người thích bài viết này!</strong>
				<?php endif;?>
				</p>
				<p class="post-data">
					<span class="postcategory">Thẻ: <?php foreach ($posttags as $posttag):?><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/search?tag=<?=$posttag['tentag']?>" title="<?=$posttag['mota']?>"><?=$posttag['tentag']?></a> <?php endforeach;?></span>
				</p>			
			</div><!--/post -->
			<p class="post-nav">
				<?php if($prevpost):?><span class="previous"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$prevpost?>"><em>Trước</em> Bài viết trước</a></span><?php endif;?> 
				<?php if($nextpost):?><span class="next"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/post/<?=$nextpost?>"><em>Sau</em> Bài viết sau</a></span><?php endif;?>
			</p>
			<div id="comment"><h3><?=count($comments)?> phản hồi</h3><?=$comment?></div>
		</div><!--/content -->
		<?=$sidebar?><!--/sidebar -->
		<?=$footer?><!--/footer -->

	</div><!--/wrapper -->
</body></html>
	
