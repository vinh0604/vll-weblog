<div id="footer">
	<div class="wrapper clear">
		<div id="footer-first" class="footer-column">
			<ul>
				<li class="widget"><h2 class="widgettitle">Liên kết</h2>
					<ul>
					<?php foreach ($links as $link):?>
					<li><a href="<?=$link['duongdan']?>"><?=$link['tenlienket']?></a></li>
					<?php endforeach;?> 
					</ul>
				</li>
			</ul>
		</div>

		<div id="footer-second" class="footer-column">
			<ul>
				<li class="widget"><h2 class="widgettitle">Thống kê</h2>
					<ul>
						<li><?=$luotxem?> lượt xem</li>
					</ul>
				</li>
			</ul>
		</div>

		<div id="footer-third" class="footer-column">
			<ul>
				<li class="widget widget_categories"><h2 class="widgettitle">Tìm kiếm</h2>
		 			<form method="get" id="search_form" action="<?=base_url()?>index.php/blog/<?=$blogname?>/search">
						<div>
							<input name="keyword" id="s" class="search" type="text">
							<input id="searchsubmit" value="Tìm kiếm" type="submit">
						</div>
					</form>
				</li>
			</ul>
		</div>

	</div><!--end wrapper-->
</div>