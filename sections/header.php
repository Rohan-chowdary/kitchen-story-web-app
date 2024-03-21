<?php

// Get Menu Header

$headerMenu = getHeaderMenu($connect);

$navigationHeader = getNavigation($connect, $headerMenu['menu_id']);

// Get Header Style

if ($theme['th_headerstyle'] == 'header1') {

	require './sections/views/header-1.view.php';

}elseif ($theme['th_headerstyle'] == 'header2') {
	
	require './sections/views/header-2.view.php';

}elseif ($theme['th_headerstyle'] == 'header3') {
	
	require './sections/views/header-3.view.php';
}

?>