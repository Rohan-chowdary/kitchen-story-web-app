<!-- HEADER -->
<?php require './sections/header.php'; ?>

<div class="uk-container">

<div class="uk-grid-large" uk-grid  uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<div class="uk-width-expand@m">

<div class="uk-grid-small uk-flex uk-flex-middle uk-margin-large-top uk-margin-medium-bottom" uk-grid>

<div class="uk-width-auto@s">

<div class="profile uk-padding uk-padding-remove-top uk-padding-remove-bottom">

<div class="uk-block uk-margin-remove uk-text-center">

<div class="uk-cover-container uk-border-pill uk-box-shadow-small user-image">
  <img src="<?php echo $urlPath->image($userDetails['user_avatar']); ?>" alt="<?php echo echoOutput($userDetails['user_name']); ?>" uk-cover>
  </a>
  <canvas width="150" height="150"></canvas>
</div> 

</div>
</div>

</div>

<div class="uk-width-expand@s">

<div class="uk-width-1-1 uk-text-center uk-text-left@s">
<div class="uk-flex uk-flex-middle uk-flex-center uk-flex-left@s uk-margin-small-bottom">
<h3 class="uk-text-bold uk-margin-remove"><?php echo echoOutput($userDetails['user_name']) ?></h3>
<?php if (isUserVerified($userDetails['user_email'])):?>
	<img class="verify-badge" width="20" src="<?php echo $urlPath->assets_img("badge.svg"); ?>" uk-tooltip="<?php echo echoOutput($translation['tr_15']); ?>"/>
<?php endif; ?>
</div>
<?php if(!empty($userDetails['user_description'])): ?>
<h5 class="uk-margin-small-top uk-margin-bottom uk-text-muted uk-text-lighter">
<?php echo echoOutput($userDetails['user_description']); ?>
</h5>
<?php endif; ?>

<div class="uk-grid-divider uk-flex uk-flex-center uk-flex-left@s uk-grid-medium uk-margin-small-top uk-margin-medium-bottom" uk-grid>

<div>
	<h5 class="uk-margin-remove"><?php echo echoOutput($translation['tr_88']); ?></h5>
	<p class="uk-margin-remove uk-text-muted"><?php echo countFormat($userDetails['total_likes']); ?></p>
</div>
<div>
	<h5 class="uk-margin-remove"><?php echo echoOutput($translation['tr_89']); ?></h5>
	<p class="uk-margin-remove uk-text-muted"><?php echo countFormat($userDetails['total_recipes']); ?></p>
</div>

<div>
	<h5 class="uk-margin-remove"><?php echo echoOutput($translation['tr_90']); ?></h5>
	<p class="uk-margin-remove uk-text-muted"><?php echo memberSince($userDetails['user_created']); ?></p>
</div>

</div>

</div>

</div>

<div class="uk-width-1-1 uk-width-auto@s uk-width-1-6@s uk-flex uk-flex-center">

<?php if(!isLogged()): ?>
  <a class="follow-btn uk-button uk-button-default uk-border-pill" href="<?php echo $urlPath->signin(); ?>">
    <i class="ti ti-user-plus"></i> <?php echo echoOutput($translation['tr_138']); ?>
  </a>
<?php endif; ?>

<?php if(isLogged() && $userDetails['user_id'] != $userInfo['user_id']): ?>

<?php if($isFollowed == 0): ?>
<a class="follow follow-btn uk-button uk-button-default uk-border-pill" data-follower="<?php echo echoOutput($userDetails['user_id']); ?>" data-user="<?php echo echoOutput($userInfo['user_id']); ?>">
  <i class="ti ti-user-plus"></i> <?php echo echoOutput($translation['tr_138']); ?>
</a>
<a class="unfollow uk-hidden follow-btn uk-button uk-button-default uk-border-pill" data-follower="<?php echo echoOutput($userDetails['user_id']); ?>" data-user="<?php echo echoOutput($userInfo['user_id']); ?>">
  <i class="ti ti-user-x"></i> <?php echo echoOutput($translation['tr_139']); ?>
</a>
<?php endif; ?>

<?php if($isFollowed == 1): ?>
<a class="unfollow follow-btn uk-button uk-button-default uk-border-pill" data-follower="<?php echo echoOutput($userDetails['user_id']); ?>" data-user="<?php echo echoOutput($userInfo['user_id']); ?>">
  <i class="ti ti-user-x"></i> <?php echo echoOutput($translation['tr_139']); ?>
</a>
<a class="follow uk-hidden follow-btn uk-button uk-button-default uk-border-pill" data-follower="<?php echo echoOutput($userDetails['user_id']); ?>" data-user="<?php echo echoOutput($userInfo['user_id']); ?>">
  <i class="ti ti-user-plus"></i> <?php echo echoOutput($translation['tr_138']); ?>
</a>
<?php endif; ?>

<?php endif; ?>

</div>
</div>

<div class="uk-container uk-margin-top">

<div class="uk-flex uk-flex-center uk-flex-middle uk-margin-medium-top" uk-grid>
  <div class="uk-width-expand">
    <h3 class="tas_heading uk-margin-remove uk-heading-line"><span><?php echo echoOutput($translation['tr_91']); ?></span></h3>
  </div>
  <div class="uk-width-auto">
    <form class="uk-grid-small" method="get" action="<?php echo htmlspecialchars($urlPath->search()); ?>" id="searchForm" uk-grid>

    <input type="hidden" name="user" value="<?php echo echoOutput($userDetails['user_id']); ?>">
    <div class="uk-inline">
    <a class="uk-form-icon uk-form-icon-flip uk-padding-small submit-form" uk-icon="icon: search"></a>
    <input class="uk-input uk-form-large uk-border-pill uk-width-1-1" name="query" placeholder="<?php echo echoOutput($translation['tr_79']); ?>" value="<?php echo echoOutput(getQuery()); ?>" type="text">
    </div>

    </form>
  </div>
</div>

<div class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-2@l" uk-grid  uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<?php foreach($items as $item): ?>
<div>
<div class="tas_card_4 uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
       <a href="<?php echo $urlPath->recipe($item['recipe_id'], $item['recipe_slug']); ?>">
       <img src="<?php echo $urlPath->image($item['recipe_image']); ?>" alt="<?php echo echoOutput($item['recipe_title']); ?>" uk-cover>
       </a>
       <canvas width="600" height="350"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <div class="tas_rating">
                <img src="<?php echo $urlPath->assets_img('like.svg'); ?>"><span><?php echo countFormat($item['total_likes']); ?></span>
            </div>

                <a class="uk-card-title" href="<?php echo $urlPath->recipe($item['recipe_id'], $item['recipe_slug']); ?>"><?php echo echoOutput($item['recipe_title']); ?></a>

                <ul class="uk-subnav" uk-margin>
                    <li><span><i class="tas_icon ti ti-users"></i> <?php echo echoOutput($item['recipe_servings']); ?> <?php echo echoOutput($translation['tr_14']); ?></span></li>
                    <li><span><i class="tas_icon ti ti-clock"></i> <?php echo echoOutput($item['recipe_time']); ?></span></li>
                </ul>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>

</div>
</div>

<?php if(!$items): ?>
<div class="uk-width-1-1 uk-flex uk-flex-center uk-text-center uk-margin-large-top">
<div class="uk-width-1-1 uk-width-1-2@s">
<h2 class="uk-text-bold"><?php echo echoOutput($translation['tr_109']); ?></h2>
</div>
</div>
<?php endif; ?>

<?php require './sections/pagination.php'; ?>

</div>

</div>
</div>

<?php require './sections/footer.php'; ?>
