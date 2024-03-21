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

			$category_id = cleardata($_POST['category_id']);
			$category_title = cleardata($_POST['category_title']);
			$category_seotitle = cleardata($_POST['category_seotitle']);
			$category_description = cleardata($_POST['category_description']);
			$category_seodescription = cleardata($_POST['category_seodescription']);
			$category_featured = cleardata($_POST['category_featured']);
			$category_status = cleardata($_POST['category_status']);

			$category_slug = cleardata($_POST['category_slug']);

			if (empty($category_slug)) {
				$slug = $_POST['category_slug_save'];
			}else{

				$converted_slug = convertSlug($_POST['category_slug']);
				$exists = get_category_slug($connect, $converted_slug);

				if ($exists > 0)
				{
					$new_number = $exists + 1;
					$slug = $converted_slug."-".$new_number;

				}else{

					$slug = $converted_slug;
				}
			}

			$imagefile = explode(".", $_FILES["category_image"]["name"]);

			$image_save = $_POST['category_image_save'];
			$category_image = $_FILES['category_image'];

			if (empty($category_image['name'])) {
				$category_image = $image_save;
			} else{
				$imagefile = explode(".", $_FILES["category_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($_FILES['category_image']['tmp_name'], $image_upload . 'category_' . $renamefile);
				$category_image = 'category_' . $renamefile;
			}

			$statment = $connect->prepare("UPDATE categories SET category_id = :category_id, category_title = :category_title, category_slug = :category_slug, category_description = :category_description, category_seotitle = :category_seotitle, category_seodescription = :category_seodescription, category_featured = :category_featured, category_status = :category_status, category_image = :category_image WHERE category_id = :category_id");

			$statment->execute(array(
				':category_id' => $category_id,
				':category_title' => $category_title,
				':category_slug' => $slug,
				':category_description' => $category_description,
				':category_seotitle' => $category_seotitle,
				':category_seodescription' => $category_seodescription,
				':category_featured' => $category_featured,
				':category_status' => $category_status,
				':category_image' => $category_image
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_category = id_category($_GET['id']);

			$category = get_category_per_id($connect, $id_category);

			if (!$category){
				header('Location: ./home.php');
			}

			$category = $category['0'];

			require '../views/edit.category.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>