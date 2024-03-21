
<div class="uk-container uk-margin-large-top" uk-scrollspy="cls: uk-animation-fade; delay: 100">

	<div class="tas_slider_1" uk-slider>

		<div class="uk-position-relative">
			<div class="uk-slider-container">

				<ul class="uk-slider-items uk-child-width-1-1">

					<?php foreach($homeSlider as $item): ?>

						<li>
							<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                            <a href="<?php echo $urlPath->recipe($item['recipe_id'], $item['recipe_slug']); ?>">
								<div class="uk-card-media-left uk-cover-container">
									<img src="<?php echo $urlPath->image($item['recipe_image']); ?>" alt="<?php echo echoOutput($item['recipe_title']); ?>" uk-cover>
									<canvas width="600" height="400"></canvas>
								</div>
							</a>
								<div>
									<div class="uk-card-body uk-text-center uk-text-left@s">
										<div class="tas_badge uk-label"><?php echo echoOutput($item['category_title']); ?></div>

                            			<a href="<?php echo $urlPath->recipe($item['recipe_id'], $item['recipe_slug']); ?>">
										<h2 class="uk-card-title"><?php echo echoOutput($item['recipe_title']); ?></h2>
										</a>
										<hr class="uk-divider-small">

										<div class="tas_rating">
											<img src="<?php echo $urlPath->assets_img('like.svg'); ?>"><span><?php echo countFormat($item['total_likes']); ?></span>
										</div>

										<p><?php echo echoNoHtml($item['recipe_description']); ?></p>

										<ul class="uk-flex-center uk-flex-left@s uk-subnav" uk-margin>
											<li><span><i class="tas_icon ti ti-users"></i> <?php echo echoOutput($item['recipe_servings']); ?> <?php echo echoOutput($translation['tr_14']); ?></span></li>
											<li><span><i class="tas_icon ti ti-clock"></i> <?php echo echoOutput($item['recipe_time']); ?></span></li>
										</ul>

									</div>

								</div>
							</div>
						</li>

					<?php endforeach; ?>


				</ul>
			</div>

		</div>

		<ul class="tas_dotnav_1 uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

	</div>

</div>