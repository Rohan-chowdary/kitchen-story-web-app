<?php

$randomRecipes = getRandomRecipes($connect, $site_config['random_items']);

require './sections/views/random-recipes.view.php';

?>