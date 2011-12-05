<div id="poll-results" style="width:200px">
	<table class="graph" cellpadding="1" cellspacing="1" border="0">
	<?php foreach ($answers as $answer):?>
	<tr height="15">
		<td class="bar-title"><?=$answer['dapan']?></td>
		<td class="bar-container">
			<div <?php if ($chosen==$answer['madapan']):?>style="background-color:#06C"<?php endif;?>></div>
		</td>
		<td class="bar-percentage"><strong><?=$answer['percentage']?>%</strong></td>
	</tr>
	<?php endforeach;?>
	</table>
</div>
<script type="text/javascript">
$("#poll-results div").each(function(){  
      var percentage = $(this).parent().next().text();  
      $(this).css({width: "0%"}).animate({  
                width: percentage}, 'slow');  
  });  
</script>