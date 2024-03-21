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

			$category_title = cleardata($_POST['category_title']);
			$category_seodescription = cleardata($_POST['category_seotitle']);
			$category_description = cleardata($_POST['category_description']);
			$category_seodescription = cleardata($_POST['category_seodescription']);
			$category_featured = cleardata($_POST['category_featured']);
			$converted_slug = convertSlug(cleardata($_POST['category_title']));
			$exists = get_category_slug($connect, $converted_slug);

			if ($exists > 0)
			{
				$new_number = $exists + 1;
				$slug = $converted_slug."-".$new_number;

			}else{

				$slug = $converted_slug;
			}

			$category_image = $_FILES['category_image']['tmp_name'];

			$imagefile = explode(".", $_FILES["category_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);

			$image_upload = '../../images/';

			move_uploaded_file($category_image, $image_upload . 'category_' . $renamefile);

			$statment = $connect->prepare("INSERT INTO categories (category_id, category_title, category_seotitle, category_description, category_seodescription, category_featured, category_slug, category_image) VALUES (null, :category_title, :category_seotitle, :category_description, :category_seodescription, :category_featured, :category_slug, :category_image)");

			$statment->execute(array(
				':category_title' => $category_title,
				':category_slug' => $slug,
				':category_seotitle' => $category_seotitle,
				':category_description' => $category_description,
				':category_seodescription' => $category_seodescription,
				':category_featured' => $category_featured,
				':category_image' => 'category_' . $renamefile
			));

			header('Location: ./categories.php');

}

require '../views/new.category.view.php';

}else{
	
	header('Location:'.SITE_URL);
}

	require '../views/footer.view.php';

}else {
header('Location: ./login.php');		
}


?>