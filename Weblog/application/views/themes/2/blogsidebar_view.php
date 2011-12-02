<div id="sidebar">
	<ul>
		<li class="widget">
			<p><img alt="" src="<?=base_url()?>images/avatar/<?=$persona['avatar']?>" class="avatar" style="display: block; margin: 0pt auto;" height="128" width="128"></p>
			</li>
		<li class="widget"><h2 class="widgettitle">Chuyên mục</h2>
			<ul>	
			<?php foreach ($categories as $category):?>
				<li class="cat-item"><a href="<?=base_url?>index.php/blog/test/category/<?=$category['machuyenmuc']?>" title="<?=$category['mota']?>"><?=$category['tenchuyenmuc']?></a></li>
			<?php endforeach;?> 
			</ul>
		</li>
		<li class="widget"><h2 class="widgettitle">Lưu trữ</h2>
			<?=$calendar?>
		</li>
		<li id="myCanvasContainer" class="widget"><h2 class="widgettitle">Tag Cloud</h2>
			<canvas width="250" height="250" id="myCanvas">
				<ul>
				<?php foreach ($tags as $tag):?>
				   <li><a href="<?=base_url()?>index.php/blog/test/search?tag=<?=$tag['tentag']?>" data-weight="<?=10+$tag['soluong']?>"><?=$tag['tentag']?></a></li>
				<?php endforeach;?>
				</ul>
			</canvas>
		</li>
	</ul>
</div>