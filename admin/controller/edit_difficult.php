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

	if (empty($_GET["id"]) ) {
		header('Location: ./categories.php');
	}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$difficult_id = cleardata($_POST['difficult_id']);
			$difficult_title = cleardata($_POST['difficult_title']);

			$statment = $connect->prepare("UPDATE categories SET difficult_id = :difficult_id, difficult_title = :difficult_title WHERE difficult_id = :difficult_id");

			$statment->execute(array(
				':difficult_id' => $difficult_id,
				':difficult_title' => $difficult_title
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_difficult = id_difficult($_GET['id']);

			$difficult = get_difficult_per_id($connect, $id_difficult);

			if (!$difficult){
				header('Location: ./home.php');
			}

			$difficult = $difficult['0'];

			require '../views/edit.difficult.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>