<div id="sidebar">
	<ul>
		<li class="widget">
			<p><img alt="" src="<?=base_url()?>images/avatar/<?=$persona['avatar']?>" class="avatar" style="display: block; margin: 0pt auto;" height="128" width="128"></p>
			</li>
		<li class="widget"><h2 class="widgettitle">Chuyên mục</h2>
			<ul>	
			<?php foreach ($categories as $category):?>
				<li class="cat-item"><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/category/<?=$category['machuyenmuc']?>" title="<?=$category['mota']?>"><?=$category['tenchuyenmuc']?></a></li>
			<?php endforeach;?> 
			</ul>
		</li>
		<li class="widget"><h2 class="widgettitle">Lưu trữ</h2>
		<div id="calendar_wrap">
			<?=$calendar?>
		</div>
		<script type="text/javascript">
			$('#prevmon,#nextmon').live('click',function(){
				$.ajax({
					type:'get',
					url:$(this).attr('href'),
					success: function(data){
						$('#calendar_wrap').html(data)}
					});
				return false;
				});
		</script>
		</li>
		<li id="myCanvasContainer" class="widget"><h2 class="widgettitle">Tag Cloud</h2>
			<canvas width="250" height="250" id="myCanvas">
				<ul>
				<?php foreach ($tags as $tag):?>
				   <li><a href="<?=base_url()?>index.php/blog/<?=$blogname?>/search?tag=<?=$tag['tentag']?>" data-weight="<?=10+$tag['soluong']?>"><?=$tag['tentag']?></a></li>
				<?php endforeach;?>
				</ul>
			</canvas>
		</li>
		<?php if ($poll):?>
		<li class="widget"><h2 class="widgettitle">Bình Chọn</h2>
			<div class="question">
			<input type="hidden" id="mabinhchon" name="mabinhchon" value="<?=$poll['mabinhchon']?>">
			<?=$poll['cauhoi']?>
			</div>
			<div id="answer_wrap" class="answers">
			<?php if ($vote!=$poll['mabinhchon']):?>
				<ul id="answers">
				<?php foreach ($answers as $answer):?>
					<li><input name="madapan" type="radio" value="<?=$answer['madapan']?>"> <?=$answer['dapan']?></li>
				<?php endforeach;?>
				</ul>
				<input type="button" value="Bình Chọn" id="vote_bt">
				<script type="text/javascript">
					$('#vote_bt').click(function(){
						$.ajax({type:'post',
							url:"<?=base_url?>index.php/blog/<?=$blogname?>/vote",
							data:{mabinhchon:$('#mabinhchon').val(),
								madapan: $('#answers input:checked').val()},
							success: function(data){
								$('#answer_wrap').html(data);
							}
					})})
				</script>
			<?php else :?>
				<div id="poll-results" style="width:200px">
					<dl class="graph">
					<?php foreach ($answers as $answer):?>
						<dt class="bar-title"><?=$answer['dapan']?></dt>
						<dd class="bar-container">
							<div></div>
							<strong><?=$answer['percentage']?>%</strong>
						</dd>
					<?php endforeach;?>
					</dl>
				</div>
				<script type="text/javascript">
				$("#poll-results div").each(function(){  
				      var percentage = $(this).next().text();  
				      $(this).css({width: "0%"}).animate({  
				                width: percentage}, 'slow');  
				  });  
				</script>
			<?php endif;?>
			</div>
		</li>
		<?php endif;?>
	</ul>
</div>