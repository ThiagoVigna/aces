<div class="card-header">
	<h4 class="text-primary mb-0">Comentários</h4>
</div>
<div class="card-body">
	<h4><?= $post->Message; ?></h4>

	<div class="card">
		<?php $this->load->view('app/posts/form'); ?>
	</div>

	<br>

	<?php $this->load->view('app/posts/list'); ?>
</div>
