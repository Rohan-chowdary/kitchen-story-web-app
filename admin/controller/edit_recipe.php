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
		header('Location: ./recipes.php');
	}

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$recipe_id = cleardata($_POST['recipe_id']);
			$recipe_title = cleardata($_POST['recipe_title']);
			$recipe_seotitle = cleardata($_POST['recipe_seotitle']);
			$recipe_description = cleardata($_POST['recipe_description']);
			$recipe_seodescription = cleardata($_POST['recipe_seodescription']);
			$recipe_ingredients = implode(",", cleardata($_POST['recipe_ingredients']));
			$recipe_instructions = implode(",", cleardata($_POST['recipe_instructions']));
			$recipe_category = cleardata($_POST['recipe_category']);
			$recipe_difficult = cleardata($_POST['recipe_difficult']);
			$recipe_status = cleardata($_POST['recipe_status']);
			$recipe_author = cleardata($_POST['recipe_author']);
			$recipe_time = cleardata($_POST['recipe_time']);
			$recipe_servings = cleardata($_POST['recipe_servings']);
			$recipe_video = cleardata($_POST['recipe_video']);
			$recipe_featured = cleardata($_POST['recipe_featured']);
			$recipe_carbs = cleardata($_POST['recipe_carbs']);
			$recipe_protein = cleardata($_POST['recipe_protein']);
			$recipe_fat = cleardata($_POST['recipe_fat']);
			$recipe_kcal = cleardata($_POST['recipe_kcal']);
			$recipe_facts = cleardata($_POST['recipe_facts']);

			$recipe_slug = cleardata($_POST['recipe_slug']);

			if (empty($recipe_slug)) {
				$slug = $_POST['recipe_slug_save'];
			}else{

				$converted_slug = convertSlug($_POST['recipe_slug']);
				$exists = get_recipe_slug($connect, $converted_slug);

				if ($exists > 0)
				{
					$new_number = $exists + 1;
					$slug = $converted_slug."-".$new_number;

				}else{

					$slug = $converted_slug;
				}
			}

			$imagefile = explode(".", $_FILES["recipe_image"]["name"]);

			$image_save = $_POST['recipe_image_save'];
			$recipe_image = $_FILES['recipe_image'];

			if (empty($recipe_image['name'])) {
				$recipe_image = $image_save;
			} else{
				$imagefile = explode(".", $_FILES["recipe_image"]["name"]);
				$renamefile = round(microtime(true)) . '.' . end($imagefile);
				$image_upload = '../../images/';
				move_uploaded_file($_FILES['recipe_image']['tmp_name'], $image_upload . 'recipe_' . $renamefile);
				$recipe_image = 'recipe_' . $renamefile;
			}

			$statment = $connect->prepare("UPDATE recipes SET recipe_id = :recipe_id, recipe_title = :recipe_title, recipe_seotitle = :recipe_seotitle, recipe_slug = :recipe_slug, recipe_description = :recipe_description, recipe_seodescription = :recipe_seodescription, recipe_ingredients = :recipe_ingredients, recipe_instructions = :recipe_instructions, recipe_category = :recipe_category, recipe_difficult = :recipe_difficult, recipe_time = :recipe_time, recipe_servings = :recipe_servings, recipe_video = :recipe_video, recipe_featured = :recipe_featured, recipe_carbs = :recipe_carbs, recipe_protein = :recipe_protein, recipe_fat = :recipe_fat, recipe_kcal = :recipe_kcal, recipe_facts = :recipe_facts, recipe_status = :recipe_status, recipe_image = :recipe_image WHERE recipe_id = :recipe_id");

			$statment->execute(array(
				':recipe_id' => $recipe_id,
				':recipe_title' => $recipe_title,
				':recipe_seotitle' => $recipe_seotitle,
				':recipe_slug' => $slug,
				':recipe_description' => $recipe_description,
				':recipe_seodescription' => $recipe_seodescription,
				':recipe_ingredients' => $recipe_ingredients,
				':recipe_instructions' => $recipe_instructions,
				':recipe_category' => $recipe_category,
				':recipe_difficult' => $recipe_difficult,
				':recipe_status' => $recipe_status,
				':recipe_time' => $recipe_time,
				':recipe_servings' => $recipe_servings,
				':recipe_video' => $recipe_video,
				':recipe_featured' => $recipe_featured,
				':recipe_carbs' => $recipe_carbs,
				':recipe_protein' => $recipe_protein,
				':recipe_fat' => $recipe_fat,
				':recipe_kcal' => $recipe_kcal,
				':recipe_facts' => $recipe_facts,
				':recipe_image' => $recipe_image
			));

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{

			$id_recipe = id_recipe($_GET['id']);

			$recipe = get_recipe_per_id($connect, $id_recipe);

			if (!$recipe){
				header('Location: ./home.php');
			}

			$recipe = $recipe['0'];

			$difficulties = get_all_difficulties($connect);
			$categories = get_all_categories($connect);

			require '../views/edit.recipe.view.php';
		}
		
} else {

		header('Location:'.SITE_URL);
	}

	require '../views/footer.view.php';

} else {
	header('Location: ./login.php');		
}


?>