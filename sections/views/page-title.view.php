<!-- PAGE TITLE -->

<div class="page-title uk-section uk-section-small uk-section-default">
<div class="uk-container">
    <h3 class="uk-heading-line uk-text-center uk-text-left@m"><span><?php echo echoOutput($pageTitle); ?></span></h3>
    <?php if(isset($pageSummary) && !empty($pageSummary)): ?>
    	<p class="summary"><?php echo echoOutput($pageSummary); ?></p>
    <?php endif; ?>
    </div>
</div>

<!-- END PAGE TITLE -->
