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

$connect = connect($database);
if(!$connect){
header('Location: ./error.php');
} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$ad_title = cleardata($_POST['ad_title']);
$ad_position = cleardata($_POST['ad_position']);

$statment = $connect->prepare( "INSERT INTO ads (ad_id,ad_title,ad_position) VALUES (null, :ad_title, :ad_position)");

$statment->execute(array(
':ad_title' => $ad_title,
':ad_position' => $ad_position
));
}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}


}else {
header('Location: ./login.php');		
}


?>