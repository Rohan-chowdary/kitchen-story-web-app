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

	$th_headerstyle = $_POST['th_headerstyle'];
	$th_homestyle = $_POST['th_homestyle'];

	$th_primarycolor = $_POST['th_primarycolor'];
	$th_secondarycolor = $_POST['th_secondarycolor'];

	$cssFile = file_get_contents('./colors.txt');
	$cssFile = str_replace('{primary_color}', $th_primarycolor, $cssFile);
	$cssFile = str_replace('{secondary_color}', $th_secondarycolor, $cssFile);
	$cssFile = str_replace('{secondary_color_50}', hexToRgb($th_secondarycolor, .50), $cssFile);
	$cssFile = str_replace('{secondary_color_85}', hexToRgb($th_secondarycolor, .85), $cssFile);
	$handler = fopen("../../assets/css/colors.css", "w");
	fwrite($handler, $cssFile);
	fclose($handler);

	$imagefile = explode(".", $_FILES["th_logo"]["name"]);

	$image_save = $_POST['th_logo_save'];
	$th_logo = $_FILES['th_logo'];

	if (empty($th_logo['name'])) {
		$th_logo = $image_save;
	} else{
			$imagefile = explode(".", $_FILES["th_logo"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$image_upload = '../../images/';
		move_uploaded_file($_FILES['th_logo']['tmp_name'], $image_upload . $renamefile);
		$th_logo = $renamefile;
	}

	$imagefile_3 = explode(".", $_FILES["th_favicon"]["name"]);

	$image_save_3 = $_POST['th_favicon_save'];
	$th_favicon = $_FILES['th_favicon'];

	if (empty($th_favicon['name'])) {
		$th_favicon = $image_save_3;
	} else{
			$imagefile_3 = explode(".", $_FILES["th_favicon"]["name"]);
			$renamefile_3 = round(microtime(true)) . '.' . end($imagefile_3);
		$image_upload_3 = '../../images/';
		move_uploaded_file($_FILES['th_favicon']['tmp_name'], $image_upload_3 . $renamefile_3);
		$th_favicon = $renamefile_3;
	}

	$imagefile_4 = explode(".", $_FILES["th_homebg"]["name"]);

	$image_save_4 = $_POST['th_homebg_save'];
	$th_homebg = $_FILES['th_homebg'];

	if (empty($th_homebg['name'])) {
		$th_homebg = $image_save_4;
	} else{
			$imagefile_4 = explode(".", $_FILES["th_homebg"]["name"]);
			$renamefile_4 = round(microtime(true)) . '.' . end($imagefile_4);
		$image_upload_4 = '../../images/';
		move_uploaded_file($_FILES['th_homebg']['tmp_name'], $image_upload_4 . $renamefile_4);
		$th_homebg = $renamefile_4;
	}

	$imagefile_5 = explode(".", $_FILES["th_testimonial"]["name"]);

	$image_save_5 = $_POST['th_testimonial_save'];
	$th_testimonial = $_FILES['th_testimonial'];

	if (empty($th_testimonial['name'])) {
		$th_testimonial = $image_save_5;
	} else{
			$imagefile_5 = explode(".", $_FILES["th_testimonial"]["name"]);
			$renamefile_5 = round(microtime(true)) . '.' . end($imagefile_5);
		$image_upload_5 = '../../images/';
		move_uploaded_file($_FILES['th_testimonial']['tmp_name'], $image_upload_5 . $renamefile_5);
		$th_testimonial = $renamefile_5;
	}

	$imagefile_6 = explode(".", $_FILES["th_testimonial"]["name"]);

	$image_save_5 = $_POST['th_whitelogo_save'];
	$th_whitelogo = $_FILES['th_whitelogo'];

	if (empty($th_whitelogo['name'])) {
		$th_whitelogo = $image_save_5;
	} else{
			$imagefile_6 = explode(".", $_FILES["th_whitelogo"]["name"]);
			$renamefile_6 = round(microtime(true)) . '.' . end($imagefile_6);
		$image_upload_6 = '../../images/';
		move_uploaded_file($_FILES['th_whitelogo']['tmp_name'], $image_upload_6 . $renamefile_6);
		$th_whitelogo = $renamefile_6;
	}

$statment = $connect->prepare(
	"UPDATE theme SET
	th_primarycolor = :th_primarycolor,
	th_secondarycolor = :th_secondarycolor,
	th_headerstyle = :th_headerstyle,
	th_homestyle = :th_homestyle,
	th_logo = :th_logo,
	th_whitelogo = :th_whitelogo,
	th_favicon = :th_favicon,
	th_homebg = :th_homebg,
	th_testimonial = :th_testimonial
	");

$statment->execute(array(

	':th_primarycolor' => $th_primarycolor,
	':th_secondarycolor' => $th_secondarycolor,
	':th_headerstyle' => $th_headerstyle,
	':th_homestyle' => $th_homestyle,
	':th_logo' => $th_logo,
	':th_whitelogo' => $th_whitelogo,
	':th_favicon' => $th_favicon,
	':th_homebg' => $th_homebg,
	':th_testimonial' => $th_testimonial
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