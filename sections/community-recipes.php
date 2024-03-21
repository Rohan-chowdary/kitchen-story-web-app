<?php

$communityRecipes = getCommunityRecipes($connect, $site_config['uploaded_items']);

require './sections/views/community-recipes.view.php';

?>