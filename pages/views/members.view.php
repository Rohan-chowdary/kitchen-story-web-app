
<div class="uk-container">

<?php if(!empty($itemDetails['page_content'])): ?>
<div class="uk-width-1-1">
<?php echo $itemDetails['page_content']; ?>
</div>
<?php endif; ?>

<div class="uk-grid-large" uk-grid>

<div class="uk-width-expand@m">

<form class="uk-grid-small" method="get" action="<?php echo htmlspecialchars($urlPath->members()); ?>" id="searchForm" uk-grid>

<div class="uk-width-expand">
<input class="uk-input uk-form-large uk-border-rounded uk-width-1-1" name="member" value="<?php echo echoOutput(getMemberQuery()); ?>" placeholder="<?php echo echoOutput($translation['tr_39']); ?>" type="text">
</div>

<div class="uk-width-auto">
<button class="uk-button uk-button-large uk-button-default uk-border-rounded uk-width-1-1" type="submit"><span uk-icon="search"></span></button>
</div>

</form>

<div class="uk-grid-match uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-4@l" uk-grid uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<?php foreach($items as $item): ?>

<div>
<article class="uk-comment member uk-visible-toggle" tabindex="-1">
    <header class="uk-comment-header uk-position-relative">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-1-1 uk-width-auto@s uk-flex uk-flex-center">
            <div class="uk-cover-container uk-border-circle">
			<a href="<?php echo $urlPath->user($item['user_id']); ?>"><img class="uk-comment-avatar" src="<?php echo $urlPath->image($item['user_avatar']); ?>" alt="<?php echo echoOutput($item['user_name']); ?>" uk-cover></a>
			<canvas width="80" height="80"></canvas>
			</div>

            </div>
            <div class="uk-width-1-1 uk-width-expand@s uk-text-center uk-text-left@s">
                <h4 class="uk-comment-title uk-margin-remove uk-text-truncate"><a class="uk-link-reset" href="<?php echo $urlPath->user($item['user_id']); ?>"><?php echo echoOutput($item['user_name']); ?></a>
                <?php if (isUserVerified($item['user_email'])):?>
					<img class="verify-badge" width="15" src="<?php echo $urlPath->assets_img("badge.svg"); ?>" uk-tooltip="<?php echo echoOutput($translation['tr_15']); ?>" style="margin-left: 3px"/>
					<?php endif; ?>
				</h4>

				<p class="info"><?php echo maskEmail($item['user_email']); ?></p>

            </div>
        </div>
        
    </header>
</article>
</div>

<?php endforeach; ?>

</div>

<?php if(!$items): ?>
<div class="uk-width-1-1 uk-flex uk-flex-center uk-text-center uk-margin-large-top">
<div class="uk-width-1-1 uk-width-1-2@s">
<h2 class="uk-text-bold"><?php echo echoOutput($translation['tr_109']); ?></h2>
<p><?php echo echoOutput($translation['tr_110']); ?></p>
</div>
</div>
<?php endif; ?>

<?php require './sections/pagination.php'; ?>

</div>

</div>
</div>

<!-- END PAGE CONTENT -->
