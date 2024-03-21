<?php

$homeSlider = getSlider($connect, $site_config['featured_items']);

if ($theme['th_homestyle'] == 'home1') {

	require './sections/views/home-1.view.php';

}elseif ($theme['th_homestyle'] == 'home2') {
	
	require './sections/views/home-2.view.php';
}

?>