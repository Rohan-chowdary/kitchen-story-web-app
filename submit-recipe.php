<?php

require "core.php";

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], $translation['tr_profilepage']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3']);

require './header.php';
require './views/submit-recipe.view.php';
require './footer.php';


?>