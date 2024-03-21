<div class="single-newsletter uk-button-default widget">

<i class="icon ti ti-mail-opened"></i>

<h2 class="title uk-text-break"><?php echo echoOutput($translation['tr_34']); ?></h2>
<p class="subtitle uk-text-muted"><?php echo echoOutput($translation['tr_35']); ?></p>

<div class="newsletter">
<form>
<div class="uk-inline uk-width-1-1">
<span class="uk-form-icon" uk-icon="icon: mail"></span>
<input class="uk-input uk-form-large uk-border-rounded" placeholder="<?php echo echoOutput($translation['tr_46']); ?>" id="newsletter_email" type="email">
</div>
<button class="uk-button uk-button-primary uk-button-large uk-border-rounded uk-width-1-1 uk-margin-small-top" value="<?php echo echoOutput($translation['tr_45']); ?>" type="submit" id="submit-newsletter"><?php echo echoOutput($translation['tr_45']); ?></button>

<div id="getresults"></div>

<p class="uk-text-small uk-margin-remove uk-padding-small"><?php echo echoOutput($translation['tr_36']); ?> <a class="uk-link-muted" target="_blank" href="<?php echo $urlPath->terms(); ?>"> <b><?php echo echoOutput($defaultTermsPage['page_title']); ?></b></a></p>

</form>
</div>

</div>