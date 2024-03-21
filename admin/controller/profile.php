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
	header ('Location: ./error.php');
	}

$id_user = id_user($_GET['id']);
    
if(empty($id_user)){
	header('Location: ./home.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$id_user = id_user($_GET['id']);

$user = get_user_per_id($connect, $id_user);
    
if(!$user){
    header('Location: ./home.php');
}

$userDetails = $user['0'];

$recipes = get_all_recipes_by_user($connect, $user['user_id']);

require '../views/profile.view.php';

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>