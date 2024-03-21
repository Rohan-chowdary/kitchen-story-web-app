<?php

/*--------------------*/
// Description: Realfood - Recipes Php Script
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

 session_start();
if (isset($_SESSION['user_email'])){
    
require '../../config.php';
require '../functions.php';	
require '../views/header.view.php';

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 


$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$theme = get_theme($connect);

$theme = $theme['0'];

require '../views/theme.view.php'; 

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>