<?php 

/*--------------------*/
// Description: Realfood - Recipes Php Script
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

require '../config.php';
require './functions.php';

$connect = connect($database);

if (isAdmin($connect) || isAgent($connect)){

    header('Location: ./controller/home.php');

}else{
    
    header('Location: ./controller/login.php');
}



?>