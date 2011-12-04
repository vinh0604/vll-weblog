<div id="poll-results" style="width:200px">
	<dl class="graph">
	<?php foreach ($answers as $answer):?>
		<dt class="bar-title"><?=$answer['dapan']?></dt>
		<dd class="bar-container">
			<div <?php if ($chosen==$answer['madapan']):?>style="background-color:#06C"<?php endif;?>></div>
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