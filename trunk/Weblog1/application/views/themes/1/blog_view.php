<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Blog Logo</title>
<link href="style.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]><script type="text/javascript" src="../js/excanvas.js"></script><![endif]-->
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.tagcanvas.min.js" type="text/javascript"></script>
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
		<div id="header">
			<h1 id="logo"><a href="">Just Another Blog</a></h1>
			<p id="description"></p>
			<div id="nav">
				<div class="menu-helo-container">
					<ul class="menu">
						<li class="menu-item"><a href="#">About</a></li>
						<li class="menu-item"><a href="#">Uncategorized</a></li>
					</ul>
				</div>	
			</div>
			<form method="get" id="searchform" action="#">
				<input value="Search..." name="s" id="s" onblur="if (this.value == '') {this.value = 'Search...';}" onfocus="if (this.value == 'Search...') { this.value = ''; }" type="text">
				<input value="Tìm kiếm" id="searchsubmit" type="submit">
			</form>
		</div><!--/header -->
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
		<div id="sidebar">
			<div id="gravatar-3" class="widget">
				<p><img alt="" src="../images/avatar.jpeg" class="avatar" style="display: block; margin: 0pt auto;" height="128" width="128"></p>
			</div>
			<div id="calendar-3" class="widget">
				<h4 class="widgettitle">&nbsp;</h4>
				<div id="calendar_wrap">
					<table id="wp-calendar">
						<caption>Tháng Chín 2011</caption>
						<thead>
							<tr>
								<th scope="col" title="Thứ Hai">T2</th>
								<th scope="col" title="Thứ Ba">T3</th>
								<th scope="col" title="Thứ Tư">T4</th>
								<th scope="col" title="Thứ Năm">T5</th>
								<th scope="col" title="Thứ Sáu">T6</th>
								<th scope="col" title="Thứ Bảy">T7</th>
								<th scope="col" title="Chủ Nhật">CN</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="3" id="prev"><a href="#" title="Xem các bài viết trong Tháng Một 2011">« Tháng 1</a></td>
								<td class="pad">&nbsp;</td>
								<td colspan="3" id="next" class="pad">&nbsp;</td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td colspan="3" class="pad">&nbsp;</td><td>1</td><td>2</td><td>3</td><td>4</td>
							</tr>
							<tr>
								<td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td>
							</tr>
							<tr>
								<td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td>
							</tr>
							<tr>
								<td>19</td><td>20</td><td id="today">21</td><td>22</td><td>23</td><td>24</td><td>25</td>
							</tr>
							<tr>
								<td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
								<td class="pad" colspan="2">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="widget">
				<h4 class="widgettitle">Category</h4>
				<div class="cat_container">
					<a href="#" title="Uncategorized">Uncategorized</a> 
				</div>
			</div>
			<div class="widget">
				<h4 class="widgettitle">Tag Cloud</h4>
				<canvas width="250" height="250" id="myCanvas">
					<ul>
					   <li><a href="http://www.google.com" target="_blank" data-weight="10">Google</a></li>
					   <li><a href="" data-weight="7">Java</a></li>
					   <li><a href="" data-weight="8">.NET</a></li>
					   <li><a href="" data-weight="5">Javascript</a></li>
					   <li><a href="" data-weight="1">Tomcat</a></li>
					</ul>
				</canvas>
			</div>
		</div><!--/sidebar -->
		<div id="secondary">
			<div class="widget-container"></div>
			<div class="widget-container">
				<div class="widget">			
					<h4 class="widgettitle">Blog Stats</h4>			
					<ul>
						<li>16 hits</li>
					</ul>
				</div>				
			</div>
			<div class="widget-container">
				<div class="widget">
					<h4 class="widgettitle">Links</h4>
					<div class="cat_container">
						<a href="http://www.google.com" title="Google">Google</a> 
						<a href="http://www.google.com" title="Google">Google</a> 
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p class="credits"><a href="http://vi.wordpress.com/?ref=footer" rel="generator">Blog at WordPress.com</a>. <span>•</span> Theme: <a href="http://theme.wordpress.com/themes/koi/">Koi</a> by <a href="http://www.ndesign-studio.com/" rel="designer">N.Design</a>. </p>
		</div><!--/footer -->

	</div><!--/wrapper -->
</body></html>