<?php foreach( $lastPosts as $post ): ?>
<div class="card shadow mb-3 radio">
	<div class="card-body">
		<div class="d-flex">
			<div class="flex-shrink-1">
				<?php if (isset($post->PhotoProfile)): ?>
				<img src="<?= base_url("storage/users/".$post->PhotoProfile); ?>"
                     class="rounded-circle float-left mr-2" width="60" height="60" alt="">
				<?php endif; ?>
			</div>
			<div class="flex-grow-1">
				<h5> <?= $post->UserName; ?> </h5>
				<p> <?= $post->Message; ?> </p>
			</div>
		</div>
	</div>

	<div class="card-footer" id="teste">
		<button
                value="<?= base_url('app/likeordislike/save?postId=' . $post->Id); ?>"
                class="btn btn-sm btn-link set-like"
                data-postId="<?= $post->Id; ?>">
            <i class="far fa-thumbs-up" class="like-button" data-postid="1" data-type="0"></i> Like (<span id="likeId-<?= $post->Id; ?>"><?= $post->TotalLikes; ?></span>)
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
<script>
	$(document).ready(function() {
    $('.like-button').click(function() {
        var postId = $(this).data('postid');
        var type = $(this).data('type');
        var button = $(this);

        $.ajax({
            type: 'POST',
            url: '/likeordislike/save',
            data: { postId: postId, type: type },
            dataType: 'json',
            success: function(response) {
                if (response.result.LikeOrDislike == 1) {
                    button.removeClass('disliked').addClass('liked');
                    button.attr('data-type', 1);
                    button.html('Liked');
                } else {
                    button.removeClass('liked').addClass('disliked');
                    button.attr('data-type', 0);
                    button.html('Like');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

</script>
