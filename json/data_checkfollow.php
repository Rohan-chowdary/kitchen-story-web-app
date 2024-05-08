<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
 
require './app_core.php';

$user_id = getParamsUserID();
$follower_id = getParamsFollowerID();

if ($user_id && $follower_id) {

	$Sql_Query = "SELECT * FROM followers WHERE user_id = '".$user_id."' AND follower_id = '".$follower_id."' LIMIT 1";

	$sentence = $connect->prepare($Sql_Query);

	$sentence->execute();

	$qResults = $sentence->fetch();

	if($qResults){

		$validMSG = 'true';
		 
		$validMSGJSon = json_encode($validMSG);
		 
		echo $validMSGJSon;

	}else{
	 
		$InvalidMSG = 'false';
		 
		$InvalidMSGJSon = json_encode($InvalidMSG);
		 
		echo $InvalidMSGJSon;
	 
	}

}

 
?>