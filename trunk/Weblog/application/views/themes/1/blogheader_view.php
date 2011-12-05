<div id="header" class="clear">
	<h1 id="logo"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>"><?=$persona['tieude']?></a></h1>
	<p id="description"><?=$persona['mota']?></p>
	<?php if($persona['nenheader']):?>
	<div id="custom-header-img" style="margin-bottom: 20px">
		<a href="http://vinhteo.wordpress.com/"><img src="<?=base_url()?>images/header/<?=$persona['nenheader']?>" alt="" height="200" width="980"></a>
	</div>
	<?php endif;?>
	<div id="nav">
		<div class="menu-helo-container">
			<ul class="menu">
				<li class="menu-item"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>">Trang chủ</a></li>
				<?php foreach ($menu as $item):?>
				<li class="menu-item"><a href="<?=$item['lienket']?>"><?=$item['tenitem']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>	
	</div>
	<form method="get" id="searchform" action="<?=base_url()?>index.php/blog/<?=$blogname?>/search">
		<input value="Search..." name="keyword" id="s" onblur="if (this.value == '') {this.value = 'Search...';}" onfocus="if (this.value == 'Search...') { this.value = ''; }" type="text">
		<input value="Tìm kiếm" id="searchsubmit" type="submit">
	</form>
</div>