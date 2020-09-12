<?php foreach( $lastPosts as $post ): ?>
<div class="card shadow mb-3 radio">
	<div class="card-body">
		<div class="d-flex">
			<div class="flex-shrink-1">
				<img src="https://picsum.photos/200/200?random" class="rounded-circle float-left mr-2" width="60" alt="">
			</div>
			<div class="flex-grow-1">
				<h5> <?= $post->UserName; ?> </h5>
				<p> <?= $post->Message; ?> </p>
			</div>
		</div>
	</div>

	<div class="card-footer">
		<button value="<?= base_url('app/likeordislike/save?postId='.$post->Id.'&likeOrDislike=1'); ?>"
				class="btn btn-sm btn-link text-success">
			<i class="far fa-thumbs-up"></i> Like (<?= $post->TotalLikes; ?>)
		</button>
		<button value="<?= base_url('app/likeordislike/save?postId='.$post->Id.'&likeOrDislike=0'); ?>"
				class="btn btn-sm btn-link text-danger">
			<i class="far fa-thumbs-down"></i> Dislike (<?= $post->TotalDislikes; ?>)
		</button>
		<button
				value="<?= base_url('app/posts/view?postMainId=' . $post->Id); ?>"
				class="btn btn-sm btn-link"
				data-action="open-dynamic-modal">
			<i class="far fa-comment"></i> Comment (<?= $post->TotalComments; ?>)
		</button>
	</div>
</div>
<?php endforeach; ?>
