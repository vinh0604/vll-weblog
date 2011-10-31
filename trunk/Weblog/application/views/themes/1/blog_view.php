<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=$title?></title>
<link href="<?=base_url()?>css/themes/<?=$csslink?>" rel="stylesheet" type="text/css">
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
	 weightSize : 5
   })) {
     $('#myCanvasContainer').hide();
   }
 });
 </script>
</head>
<body>
	<div id="wrapper">
		<?=$header?><!--/header -->
		<div id="content">
			<div class="post hentry">
				<h2 class="post-title"><a href="#" title="Post Title">Post Title</a></h2>
				<p class="post-date">
					<span class="day">15</span> <span class="month">Tháng 1</span> <span class="year">2011</span> 
					<span class="postcomment"><a href="#" title="Phản hồi cho Post Title">Để lại phản hồi</a></span>
				</p>
				<p class="post-data">
					<span class="postauthor">by <a href="#" title="Xem các bài viết của Vinh Tèo">Vinh</a></span>
					<span class="postcategory">in <a href="#" title="Xem các bài viết trong Uncategorized" rel="category tag">Uncategorized</a></span>
					<span class="posttag"></span>
					<a href="#" title="Chỉnh sửa bài viết">[Edit]</a>			
				</p>
				<p>Content</p>
				<div class="sharedaddy"></div>		
			</div><!--/post -->
			<p class="post-nav">
				<span class="previous"><a href="#"><em>Previous</em> Older Entries</a></span> 
				<span class="next"><a href="#"><em>Next</em> Newer Entries</a></span>
			</p>
		</div><!--/content -->
		<?=$sidebar?><!--/sidebar -->
		<?=$footer?><!--/footer -->

	</div><!--/wrapper -->
</body></html>