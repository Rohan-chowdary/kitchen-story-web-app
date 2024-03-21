<?php

$relatedRecipes = getRelatedRecipes($connect, $itemDetails['recipe_id'], $itemDetails['recipe_category']);

require './sections/views/related-recipes.view.php';

?>