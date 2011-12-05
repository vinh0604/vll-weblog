<div id="wpadminbar" class="ltr no-grav">
	<div class="quicklinks">
		<ul>
			<li id="wp-admin-bar-blog" class="menupop">
				<a href="/">
				<span><?=$_SESSION['tieude']?></span>
				</a>
				<ul>
					<li class="">
						<a href="<?=base_url()?>index.php/blog/<?=$_SESSION['tendangnhap']?>">Visit my blog</a>
					</li>
					<li class="menu-item-random-post blog-member">
						<a href="<?=base_url()?>index.php/logout">Log out</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<script type="text/javascript">
	$('#wp-admin-bar-blog').hover(function(){$(this).children('ul:first').slideToggle(200);}, function(){$(this).children('ul:first').hide();})
</script>