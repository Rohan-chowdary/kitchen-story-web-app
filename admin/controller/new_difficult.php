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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$difficult_title = cleardata($_POST['difficult_title']);

			$statment = $connect->prepare("INSERT INTO difficulties (difficult_id, difficult_title) VALUES (null, :difficult_title)");

			$statment->execute(array(
				':difficult_title' => $difficult_title
			));

			header('Location: ./difficulties.php');

}

require '../views/new.difficult.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {
header('Location: ./login.php');		
}


?>