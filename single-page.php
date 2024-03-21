<?php

require "core.php";

// Get Item Slug
$slugItem = clearGetData(getSlugItem());

if(empty($slugItem)){

	header('Location: '. $urlPath->home());
}

// Get ID By Slug
$getPageIDBySlug = getPageIDBySlug($connect, $slugItem);

$itemId = $getPageIDBySlug['id'];

// Page Details
$itemDetails = getPageById($connect, $itemId);

if(empty($itemDetails)){

	header('Location: '. $urlPath->home());
	
}

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], $itemDetails['page_title']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $itemDetails['page_content'], $itemDetails['page_seodescription']);

// Page Title
$pageTitle = $itemDetails['page_title'];

include './header.php';
include './sections/header.php';
include './sections/page-title.php';
include './sections/views/header-ad.view.php';

// is Page Private
if ($itemDetails['page_private'] == 1 && !isLogged()) {

		require './views/private.view.php';

}else{

	if ($itemDetails['page_template'] == 'blank') {

		require './views/single-page.view.php';

	}elseif ($itemDetails['page_template'] == 'search') {
		
		require './pages/search.php';

	}elseif ($itemDetails['page_template'] == 'members') {
		
		require './pages/members.php';

	}else{

		require './views/single-page.view.php';
	}
	
}


include './sections/views/footer-ad.view.php';

if($itemDetails['page_footer'] == 1):
include './sections/footer.php';
endif;

include './footer.php';

?>