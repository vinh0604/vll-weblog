<ol class="commentlist">
<?php foreach ($comments as $comment):?>
	<li class="comment">
		<p class="comment-author">
			<img alt="" src="<?=base_url()?>images/avatar/default.png" class="avatar" height="48" width="48"><cite><?php if ($comment['website']):?><a href="<?=$comment['website']?>"><?=$comment['hoten']?></a><?php else:?><?=$comment['hoten']?><?php endif;?></cite><br>
			<a href="#comment-<?=$comment['mabinhluan']?>"><small><strong><?=$comment['date']?></strong> @ <?=$comment['time']?></small></a><small> </small>
		</p>
		<div class="commententry">
			<?=$comment['noidung']?>
		</div>
	</li>
<?php endforeach;?>
</ol>
<div class="js" id="respond">
<form action="<?=base_url()?>index.php/blog/<?=$blogname?>/comment" method="post">
	<input type="hidden" value="<?=$post['mabaiviet']?>" id="mabaiviet" name="mabaiviet">
	<h3>Gửi phản hồi</h3>
	<textarea cols="100" id="editor1" name="editor1" rows="10"></textarea>
	<script type="text/javascript">
	//<![CDATA[
		// Replace the <textarea id="editor1"> with an CKEditor instance.
		var editor = CKEDITOR.replace( 'editor1',{toolbar : 'Basic'} );
	//]]>
	</script>
	<div id="comment-form-identity">
		<div id="comment-form-nascar">
			<ul>
				<li>
					<a title="Guest" href="#comment-form-guest"><span>Contact Info</span></a>
				</li>
			</ul>
		</div>
		<div class="comment-form-service">
			<div class="comment-form-padder">
				<div class="comment-form-avatar">
					<img class="no-grav" width="25" alt="Gravatar" src="<?=base_url()?>images/avatar/default.png">
				</div>
				<div class="comment-form-fields">
					<div class="comment-form-field">
						<label for="email" style="opacity: 1; display: block;">
							Email
							<span class="required">(yêu cầu)</span>
							<span class="nopublish" style="float: none;position: absolute;right: 15px;">(Not published)</span>
						</label>
						<div class="comment-form-input">
							<input id="email" type="text" value="" name="email">
						</div>
					</div>
					<div class="comment-form-field">
						<label for="author" style="opacity: 1; display: block;">
							Author
							<span class="required">(yêu cầu)</span>
						</label>
						<div class="comment-form-input">
							<input id="author" type="text" value="" name="author">
						</div>
					</div>
					<div class="comment-form-field">
						<label for="website" style="opacity: 1; display: block;">
							Website
						</label>
						<div class="comment-form-input">
							<input id="website" type="text" value="" name="website">
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<script type="text/javascript">
		$('.comment-form-input > input').focus(function(){
			if($(this).val() == '') {
				$(".comment-form-field label[for='"+$(this).attr('id')+"']").hide();
			}
		});
		$('.comment-form-input > input').blur(function(){
			if($(this).val() == '') {
				$(".comment-form-field label[for='"+$(this).attr('id')+"']").show();
			}
		});
	</script>
	<p class="form-submit">
		<input id="comment-submit" type="submit" value="Gửi phản hồi" name="submit">
	</p>
</form>
</div><!-- #respond -->
<div style="clear: both"></div>			