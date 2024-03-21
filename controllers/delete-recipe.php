<?php 

require '../core.php';

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (!isLogged()){

		exit();

	}else{

		$itemId = clearGetData($_POST['item']);
		$userId = clearGetData($_POST['user']);

		$userInfo = getUserInfo($connect);

		if ($userInfo['user_id'] === $userId) {

			try{        

				$connect;

			}catch (PDOException $e){
				$errors[] = $e->getMessage();   
			}

			$statement = $connect->prepare("SELECT recipe_id, user_id FROM recipes, users WHERE recipe_id = :recipe_id AND user_id = :user_id LIMIT 1");
			$statement->execute(array(':recipe_id' => $itemId, ':user_id' => $userId));
			$result = $statement->fetch();

			if ($result != false) {
				
		    $statment = $connect->prepare("UPDATE recipes SET recipe_status = 2 WHERE recipe_id = :recipe_id");

		    $statment->execute(array(
		        ':recipe_id' => $itemId
		    ));

			echo "deleted";

			}else{

				exit();

			}

		}else{
				exit();
		}

	}

}else{

	exit();
}



?>