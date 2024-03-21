<div class="uk-container uk-margin-large-top" id="comments-section">

<h3 class="uk-heading-line uk-text-bold uk-margin-medium-bottom"><span><span id="comments_count"><?php echo getCommentsCountById($itemDetails['recipe_id']); ?></span> <?php echo echoOutput($translation['tr_49']); ?></span></h3>

<?php if (isLogged()): ?>
<form class="clearfix uk-margin-bottom" method="post" id="comment_form">
<input type="hidden" name="comment_item" id="comment_item" value="<?php echo $itemDetails['recipe_id']; ?>" disabled="">
<input type="hidden" name="comment_user" id="comment_user" value="<?php echo $userInfo['user_id']; ?>" disabled="">
<textarea class="uk-textarea uk-border-rounded" name="comment_text" id="comment_text" cols="30" rows="3"></textarea>
<button class="uk-button uk-button-primary uk-border-rounded uk-margin-small" id="submit_comment"><?php echo echoOutput($translation['tr_50']); ?></button>
</form>
<?php else: ?>
<div class="uk-alert-warning" uk-alert>
<a class="uk-alert-close" uk-close></a>
<p><a href="<?php echo $urlPath->signin(); ?>" class="uk-link-reset" ><?php echo echoOutput($translation['tr_51']); ?></a></p>
</div>
<?php endif ?>

<div id="comments-wrapper">
<?php if (isset($comments)): ?>
<!-- comments -->
<?php foreach ($comments as $comment): ?>
<div class="comment clearfix">

<article class="comment-box uk-comment uk-border-rounded">
<header class="uk-comment-header uk-margin-remove uk-position-relative">
<div class="uk-grid-medium uk-flex-middle" uk-grid>
<div class="uk-width-auto">

<div class="uk-cover-container uk-border-rounded">
    <img src="<?php echo $urlPath->image($comment['user_avatar']); ?>" uk-cover>
    <canvas width="80" height="80"></canvas>
</div>

</div>
<div class="uk-width-expand">
<h5 class="uk-comment-title uk-margin-remove"><?php echo $comment['user_name']; ?> <span class="uk-margin-small-left uk-text-muted uk-text-small"><?php echo formatDate($comment["created_at"]); ?></span></h5>
<p class="uk-comment-meta uk-margin-remove-top"><?php echo echoOutput($comment["body"]); ?></p>
</div>
</div>
<div class="uk-position-top-right uk-position-small">
<?php if(isLogged()): ?>
<a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>"><span uk-icon="reply"></span></a>
<?php else: ?>
<a href="<?php echo $urlPath->signin(); ?>"><span uk-icon="reply"></span></a>
<?php endif ?>
</div>
</header>
</article>

<!-- reply form -->
<form class="reply_form uk-margin-bottom uk-margin-small-top" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
<input type="hidden" id="reply_user_<?php echo $comment['id'] ?>" value="<?php echo $userInfo['user_id']; ?>" disabled="">
<textarea class="uk-textarea uk-border-rounded" name="reply_text" cols="30" rows="4" required></textarea>
<button class="uk-button uk-button-primary uk-border-rounded uk-margin-small-top submit-reply">Submit reply</button>
</form>

<!-- GET ALL REPLIES -->

<?php $replies = getRepliesByCommentId($comment['id']) ?>
<?php if (isset($replies)): ?>

<ul class="replies" id="replies_<?php echo $comment['id']; ?>">

<div class="replies_wrapper_<?php echo $comment['id']; ?>">

<?php foreach ($replies as $reply): ?>
<li>

<article class="reply-box uk-comment uk-border-rounded uk-margin-bottom">
<header class="uk-comment-header uk-margin-remove">
<div class="uk-grid-medium uk-flex-middle" uk-grid>
<div class="uk-width-auto">

<div class="uk-cover-container uk-border-rounded">
    <img src="<?php echo $urlPath->image($reply['user_avatar']); ?>" uk-cover>
    <canvas width="80" height="80"></canvas>
</div>

</div>
<div class="uk-width-expand">
<h5 class="uk-comment-title uk-margin-remove"><?php echo $reply['user_name']; ?> <span class="uk-margin-small-left uk-text-muted uk-text-small"><?php echo formatDate($reply["created_at"]); ?></span></h5>
<p class="uk-comment-meta uk-margin-remove-top"><?php echo echoOutput($reply["body"]); ?></p>
</div>
</div>
</header>
</article>
</li>

<?php endforeach ?>
</div>
</ul>
<?php endif ?>

</div>
<!-- // comment -->
<?php endforeach ?>
<?php endif ?>

<?php if(getCommentsCountById($itemDetails['recipe_id']) > 3): ?>
<?php require './sections/pagination-comments.php'; ?>
<?php endif ?>

</div>

</div>