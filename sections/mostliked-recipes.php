<?php

$likedRecipes = getMostLikedRecipes($connect, 6);

require './sections/views/mostliked-recipes.view.php';

?>