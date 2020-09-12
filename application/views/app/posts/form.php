<form method="post" action="<?= base_url('app/posts/save'); ?>" id="frmPostAdd-<?= $postMainId; ?>">
	<input type="hidden" name="PostMainId" value="<?= $postMainId; ?>">

	<div class="card-body">
				<textarea
						class="form-control"
						id="txtMessage"
						name="Message"
						rows="3"
						placeholder="O que você está fazendo agora?"
				></textarea>
	</div>
	<div class="card-footer">
		<button type="button" class="btn btn-primary mr-3" data-action="dynamic-form" data-form="#frmPostAdd-<?= $postMainId; ?>">
			<i class="far fa-comment"></i> Postar
		</button>
	</div>
</form>
