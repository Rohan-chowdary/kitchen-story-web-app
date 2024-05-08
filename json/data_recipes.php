<?php

$page = 1;
if(!empty($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if(false === $page) {
        $page = 1;
    }
}

$limit = 10;
if(!empty($_GET['limit'])) {
    $limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);
}

$offset = ($page - 1) * $limit;

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require './app_core.php';


	$sqlQuery = "SELECT recipes.*, categories.category_title AS category_title, categories.category_id, difficulties.difficult_id, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes, (SELECT COUNT(*) FROM comments WHERE recipes.recipe_id = comments.item_id) AS total_comments FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipe_status = 1";

	if(getParamsID()){

		$sqlQuery .= " AND recipes.recipe_id = '".getParamsID()."'";
	}

	if(getParamsCategory()){

        $sqlQuery .= " AND categories.category_id = '".getParamsCategory()."'";
	}

	if(getParamsAuthor()){

        $sqlQuery .= " AND recipes.recipe_author = '".getParamsAuthor()."'";
	}

	if(getParamsFeatured()){

        $sqlQuery .= " AND recipes.recipe_featured = '".getParamsFeatured()."'";
	}

	if(getParamsQuery()){

        $sqlQuery .= " AND recipes.recipe_title LIKE '%".getParamsQuery()."%' OR recipes.recipe_ingredients LIKE '%".getParamsQuery()."%' OR categories.category_title LIKE '%".getParamsQuery()."%'";
	}

    if (getParamsSort()) {

        if(getParamsSort() == 'default') {

            $sqlQuery .= " ORDER BY recipes.recipe_id DESC";

        }elseif(getParamsSort() == 'date-asc') {

            $sqlQuery .= " ORDER BY recipes.recipe_created ASC";

        }elseif (getParamsSort() == 'date-desc') {

            $sqlQuery .= " ORDER BY recipes.recipe_created DESC";

        }elseif (getParamsSort() == 'best-rated') {

            $sqlQuery .= " ORDER BY total_likes DESC";
        }

    }elseif(!isset($_GET['sortby']) || empty($_GET['sortby'])) {

        $sqlQuery .= " ORDER BY recipes.recipe_created DESC";
    }


    if(isset($_GET['page']) && !empty($_GET['page'])) {
        $sqlQuery .= " LIMIT ".$offset.",".$limit;
    }

    if(isset($_GET['limit']) && !empty($_GET['limit']) && !isset($_GET['page'])) {
        $sqlQuery .= " LIMIT ".$limit;
    }
    
    $sentence = $connect->prepare($sqlQuery);

    $sentence->execute();

    $qResults = $sentence->fetchAll(PDO::FETCH_ASSOC);

	$data = array();

	foreach ($qResults as $row) {

		$id = $row['recipe_id'];
		$title = $row['recipe_title'];
		$description = $row['recipe_description'];
		$ingredients = explode(',', $row["recipe_ingredients"]);
		$instructions = explode(',', $row["recipe_instructions"]);
		$image = $row['recipe_image'];
		$time = $row['recipe_time'];
		$author = $row['author_name'];
		$author_id = $row['recipe_author'];
		$servings = $row['recipe_servings'];
		$category = $row['category_title'];
		$category_id = $row['category_id'];
		$difficult = $row['difficult_title'];
		$video = $row['recipe_video'];
		$difficult_id = $row['difficult_id'];
		$date = $row['recipe_created'];
		$total_likes = $row['total_likes'];
        $total_comments = $row['total_comments'];
		$kcal = $row['recipe_kcal'];
		$fat = $row['recipe_fat'];
		$protein = $row['recipe_protein'];
		$carbs = $row['recipe_carbs'];

		$data[] = array(
			'id'=> $id,
			'title'=> html_entity_decode($title),
			'ingredients'=> $ingredients,
			'instructions'=> $instructions,
			'description'=> html_entity_decode($description),
			'image'=> getImage($image),
			'time'=> html_entity_decode($time),
			'servings'=> html_entity_decode($servings),
			'author'=> html_entity_decode($author),
			'author_id'=> html_entity_decode($author_id),
			'category'=> html_entity_decode($category),
			'category_id'=> $category_id,
			'difficult'=> html_entity_decode($difficult),
			'video'=> html_entity_decode($video),
			'difficult_id'=> $difficult_id,
			'date'=> formatDate($date),
			'total_likes'=> countFormat($total_likes),
			'total_comments'=> countFormat($total_comments),
			'kcal'=> html_entity_decode($kcal),
			'fat'=> html_entity_decode($fat),
			'protein'=> html_entity_decode($protein),
			'carbs'=> html_entity_decode($carbs),
		);
	}

	print json_encode($data, JSON_NUMERIC_CHECK);

?>