<div id="secondary">
	<div class="widget-container"></div>
	<div class="widget-container">
		<div class="widget">			
			<h4 class="widgettitle">Thống kê</h4>			
			<ul>
				<li><?=$luotxem?> lượt xem</li>
			</ul>
		</div>				
	</div>
	<div class="widget-container">
		<div class="widget">
			<h4 class="widgettitle">Liên kết</h4>
			<div class="cat_container">
				<?php foreach ($links as $link):?>
				<a href="<?=$link['duongdan']?>"><?=$link['tenlienket']?></a>
				<?php endforeach;?> 
			</div>
		</div>
	</div>
</div>
<div id="footer">
</div>