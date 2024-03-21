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

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$users_total = users_total($connect); 
$recipes_total = recipes_total($connect);
$recipes = get_latest_recipes($connect);

require '../views/home.view.php';

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>