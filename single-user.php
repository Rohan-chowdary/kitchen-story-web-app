<?php

require "core.php";

$itemId = clearGetData(getIDUser());

if(empty($itemId)){

	header('Location: '. $urlPath->home());
}

$userDetails = getUserInfoById($connect, $itemId);

if(empty($userDetails)){

	header('Location: '. $urlPath->error()); 
}

$getItems = getSearch($connect, $site_config['page_limit']);

$items = $getItems['items'];
$total = $getItems['total'];

$numPages = numTotalPages($total, $site_config['page_limit']);

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], $userDetails['user_name']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $userDetails['user_description']);

// Page Title
$pageTitle = $userDetails['user_name'];

if (isLogged()) {

$isFollowed = isFollowed($connect, $userInfo['user_id'], $userDetails['user_id']);

}

include './header.php';
require './views/single-user.view.php';
include './footer.php';

?>