<div class="uk-section uk-section-primary uk-preserve-color uk-margin-top" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">
    <div class="uk-container">

        <h2 class="tas_heading uk-heading-line uk-text-center"><span><?php echo echoOutput($translation['tr_12']); ?></span></h2>

        <div uk-slider="finite: true">
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > li > div > .uk-card">

                    <?php foreach($randomRecipes as $item): ?>

                        <li>
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

                                    <div class="uk-card-footer">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">

                                                <a href="<?php echo $urlPath->user($item['recipe_author']); ?>">
                                                <div class="uk-cover-container uk-border-circle">
                                                    <img src="<?php echo $urlPath->image($item['author_avatar']); ?>" uk-cover>
                                                    <canvas width="40" height="40"></canvas>
                                                </div>
                                                </a>

                                            </div>
                                            <div class="uk-width-expand">
                                               <h5 class="uk-margin-remove-bottom uk-flex uk-flex-middle"> <a class="uk-link-muted" href="<?php echo $urlPath->user($item['recipe_author']); ?>"><?php echo echoOutput($item['author_name']); ?></a>
                                                <?php if (isUserVerified($item['author_email'])):?>
                                                    <img class="verify-badge" width="14" src="<?php echo $urlPath->assets_img("badge.svg"); ?>"/>
                                                <?php endif; ?>
                                            </h5>
                                            <p class="uk-text-meta uk-margin-remove-top">
                                                <?php echo formatDate($item['recipe_created']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </li>

            <?php endforeach; ?>

        </ul>
    </div>

            <ul class="tas_dotnav_2 uk-slider-nav uk-dotnav uk-flex-center uk-margin-large-top"></ul>

</div>
</div>
</div>