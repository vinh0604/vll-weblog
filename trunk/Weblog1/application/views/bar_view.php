<div id="wpadminbar" class="ltr no-grav">
	<div class="quicklinks">
		<ul>
			<li id="wp-admin-bar-blog" class="menupop">
				<a href="/">
				<span>Blog Title</span>
				</a>
				<ul>
					<li class="">
						<a href="#">Visit my blog</a>
					</li>
					<li class="menu-item-random-post blog-member">
						<a href="#">Log out</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<script type="text/javascript">
	$('#wp-admin-bar-blog').hover(function(){$(this).children('ul:first').slideToggle(200);}, function(){$(this).children('ul:first').hide();})
</script>