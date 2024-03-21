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

$comment_id = cleardata($_GET['id']);

if(!$comment_id){
	header('Location: ./home.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

$comment_id = cleardata($_GET['id']);

$statement = $connect->prepare("DELETE FROM comments WHERE id = :id");
$statement->execute(array('id' => $comment_id));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	header('Location:'.SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>