<!-- HEADER -->
<?php require './sections/header.php'; ?>

<?php if(!empty($headerAd)): ?>
<div class="uk-container uk-margin-medium-top">
<div class="uk-width-1-1 uk-text-center">
<?php foreach($headerAd as $item): ?>

<?php echo $item['ad_html']; ?>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<div class="uk-container">

<div class="tas-single uk-width-1-1">

<div class="uk-flex uk-flex-middle" uk-grid>

<div class="uk-width-1-1 uk-width-expand@s">
<h1 class="single-title"><?php echo echoOutput($itemDetails['recipe_title']); ?></h1>

</div>
<div class="uk-width-1-1 uk-width-auto@s">
<ul class="tas-actions uk-iconnav">
<li><a href="#share-item" uk-scroll><i class="ti ti-share"></i></a></li>

<?php if(isset($isFav) && $isFav == 0): ?>
<li class="like"><a class="addfav" data-item="<?php echo $itemDetails['recipe_id']; ?>" data-user="<?php echo $userInfo['user_id']; ?>"><i class="ti ti-heart"></i></a></li>
<li class="unlike uk-hidden"><a class="removefav" data-item="<?php echo $itemDetails['recipe_id']; ?>" data-user="<?php echo $userInfo['user_id']; ?>"><i class="ti ti-heart uk-text-danger"></i></a></li>
<?php endif; ?>

<?php if(isset($isFav) && $isFav == 1): ?>

<li class="like uk-hidden"><a class="addfav" data-item="<?php echo $itemDetails['recipe_id']; ?>" data-user="<?php echo $userInfo['user_id']; ?>"><i class="ti ti-heart"></i></a></li>
<li class="unlike"><a class="removefav" data-item="<?php echo $itemDetails['recipe_id']; ?>" data-user="<?php echo $userInfo['user_id']; ?>"><i class="ti ti-heart uk-text-danger"></i></a></li>
<?php endif; ?>

<?php if(!isLogged()): ?>
<li><a href="<?php echo $urlPath->signin(); ?>"><i class="ti ti-heart"></i></a></li>
<?php endif; ?>

<li><a href="<?php echo $urlPath->print($itemDetails['recipe_id']); ?>"><i class="ti ti-file-download"></i></a></li>
</ul>
</div>

</div>

<div class="single-info">

<div class="uk-child-width-auto uk-grid-small uk-flex uk-flex-middle" uk-grid>
<div>

<div class="uk-grid-small uk-flex-middle uk-grid" uk-grid>
<div class="uk-width-auto uk-first-column">

<div class="uk-cover-container uk-border-circle">
    <img src="<?php echo $urlPath->image($itemDetails['author_avatar']); ?>" uk-cover>
    <canvas width="40" height="40"></canvas>
</div>

</div>
<div class="uk-width-expand">
<h5 class="uk-margin-remove-bottom uk-text-muted"><a href="<?php echo $urlPath->user($itemDetails['recipe_author']); ?>" class="uk-link-muted"><?php echo echoOutput($itemDetails['author_name']); ?></a>
	<?php if (isUserVerified($itemDetails['author_email'])):?>
	<img class="verify-badge" width="18" src="<?php echo $urlPath->assets_img("badge.svg"); ?>" uk-tooltip="<?php echo echoOutput($translation['tr_15']); ?>" style="margin-left: 3px"/>
	<?php endif; ?>
	</h5>
</div>
</div>

</div>

<div>
<p class="uk-text-muted"><span uk-icon="icon: calendar" class="uk-margin-small-right"></span> <?php echo formatDate($itemDetails['recipe_created']); ?></p>
</div>

<div>
<span uk-icon="icon: heart" class="uk-margin-small-right"></span><span id="likes_count"><?php echo countFormat(getLikesCountById($itemDetails['recipe_id'])); ?></span>
</div>

</div>

<hr>

<p class="single-description"><?php echo echoOutput($itemDetails['recipe_description']); ?></p>

</div>

<div class="single-image uk-cover-container uk-height-medium uk-transition-toggle" tabindex="0">
	<img src="<?php echo $urlPath->image($itemDetails['recipe_image']); ?>" alt="<?php echo echoOutput($itemDetails['recipe_title']); ?>" uk-cover>
	<?php if(!empty($itemDetails['recipe_video'])): ?>
	<div class="uk-position-center">
	<span class="uk-transition-fade">
		<a class="play-btn" href="//www.youtube.com/watch?v=<?php echo echoOutput($itemDetails['recipe_video']); ?>" data-lity  uk-icon="icon: triangle-right; ratio: 2"></a>
	</span>
	</div>
	<?php endif; ?>
