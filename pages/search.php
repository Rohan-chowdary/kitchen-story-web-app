<?php

$getItems = getSearch($connect, $site_config['page_limit']);

$items = $getItems['items'];
$total = $getItems['total'];

$numPages = numTotalPages($total, $site_config['page_limit']);

require './pages/views/search.view.php';

?>