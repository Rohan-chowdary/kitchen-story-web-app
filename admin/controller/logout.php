<?php 

/*--------------------*/
// Description: Realfood - Recipes Php Script
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

require '../../config.php';
require '../functions.php';

$connect = connect($database);

if (isAdmin($connect) || isAgent($connect)){
    
	session_start();

	session_destroy();
	$_SESSION = array ();

	header('Location: ./login.php');

}else{

    header('Location:'.SITE_URL);
}




?>