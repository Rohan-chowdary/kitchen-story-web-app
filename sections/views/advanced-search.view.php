<form class="uk-grid-small" method="get" action="<?php echo htmlspecialchars($urlPath->search()); ?>" id="searchForm" uk-grid>

<div class="uk-width-1-1 uk-width-expand@s">

<?php if(getIDUser()): ?>
<input type="hidden" name="user" value="<?php echo echoOutput(getIDUser()); ?>">
<?php endif; ?>

<input class="uk-input uk-form-large uk-border-rounded uk-width-1-1" name="query" value="<?php echo echoOutput(getQuery()); ?>" placeholder="<?php echo echoOutput($translation['tr_79']); ?>" type="text">
</div>

<div class="uk-width-1-1 uk-width-expand@s">
<select class="nc-select wide uk-form-large uk-border-rounded" name="category">


<?php if(getIDCategory()) { ?>
<option selected value> <?php echo echoOutput($translation['tr_85']); ?> </option>
<?php
foreach($getCategories as $item) {
if(getIDCategory() == $item['category_id'])
{
echo '<option value="'.getIDCategory().'" selected="selected">'.$item['category_title'].'</option>';
} else {
echo '<option value="'.$item['category_id'].'">'.$item['category_title'].'</option>';

}}} ?>

<?php if(!getIDCategory()) { ?>
<option selected value> <?php echo echoOutput($translation['tr_85']); ?> </option>
<?php foreach($getCategories as $item): ?>
	<option value="<?php echo $item['category_id']; ?>"><?php echo $item['category_title']; ?></option>
<?php endforeach; ?>
<?php } ?>

</select>
</div>

<div class="uk-width-1-1 uk-width-auto@s">
<button class="uk-button uk-button-large uk-button-default uk-border-rounded uk-width-1-1" value="<?php echo echoOutput($translation['tr_86']); ?>" type="submit"><?php echo echoOutput($translation['tr_86']); ?></button>
</div>

</form>