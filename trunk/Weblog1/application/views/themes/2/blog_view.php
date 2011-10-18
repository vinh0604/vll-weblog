<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Blog Logo</title>
<link href="style.css" type="text/css" media="screen" rel="stylesheet">
<!--[if lte IE 8]><script type="text/javascript" src="../js/excanvas.js"></script><![endif]-->
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.tagcanvas.min.js" type="text/javascript"></script>
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
	<div id="header" class="clear">
		<div class="wrapper">
			<h1 id="title"><a href="">Just Another Blog</a></h1>		
			<div id="description"></div><!--end description-->
	 	</div><!--end wrapper-->
		<div id="navigation">
			<ul id="nav" class="wrapper">
				<li class="page_item"><a href="">Trang chủ</a></li>
	        	<li class="page_item"><a href="" title="About">About</a></li>
    		</ul>
		</div><!--end navigation-->
	</div><!--end header-->
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
			<div id="sidebar">
				<ul>
					<li class="widget">
						<p><img alt="" src="../images/avatar.jpeg" class="avatar" style="display: block; margin: 0pt auto;" height="128" width="128"></p>
					</li>
				<li class="widget"><h2 class="widgettitle">Chuyên mục</h2>
					<ul>
						<li class="cat-item"><a href="http://vinhteo.wordpress.com/category/uncategorized/" title="Xem các bài viết trong mục Uncategorized">Uncategorized</a></li>
					</ul>
				</li>
				<li class="widget"><h2 class="widgettitle">Lưu trữ</h2>
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
								<td colspan="3" id="prev"><a href="http://vinhteo.wordpress.com/2011/01/" title="Xem các bài viết trong Tháng Một 2011">« Tháng 1</a></td>
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
				</li>
				<li id="myCanvasContainer" class="widget"><h2 class="widgettitle">Tag Cloud</h2>
					<canvas width="250" height="250" id="myCanvas">
						<ul>
						   <li><a href="" target="_blank" data-weight="10">Google</a></li>
						   <li><a href="" data-weight="7">Java</a></li>
						   <li><a href="" data-weight="8">.NET</a></li>
						   <li><a href="" data-weight="5">Javascript</a></li>
						   <li><a href="" data-weight="1">Tomcat</a></li>
						</ul>
					</canvas>
				</li>
			</ul>
		</div><!--end sidebar--></div><!--end wrapper-->
	</div><!--end content-background-->

	<div id="footer">
		<div class="wrapper clear">
			<div id="footer-first" class="footer-column">
				<ul>
					<li class="widget"><h2 class="widgettitle">Liên kết</h2>
						<ul></ul>
					</li>
				</ul>
			</div>

			<div id="footer-second" class="footer-column">
				<ul>
					<li class="widget"><h2 class="widgettitle">Trang</h2>
						<ul>
							<li><a href="#" title="About">About</a></li>
						</ul>
					</li>
				</ul>
			</div>

			<div id="footer-third" class="footer-column">
				<ul>
					<li class="widget widget_categories"><h2 class="widgettitle">Tìm kiếm</h2>
			 			<form method="get" id="search_form" action="#">
							<div>
								<input name="s" id="s" class="search" type="text">
								<input id="searchsubmit" value="Tìm kiếm" type="submit">
							</div>
						</form>
					</li>
				</ul>
			</div>

			<div id="copyright">
				<p class="copyright-notice"><a href="http://vi.wordpress.com/?ref=footer" rel="generator">Blog at WordPress.com</a>. | Theme: <a href="http://theme.wordpress.com/themes/titan/">Titan</a> by <a href="http://thethemefoundry.com/" rel="designer">The Theme Foundry</a>. </p>
			</div>

		</div><!--end wrapper-->
	</div><!--end footer-->

</body></html>