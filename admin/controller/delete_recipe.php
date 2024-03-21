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

$id_recipe = cleardata($_GET['id']);

if(!$id_recipe){
	header('Location: ./home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$id_recipe = cleardata($_GET['id']);

$statement = $connect->prepare("DELETE FROM recipes WHERE recipe_id = :recipe_id");
$statement->execute(array('recipe_id' => $id_recipe));

header('Location: ' . $_SERVER['HTTP_REFERER']);
	
}else{
	
	header('Location:'.SITE_URL);
}

}else{
	
	header('Location: ./login.php');		
}

?>