<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Blog Logo</title>
<link href="<?=base_url()?>css/themes/<?=$csslink?>" type="text/css" media="screen" rel="stylesheet">
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
	 weightSize : 5
   })) {
     $('#myCanvasContainer').hide();
   }
 });
 </script>
</head>
<body>
	<?=$header?><!--end header-->
	<div class="content-background">
		<div class="wrapper">
			<div class="notice"></div><!--end notice-->
			<div id="content">			
				<div class="post hentry">
					<div class="post-header">
						<div class="date">15/01/2011</div>
						<h2><a href="#" rel="bookmark" title="Post Title">Post Title</a></h2>
						<div class="author">bởi Vinh</div>
					</div><!--end post header-->
					<div class="entry clear">
						<p>Content</p>
						<div class="sharedaddy"></div>			
						<p><a href="#" title="Chỉnh sửa bài viết">Sửa</a></p>					
					</div><!--end entry-->
					<div class="post-footer">
						<div class="comments"><a href="#" title="Phản hồi cho Post Title">Để lại phản hồi</a></div>
					</div><!--end post footer-->
				</div><!--end post-->
				<div class="navigation index">
					<div class="alignleft"><a href="#">«  Bài viết cũ nhất</a></div>
					<div class="alignright"><a href="#">Bài viết mới »</a></div>
				</div><!--end navigation-->
			</div><!--end content-->
			<?=$sidebar?><!--end sidebar--></div><!--end wrapper-->
	</div><!--end content-background-->

	<?=$footer?><!--end footer-->

</body></html>