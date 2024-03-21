<div class="uk-container uk-margin-top" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

    <h2 class="tas_heading uk-heading-line uk-text-center"><span><?php echo echoOutput($translation['tr_135']); ?></span></h2>

    <div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>

<?php foreach($likedRecipes as $item): ?>

<div>

        <a href="<?php echo $urlPath->recipe($item['recipe_id'], $item['recipe_slug']); ?>">
    <div class="tas_card_2 uk-cover-container uk-height-medium">
        <img src="<?php echo $urlPath->image($item['recipe_image']); ?>" alt="<?php echo echoOutput($item['recipe_title']); ?>" uk-cover>

        <div class="tas_rating">
                <img src="<?php echo $urlPath->assets_img('like.svg'); ?>"><span><?php echo countFormat($item['total_likes']); ?></span>
        </div>

        <div class="uk-overlay uk-position-bottom">
            <div class="uk-label"><?php echo echoOutput($item['category_title']); ?></div>
            <p class="card-title"><?php echo echoOutput($item['recipe_title']); ?></p>
            <ul class="uk-subnav" uk-margin>
                <li><span><i class="tas_icon ti ti-users"></i> <?php echo echoOutput($item['recipe_servings']); ?> <?php echo echoOutput($translation['tr_14']); ?></span></li>
                <li><span><i class="tas_icon ti ti-clock"></i> <?php echo echoOutput($item['recipe_time']); ?></span></li>
            </ul>
        </div>
    </div>
</a>

</div>

<?php endforeach; ?>

</div>
</div>