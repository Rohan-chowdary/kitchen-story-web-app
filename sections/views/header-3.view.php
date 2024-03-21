<div class="uk-container uk-visible@m">

    <nav class="tas_top_nav uk-section-white uk-padding-small" uk-navbar>

        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="<?php echo $urlPath->home(); ?>">
                <img src="<?php echo $urlPath->image($theme['th_logo']); ?>">
            </a>
        </div>

        <div class="uk-navbar-center">

        <form class="tas_nav_search" method="get" action="<?php echo htmlspecialchars($urlPath->search()); ?>">
<div class="uk-inline">
                    <span class="uk-form-icon"></span>
    <a class="uk-form-icon uk-form-icon-flip uk-margin-small-right uk-text-primary" href="" uk-icon="icon: search; ratio: 1.2"></a>
    <input class="uk-input uk-form-large uk-border-pill uk-width-1-1" name="query" placeholder="<?php echo $translation['tr_4']; ?>">
</div>
        </form>

     </div>

     <div class="uk-navbar-right">

        <?php if (isLogged()): ?>

            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                <div class="uk-cover-container uk-border-circle">
                    <img src="<?php echo $urlPath->image($userInfo['user_avatar']); ?>" uk-cover>
                    <canvas width="50" height="50"></canvas>
                </div>
                </div>
                <div class="uk-width-expand">
                    <h5 class="uk-margin-remove-bottom uk-text-bold"><?php echo echoOutput(textTruncate($userInfo['user_name'], 10)); ?></h5>
                    <p class="uk-comment-meta uk-margin-remove-top"><a class="uk-link-reset" href="<?php echo $urlPath->profile(); ?>"><?php echo $translation['tr_10']; ?></a></p>
                </div>
            </div>

        <?php endif; ?>

        <?php if (!isLogged()): ?>

            <a class="uk-button uk-button-primary uk-text-truncate uk-border-pill" href="<?php echo $urlPath->signin(); ?>">
                <i class="ti ti-plus"></i> <?php echo $translation['tr_5']; ?>
            </a>

        <?php endif; ?>

    </div>

</nav>

</div>

<div class="uk-section-primary uk-visible@m">

    <div class="tas_top_nav uk-container">

        <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
<div class="uk-navbar-center">

<ul class="uk-navbar-nav">
<?php foreach($navigationHeader as $item): ?>
<?php if ($item['navigation_type'] == 'custom') { ?>
<?php if($item['navigation_url'] == '/'){ ?>
<li><a href="<?php echo $urlPath->home(); ?>" target="<?php echo $item['navigation_target']; ?>"><?php echo echoOutput($item['navigation_label']); ?></a></li>
<?php }else{ ?>
<li><a href="<?php echo $item['navigation_url']; ?>" target="<?php echo $item['navigation_target']; ?>"><?php echo echoOutput($item['navigation_label']); ?></a></li>
<?php } ?>
<?php } else { ?>
<li><a href="<?php echo $urlPath->page($item['navigation_url']); ?>" target="<?php echo $item['navigation_target']; ?>"><?php echo echoOutput($item['navigation_label']); ?></a></li>
<?php } ?>
<?php endforeach; ?>
</ul>

</nav>
</div>
</div>
</div>

<?php require './sections/views/mobile-header.view.php'; ?>
