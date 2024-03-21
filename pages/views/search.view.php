
<div class="uk-container">

<?php if(!empty($itemDetails['page_content'])): ?>
<div class="uk-width-1-1">
<?php echo $itemDetails['page_content']; ?>
</div>
<?php endif; ?>

<div class="uk-grid-large" uk-grid>

<div class="uk-width-expand@m">

<div class="uk-grid-medium" uk-grid>
<div class="uk-width-auto uk-width-expand@s uk-flex uk-flex-middle uk-first-column">
<div class="tas-listing-title">
<h5 class="uk-margin-remove"><?php echo $total; ?> <?php echo echoOutput($translation['tr_80']); ?></h5>
</div>
</div>
<div class="uk-width-expand uk-width-1-2@s uk-width-1-4@l">
<div class="uk-grid-small" uk-grid>

<div class="uk-width-expand">
<select class="tas-order-by nc-select wide uk-form-large uk-border-rounded" id="sortby">
<option <?php echo getSortBy('default'); ?>><?php echo echoOutput($translation['tr_81']); ?></option>
<option <?php echo getSortBy('date-desc'); ?>><?php echo echoOutput($translation['tr_82']); ?></option>
<option <?php echo getSortBy('date-asc'); ?>><?php echo echoOutput($translation['tr_83']); ?></option>
<option <?php echo getSortBy('best-rated'); ?>><?php echo echoOutput($translation['tr_84']); ?></option>
</select>
</div>	

<div class="uk-width-auto">

<a class="uk-button uk-button-primary uk-border-rounded uk-form-large" type="button" uk-toggle="target: #search-form; animation: uk-animation-fade">
<i class="ti ti-chevron-down uk-padding-small"></i>
</a>

</div>

</div>

</div>

<div class="uk-width-1-1" id="search-form" hidden>

<?php require './sections/advanced-search.php'; ?>


</div>

</div>

<div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<?php foreach($items as $item): ?>
<div class="tas_card_1">

<div class="uk-card uk-card-default uk-border-rounded">
<a href="<?php echo $urlPath->recipe($item['recipe_id'], $item['recipe_slug']); ?>">
<div class="uk-card-media-top uk-cover-container">
<img src="<?php echo $urlPath->image($item['recipe_image']); ?>" alt="<?php echo echoOutput($item['recipe_title']); ?>" uk-cover>
<canvas width="600" height="300"></canvas>
</div>
</a>
<div class="uk-card-body">
<div class="uk-card-badge uk-label"><?php echo echoOutput($item['category_title']); ?></div>

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
