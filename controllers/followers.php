<?php

include_once "../core.php";

if (isLogged()){

    if (isset($_GET['action']) && $_GET['action'] == 'followers') {

	$data = getUserFollowers($connect, $userInfo['user_id']);

	$results = array(
	    "sEcho" => 1,
	    "iTotalRecords" => count($data),
	    "iTotalDisplayRecords" => count($data),
	    "aaData"=>$data);
	echo json_encode($results);

	}elseif (isset($_GET['action']) && $_GET['action'] == 'following') {

	$data = getUserFollowing($connect, $userInfo['user_id']);

	$results = array(
	    "sEcho" => 1,
	    "iTotalRecords" => count($data),
	    "iTotalDisplayRecords" => count($data),
	    "aaData"=>$data);
	echo json_encode($results);


	}else{

		exit();
	}

}else{

	exit();
}


?>
