<div class="uk-container uk-margin-top" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

    <h2 class="tas_heading uk-heading-line uk-text-center"><span><?php echo echoOutput($translation['tr_13']); ?></span></h2>

<div class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-2@l" uk-grid>

<?php foreach($communityRecipes as $item): ?>

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