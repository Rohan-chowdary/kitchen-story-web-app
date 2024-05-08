<?php
 
require './app_core.php';

$json = file_get_contents('php://input');
 
$obj = json_decode($json, true);

$action = filter_var(strtolower($obj['action']), FILTER_SANITIZE_STRING);
$user_id = filter_var(strtolower($obj['user_id']), FILTER_SANITIZE_STRING);
$follower_id = filter_var(strtolower($obj['follower_id']), FILTER_SANITIZE_STRING);

    if (isset($action) && $action == 'follow') {

        $statement = $connect->prepare("SELECT * FROM followers WHERE user_id = :user_id AND follower_id = :follower_id");
        $statement->execute(array(':user_id' => $user_id, ':follower_id' => $follower_id));
        $result = $statement->fetch();

        if ($result == false) {

	        $statment = $connect->prepare("INSERT INTO followers (id,follower_id,user_id) VALUES (null, :follower_id, :user_id)");

	        $statment->execute(array(
	            ':follower_id' => $follower_id,
	            ':user_id' => $user_id
	        ));
    	}

		$validMSG = 'followed';
		 
		$validMSGJSon = json_encode($validMSG);
		 
		echo $validMSGJSon;

    }elseif(isset($action) && $action == 'unfollow') {

        $sentence = $connect->prepare("DELETE FROM followers WHERE follower_id = :follower_id AND user_id = :user_id");

        $sentence->execute(array(
            ':follower_id' => $follower_id,
            ':user_id' => $user_id
        ));

		$InvalidMSG = 'unfollowed';
		 
		$InvalidMSGJSon = json_encode($InvalidMSG);
		 
		echo $InvalidMSGJSon;

	}else{
	 
		$InvalidMSG = 'error';
		 
		$InvalidMSGJSon = json_encode($InvalidMSG);
		 
		echo $InvalidMSGJSon;
	 
	}
 
?>