</div>


<div class="single-features uk-grid-divider uk-grid-medium uk-flex uk-flex-center uk-flex-left@s uk-margin-large-bottom" uk-grid>

<div>
<h5><?php echo echoOutput($translation['tr_16']); ?></h5>
<p class="uk-text-bold"><?php echo echoOutput($itemDetails['recipe_time']); ?></p>
</div>
<div>
<h5><?php echo echoOutput($translation['tr_17']); ?></h5>
<p class="uk-text-bold"><?php echo echoOutput($itemDetails['difficult_title']); ?></p>
</div>

<div>
<h5><?php echo echoOutput($translation['tr_18']); ?></h5>
<p class="uk-text-bold"><?php echo echoOutput($itemDetails['recipe_servings']); ?></p>
</div>

</div>

<div class="uk-grid-medium" uk-grid>

<div class="uk-width-1-1 uk-width-expand@m">
<h2 class="uk-text-bold"><?php echo echoOutput($translation['tr_19']); ?></h2>

<ul class="single-ingredients uk-list">
<?php foreach ($ingredients as $key => $ing): ?>
<li><label><input class="check uk-checkbox" type="checkbox"><?php echo $ing; ?></label></li>
<?php endforeach ?>
</ul>

<h2 class="uk-text-bold"><?php echo echoOutput($translation['tr_20']); ?></h2>

<ul class="single-instructions">
<?php foreach ($instructions as $key => $ing): ?>
<li><?php echo $ing; ?></li>
<?php endforeach ?>
</ul>

<div class="uk-width-1-1 uk-text-center uk-margin-large-top">
<h2 class="uk-text-bold"><?php echo echoOutput($translation['tr_21']); ?></h2>
<a class="uk-button uk-button-default uk-border-rounded uk-width-1-1 uk-margin-small-top" href="#comments-section" uk-scroll><?php echo echoOutput($translation['tr_22']); ?></a>



</div>

</div>

<div class="uk-width-1-1 uk-width-1-3@m">

<?php if ($itemDetails['recipe_facts'] == 1): ?>
<div class="single-nutrition uk-button-default widget">
<h3 class="heading"><?php echo echoOutput($translation['tr_23']); ?></h3>

<ul class="uk-list uk-list-divider">
<li>
<div class="uk-grid-small" uk-grid>
<div class="uk-width-expand"><?php echo echoOutput($translation['tr_24']); ?></div>
<div class="uk-width-auto"><?php echo echoOutput($itemDetails['recipe_kcal']); ?></div>
</div>
</li>

<li>
<div class="uk-grid-small" uk-grid>
<div class="uk-width-expand"><?php echo echoOutput($translation['tr_25']); ?></div>
<div class="uk-width-auto"><?php echo echoOutput($itemDetails['recipe_fat']); ?></div>
</div>
</li>

<li>
<div class="uk-grid-small" uk-grid>
<div class="uk-width-expand"><?php echo echoOutput($translation['tr_26']); ?></div>
<div class="uk-width-auto"><?php echo echoOutput($itemDetails['recipe_protein']); ?></div>
</div>
</li>

<li>
<div class="uk-grid-small" uk-grid>
<div class="uk-width-expand"><?php echo echoOutput($translation['tr_27']); ?></div>
<div class="uk-width-auto"><?php echo echoOutput($itemDetails['recipe_carbs']); ?></div>
</div>
</li>

</ul>

</div>
<?php endif; ?>

<?php if(!empty($sidebarAd)): ?>
<div class="uk-width-1-1 uk-text-center uk-margin-medium-bottom">
<?php foreach($sidebarAd as $item): ?>
<?php echo $item['ad_html']; ?>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php require './sections/views/share.view.php'; ?>

<?php require './sections/views/newsletter.view.php'; ?>

</div>

</div>

</div>

</div>

<?php if(!empty($footerAd)): ?>
<div class="uk-container uk-margin-medium-top">
<div class="uk-width-1-1 uk-text-center">
<?php foreach($footerAd as $item): ?>

<?php echo $item['ad_html']; ?>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<?php require './sections/related-recipes.php'; ?>

<?php require './sections/comments.php'; ?>

<?php require './sections/footer.php'; ?>
