<?php

$limitNum = 12;

$getItems = getMembers($connect, $limitNum);

$items = $getItems['items'];
$total = $getItems['total'];

$numPages = numTotalPages($total, $limitNum);

require './pages/views/members.view.php';

?>