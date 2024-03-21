<!-- HEADER -->
<?php require './sections/header.php'; ?>

    <!-- PAGE TITLE -->
    
    <div class="page-title uk-section uk-section-small uk-section-default">
    <div class="uk-container">
        <h3 class="uk-heading-line uk-text-center uk-text-left@m"><span><?php echo echoOutput($translation['tr_profilepage']) ?></span></h3>
        </div>
    </div>

    <!-- END PAGE TITLE -->

<!-- PAGE CONTENT -->

<div class="uk-container">
<div class="uk-grid-medium" uk-grid>

        <div class="uk-width-1-3@s uk-width-1-4@m">

            <div class="profile uk-box-shadow-small uk-border-rounded uk-padding">


                <div class="uk-block uk-margin-remove uk-text-center">
                    <div class="uk-inline uk-margin">

                    <div class="uk-cover-container uk-border-pill uk-box-shadow-small">
                        <a href="<?php echo $urlPath->user($userDetails['user_id']); ?>"><img src="<?php echo $urlPath->image($userDetails['user_avatar']); ?>" alt="<?php echo echoOutput($userDetails['user_name']); ?>" uk-cover>
                        </a>
                        <canvas width="150" height="150"></canvas>
                    </div>
                    </div>

                </div>

                <div class="uk-margin uk-margin-remove-top uk-text-center">
                    <div class="uk-flex uk-flex-middle uk-flex-center">
                    <a href="<?php echo $urlPath->user($userDetails['user_id']); ?>" class="uk-link-reset"><p class="uk-text-bold uk-margin-remove"><?php echo echoOutput($userDetails['user_name']); ?></p></a>
					<?php if (isUserVerified($userDetails['user_email'])):?>
						<img class="verify-badge" width="17" src="<?php echo $urlPath->assets_img("badge.svg"); ?>"/>
					<?php endif; ?>
                    </div>
                    
                    <p class="uk-text-muted uk-text-small uk-margin-remove"><?php echo maskEmail($userDetails['user_email']); ?></p>
                </div>

                    <div class="uk-grid-divider uk-flex uk-flex-center uk-text-center uk-grid-small uk-margin-small-top uk-margin-bottom" uk-grid>

                    <div>
                        <h5 class="uk-margin-remove"><?php echo echoOutput($translation['tr_136']); ?></h5>
                        <a href="<?php echo $urlPath->profile('following'); ?>" class="uk-margin-remove uk-link-muted"><?php echo countFormat($userDetails['total_following']); ?></a>
                    </div>

                    <div>
                        <h5 class="uk-margin-remove"><?php echo echoOutput($translation['tr_137']); ?></h5>
                        <a href="<?php echo $urlPath->profile('followers'); ?>" class="uk-margin-remove uk-link-muted"><?php echo countFormat($userDetails['total_followers']); ?></a>
                    </div>

                    </div>

                <hr>

                <ul class="uk-list">
				    <?php if(isAdmin() || isEditor()): ?>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->admin(); ?>"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> <?php echo echoOutput($translation['tr_179']); ?></a></li>
					<?php endif; ?>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->profile('edit'); ?>"><span class="uk-margin-small-right" uk-icon="icon: file-edit"></span> <?php echo echoOutput($translation['tr_180']); ?></a></li>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->profile('favorites'); ?>"><span class="uk-margin-small-right" uk-icon="icon: heart"></span> <?php echo echoOutput($translation['tr_182']); ?></a></li>
                    <li><a class="uk-link-muted" href="<?php echo $urlPath->profile('recipes'); ?>"><span class="uk-margin-small-right" uk-icon="icon: album"></span> <?php echo echoOutput($translation['tr_93']); ?></a></li>
				    <li><a class="uk-link-muted" href="<?php echo $urlPath->submitrecipe(); ?>"><span class="uk-margin-small-right" uk-icon="icon: plus-circle"></span> <?php echo echoOutput($translation['tr_132']); ?></a></li>

                </ul>

                <hr>

                <a class="uk-button uk-button-secondary uk-text-truncate uk-border-rounded uk-width-1-1" href="<?php echo $urlPath->signout(); ?>"
                ><i class="fas fa-lock uk-margin-small-right"></i> <?php echo echoOutput($translation['tr_181']); ?>
            </a>

        </div>

    </div>

<div class="uk-width-expand">

<?php if (!isset($_GET['action'])): ?>

<?php require './views/favorites-profile.view.php'; ?>

<?php endif;?>

<?php if (isEditing()): ?>

<?php require './views/edit-profile.view.php'; ?>

<?php endif;?>

<?php if (isFavorites()): ?>

<?php require './views/favorites-profile.view.php'; ?>

<?php endif;?>

<?php if (isRecipes()): ?>

<?php require './views/recipes-profile.view.php'; ?>

<?php endif;?>

<?php if (isFollowers()): ?>

<?php require './views/followers.view.php'; ?>

<?php endif;?>

<?php if (isFollowing()): ?>

<?php require './views/following.view.php'; ?>

<?php endif;?>

</div>

</div>
</div>

<!-- END PAGE CONTENT -->

<!-- FOOTER -->

<?php require './sections/footer.php'; ?>
