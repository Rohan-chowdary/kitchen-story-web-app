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

	$st_dateformat = $_POST['st_dateformat'];
	$st_langdir = $_POST['st_langdir'];
	$st_facebook = $_POST['st_facebook'];
	$st_twitter = $_POST['st_twitter'];
	$st_youtube = $_POST['st_youtube'];
	$st_instagram = $_POST['st_instagram'];
	$st_linkedin = $_POST['st_linkedin'];
	$st_whatsapp = $_POST['st_whatsapp'];
	$st_maintenance = $_POST['st_maintenance'];
	$st_defaultsearchpage = $_POST['st_defaultsearchpage'];
	$st_defaultprivacypage = $_POST['st_defaultprivacypage'];
	$st_defaultmemberspage = $_POST['st_defaultmemberspage'];
	$st_defaulttermspage = $_POST['st_defaulttermspage'];
	$st_analytics = $_POST['st_analytics'];
	$st_recipientemail = $_POST['st_recipientemail'];
	$st_smtphost = $_POST['st_smtphost'];
	$st_smtpemail = $_POST['st_smtpemail'];
	$st_smtppassword = $_POST['st_smtppassword'];
	$st_smtpencrypt = $_POST['st_smtpencrypt'];
	$st_smtpport = $_POST['st_smtpport'];
	$st_recaptchakey = $_POST['st_recaptchakey'];
	$st_recaptchasecretkey = $_POST['st_recaptchasecretkey'];

$statment = $connect->prepare(
	"UPDATE settings SET
	st_dateformat = :st_dateformat,
	st_langdir = :st_langdir,
	st_facebook = :st_facebook,
	st_twitter = :st_twitter,
	st_youtube = :st_youtube,
	st_instagram = :st_instagram,
	st_linkedin = :st_linkedin,
	st_whatsapp = :st_whatsapp,
	st_maintenance = :st_maintenance,
	st_defaultsearchpage = :st_defaultsearchpage,
	st_defaultprivacypage = :st_defaultprivacypage,
	st_defaultmemberspage = :st_defaultmemberspage,
	st_defaulttermspage = :st_defaulttermspage,
	st_analytics = :st_analytics,
	st_recipientemail = :st_recipientemail,
	st_smtphost = :st_smtphost,
	st_smtpemail = :st_smtpemail,
	st_smtppassword = :st_smtppassword,
	st_smtpencrypt = :st_smtpencrypt,
	st_smtpport = :st_smtpport,
	st_recaptchakey = :st_recaptchakey,
	st_recaptchasecretkey = :st_recaptchasecretkey
	");

$statment->execute(array(
	':st_dateformat' => $st_dateformat,
	':st_langdir' => $st_langdir,
	':st_facebook' => $st_facebook,
	':st_twitter' => $st_twitter,
	':st_youtube' => $st_youtube,
	':st_instagram' => $st_instagram,
	':st_linkedin' => $st_linkedin,
	':st_whatsapp' => $st_whatsapp,
	':st_maintenance' => $st_maintenance,
	':st_defaultsearchpage' => $st_defaultsearchpage,
	':st_defaultprivacypage' => $st_defaultprivacypage,
	':st_defaultmemberspage' => $st_defaultmemberspage,
	':st_defaulttermspage' => $st_defaulttermspage,
	':st_analytics' => $st_analytics,
	':st_recipientemail' => $st_recipientemail,
	':st_smtphost' => $st_smtphost,
	':st_smtpemail' => $st_smtpemail,
	':st_smtppassword' => $st_smtppassword,
	':st_smtpencrypt' => $st_smtpencrypt,
	':st_smtpport' => $st_smtpport,
	':st_recaptchakey' => $st_recaptchakey,
	':st_recaptchasecretkey' => $st_recaptchasecretkey
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