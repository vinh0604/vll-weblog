<div id="sidebar">
	<div id="gravatar-3" class="widget">
		<p><img alt="" src="<?=base_url()?>images/avatar/<?=$persona['avatar']?>" class="avatar" style="display: block; margin: 0pt auto;" height="128" width="128"></p>
	</div>
	<div id="calendar-3" class="widget">
		<h4 class="widgettitle">&nbsp;</h4>
		<div id="calendar_wrap">
			<?=$calendar?>
		</div>
	</div>
	<div class="widget">
		<h4 class="widgettitle">Chuyên mục</h4>
		<div class="cat_container">
		<?php foreach ($categories as $category):?>
			<a href="<?=base_url?>index.php/blog/test/category/<?=$category['machuyenmuc']?>" title="<?=$category['mota']?>"><?=$category['tenchuyenmuc']?></a>
		<?php endforeach;?> 
		</div>
	</div>
	<div class="widget">
		<h4 class="widgettitle">Tag Cloud</h4>
		<canvas width="250" height="250" id="myCanvas">
			<ul>
				<?php foreach ($tags as $tag):?>
				   <li><a href="<?=base_url()?>index.php/blog/test/search?tag=<?=$tag['tentag']?>" data-weight="<?=10+$tag['soluong']?>"><?=$tag['tentag']?></a></li>
				<?php endforeach;?>
			</ul>
		</canvas>
	</div>
</div>