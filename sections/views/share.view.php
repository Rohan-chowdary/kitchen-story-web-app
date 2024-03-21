<div class="widget" id="share-item">

<div class="uk-grid-small uk-child-width-1-2 uk-child-width-1-1@s uk-child-width-1-2@m  uk-text-center uk-margin-top" uk-grid>

<div>
<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>" target="_blank" rel="noopener" aria-label="Facebook">
<div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-facebook"></i></div><?php echo echoOutput($translation['tr_28']); ?></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=<?php echo echoOutput($itemDetails['recipe_title']); ?>&amp;url=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>" target="_blank" rel="noopener" aria-label="Twitter">
<div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-twitter"></i></div><?php echo echoOutput($translation['tr_29']); ?></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo echoOutput($itemDetails['recipe_title']); ?>&amp;caption=<?php echo echoOutput($itemDetails['recipe_title']); ?>&amp;content=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>&amp;canonicalUrl=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="Tumblr">
<div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-tumblr"></i></div><?php echo echoOutput($translation['tr_30']); ?></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="https://pinterest.com/pin/create/button/?url=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>&amp;media=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>&amp;description=<?php echo echoOutput($itemDetails['recipe_title']); ?>" target="_blank" rel="noopener" aria-label="Pinterest">
<div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-pinterest"></i></div><?php echo echoOutput($translation['tr_31']); ?></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="whatsapp://send?text=<?php echo echoOutput($itemDetails['recipe_title']); ?>%20<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
<div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-whatsapp"></i></div><?php echo echoOutput($translation['tr_32']); ?></div>
</a>
</div>

<div>

<a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=<?php echo echoOutput($itemDetails['recipe_title']); ?>&amp;url=<?php echo $urlPath->recipe($itemDetails['recipe_id'], $itemDetails['recipe_slug']); ?>" target="_blank" rel="noopener" aria-label="Share on Telegram">
<div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-telegram"></i>
</div><?php echo echoOutput($translation['tr_33']); ?></div>
</a>

</div>
</div>
</div>