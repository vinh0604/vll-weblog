<div id="header" class="clear">
	<div class="wrapper">
		<h1 id="title"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>"><?=$persona['tieude']?></a></h1>		
		<div id="description"><?=$persona['mota']?></div><!--end description-->
		<?php if($persona['nenheader']):?>
		<div id="custom-header-img" style="margin-bottom: 20px">
			<a href="http://vinhteo.wordpress.com/"><img src="<?=base_url()?>images/header/<?=$persona['nenheader']?>" alt="" height="200" width="980"></a>
		</div>
		<?php endif;?>
 	</div><!--end wrapper-->
		<div id="navigation">
			<ul id="nav" class="wrapper">
				<li class="page_item"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>">Trang chủ</a></li>
				<?php foreach ($menu as $item):?>
	        	<li class="page_item"><a href="<?=$item['lienket']?>"><?=$item['tenitem']?></a></li>
	        	<?php endforeach;?>
    		</ul>
		</div><!--end navigation-->
</div>