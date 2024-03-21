<?php

$latestRecipes = getLatestRecipes($connect, $site_config['recent_items']);

require './sections/views/latest-recipes.view.php';

?>