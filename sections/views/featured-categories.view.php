<div class="uk-container uk-margin-top" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

    <h2 class="tas_heading uk-heading-line uk-text-center"><span><?php echo echoOutput($translation['tr_11']); ?></span></h2>


        <div uk-slider="finite: true">
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-6@l uk-grid-large" uk-grid>
                    <?php foreach($featuredCategories as $item): ?>

                    <li>
                        <a href="<?php echo $urlPath->search(['category' => $item['category_id']]); ?>">
                            <div class="tas_card_3">
                                <div class="uk-cover-container">
                                    <img src="<?php echo $urlPath->image($item['category_image']); ?>" alt="<?php echo echoOutput($item['category_title']); ?>" uk-cover>
                                </div>
                                <h5 class="card-title"><?php echo echoOutput($item['category_title']); ?></h5>
                                <p><?php echo echoOutput($item['total_items']); ?> <?php echo echoOutput($translation['tr_87']); ?></p>
                            </div>

                        </a>
                    </li>

                    <?php endforeach; ?>
                </ul>
            </div>

            <ul class="tas_dotnav uk-slider-nav uk-dotnav uk-flex-center uk-margin-large-top uk-margin-medium-bottom"></ul>

        </div>
    </div>