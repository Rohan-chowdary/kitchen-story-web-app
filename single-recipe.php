<?php

require "core.php";

// Get Item Slug
$itemId = clearGetData(getItemId());

if(empty($itemId)){

	header('Location: '. $urlPath->home());
}

// Page Details
$itemDetails = getRecipeById($connect, $itemId);

if(empty($itemDetails)){

	header('Location: '. $urlPath->error());
}

$ingredients =  explode(',', $itemDetails["recipe_ingredients"]);
$instructions =  explode(',', $itemDetails["recipe_instructions"]);

// Seo Title
$titleSeoHeader = getSeoTitle(empty($itemDetails['recipe_seotitle']) ? $itemDetails['recipe_title'] : $itemDetails['recipe_seotitle']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $itemDetails['recipe_description'], $itemDetails['recipe_seodescription']);

// Page Title
$pageTitle = $itemDetails['recipe_title'];

if (isLogged()) {

$isFav = isInFav($connect, $userInfo['user_id'], $itemId);

}

include './header.php';
require './views/single-recipe.view.php';
include './footer.php';

?>