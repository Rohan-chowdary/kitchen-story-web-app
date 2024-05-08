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


	$sqlQuery = "SELECT users.*, (SELECT COUNT(*) FROM likes WHERE likes.user = users.user_id) AS total_likes, (SELECT COUNT(*) FROM recipes WHERE recipes.recipe_author = users.user_id AND recipes.recipe_status = 1) AS total_recipes, (SELECT COUNT(*) FROM followers WHERE followers.user_id = users.user_id) AS total_following, (SELECT COUNT(*) FROM followers WHERE followers.follower_id = users.user_id ) AS total_followers FROM users WHERE user_status = 1";

	if(getParamsID()){

		$sqlQuery .= " AND users.user_id = '".getParamsID()."'";
	}

	if(getParamsQuery()){

        $sqlQuery .= " AND users.user_name LIKE '%".getParamsQuery()."%'";
	}

    if (getParamsSort()) {

        if (getParamsSort() == 'best-rated') {

            $sqlQuery .= " ORDER BY total_likes DESC";
        }

    }elseif(!isset($_GET['sortby']) || empty($_GET['sortby'])) {

        $sqlQuery .= " ORDER BY total_likes DESC";
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

		$id = $row['user_id'];
		$name = $row['user_name'];
		$description = $row['user_description'];
		$avatar = $row['user_avatar'];
		$verified = $row['user_verified'];
		$created = $row['user_created'];
		$username = maskEmail($row['user_email']);
		$total_likes = $row['total_likes'];
		$total_recipes = $row['total_recipes'];
		$total_recipes = $row['total_recipes'];
		$total_following = $row['total_following'];
		$total_followers = $row['total_followers'];

		$data[] = array(
			'id'=> $id,
			'name'=> html_entity_decode($name),
			'description'=> html_entity_decode($description),
			'avatar'=> getImage($avatar),
			'verified'=> $verified,
			'created'=> $created,
			'username'=> $username,
			'total_likes'=> countFormat($total_likes),
			'total_recipes'=> countFormat($total_recipes),
			'total_following'=> countFormat($total_following),
			'total_followers'=> countFormat($total_followers),
		);
	}

	print json_encode($data, JSON_NUMERIC_CHECK);

?>