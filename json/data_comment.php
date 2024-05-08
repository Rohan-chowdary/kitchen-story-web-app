<?php
 
require './app_core.php';

$json = file_get_contents('php://input');
 
$obj = json_decode($json, true);

$action = filter_var(strtolower($obj['action']), FILTER_SANITIZE_STRING);
$comment_item = filter_var(strtolower($obj['comment_item']), FILTER_SANITIZE_STRING);
$comment_user = filter_var(strtolower($obj['comment_user']), FILTER_SANITIZE_STRING);
$comment_text = clearGetData($obj['comment_text']);
$comment_id = filter_var(strtolower($obj['comment_id']), FILTER_SANITIZE_STRING);
$date = date("Y-m-d H:i:s");

    if (isset($action) && $action == 'comment') {

    	if (!empty($comment_item) && !empty($comment_user) && !empty($comment_text)) {

	        $statment = $connect->prepare("INSERT INTO comments (item_id, user_id, body, created_at, updated_at) VALUES (:item_id, :user_id, :body, :created_at, null)");

	        $statment->execute(array(
	            ':item_id' => $comment_item,
	            ':user_id' => $comment_user,
	            ':body' => $comment_text,
	            ':created_at' => $date
	        ));

			$validMSG = 'submitted';
			 
			$validMSGJSon = json_encode($validMSG);
			 
			echo $validMSGJSon;

    	}

    }elseif(isset($action) && $action == 'reply') {

    	if (!empty($comment_id) && !empty($comment_user) && !empty($comment_text)) {

	        $statment = $connect->prepare("INSERT INTO replies (user_id, comment_id, body, created_at, updated_at) VALUES (:user_id, :comment_id, :body, :created_at, null)");

	        $statment->execute(array(
	            ':user_id' => $comment_user,
	            ':comment_id' => $comment_id,
	            ':body' => $comment_text,
	            ':created_at' => $date
	        ));

			$validMSG = 'submitted';
			 
			$validMSGJSon = json_encode($validMSG);
			 
			echo $validMSGJSon;

    	}

	}else{
	 
		$InvalidMSG = 'error';
		 
		$InvalidMSGJSon = json_encode($InvalidMSG);
		 
		echo $InvalidMSGJSon;
	 
	}
 
?>