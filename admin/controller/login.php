<?php 


/*--------------------*/
// Description: Realfood - Recipes Php Script
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

session_start();

include('../../classes/csrf.php');
require '../../config.php';
require '../functions.php';

$csrf = new CSRF();

$connect = connect($database);

if(!$connect){
    header('Location: ./error.php');
}

$errors = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// $captcha = $_POST["captcha"];
	// $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);

	$captchaUser = "12345";


	

	if ($csrf->validate('login-token')) 
	{

		$user_email = filter_var(strtolower($_POST['user_email']), FILTER_SANITIZE_STRING);
		$user_password = cleardata($_POST['user_password']);
		$password = hash('sha512', $user_password);

		try{        
		$connect;

		}catch (PDOException $e){

		echo "Error: ." . $e->getMessage();  

		}
		$statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password AND user_status = 1 AND (user_role = 1 OR user_role = 2)");
		$statement->execute(array(
		':user_email' => $user_email,
		':user_password' => $password

		));

		$result_login = $statement->fetch();

		if ($result_login !== false){
		$_SESSION['signedin'] = true;
		$_SESSION['user_email'] = $user_email;
		$_SESSION['user_name'] = $result_login['user_name'];

		header('Location: ./home.php');

		}else{

		$errors .= _LOGINACCESSDENIED;
		}

	}else {

		$errors .= _LOGININVALIDTOKEN;
	}
	

}
	  

require '../views/header.view.php';
require '../views/login.view.php';
require '../views/footer.view.php';

?>