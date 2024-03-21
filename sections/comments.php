<?php

$comments = getComments(3, $itemDetails['recipe_id']);

$numPages = numTotalPages(getCommentsCountById($itemDetails['recipe_id']), 3);

require './sections/views/comments.view.php';

?> 