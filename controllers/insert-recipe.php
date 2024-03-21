<?php

require '../core.php';
require_once __DIR__ . '/../classes/slugify.php';

if (!isLogged()){

    exit();

}else{

if ($_POST){

    $array = array(
        'recipeTitle' => '',
        'recipeDescription' => '',
        'recipeServs' => '',
        'recipeTime' => '',
        'recipeIngred' => '',
        'recipeInstru' => '',
        'recipeImage' => '',
        'isChecked' => '',
        'error' => '',
        'success' => ''
    );

	$recipeTitle = clearGetData($_POST["title"]);
	$recipeDescription = clearGetData($_POST["description"]);
	$recipeServs = clearGetData($_POST["servings"]);
    $recipeTime = clearGetData($_POST['time']);
    $recipeIngred = clearGetData($_POST['ingredients']);
    $recipeInstru = clearGetData($_POST['instructions']);
    $recipeStatus = 3; // 3 = Pending
    $recipeAuthor = $userInfo['user_id']; // Current User
    $recipeImage = $_FILES["image"]["name"];

    $converted_slug = convertSlug($recipeTitle);
    $exists = getRecipeSlug($connect, $converted_slug);

    if ($exists > 0){
        $new_number = $exists + 1;
        $recipeSlug = $converted_slug."-".$new_number;

    }else{

        $recipeSlug = $converted_slug;
    }

    if (isset($_POST['ischecked'])) {
        $isChecked = true;
    }else{
        $isChecked = false;
    }

        if (empty($recipeTitle)) {

            $array['recipeTitle'] = $translation['tr_191'];
        }

        if (empty($recipeDescription)) {

            $array['recipeDescription'] = $translation['tr_191'];
        }

        if (empty($recipeTime)) {
            $array['recipeTime'] = $translation['tr_191'];
        }

        if (empty($recipeServs)) {
            $array['recipeServs'] = $translation['tr_191'];
        }

        if (empty($recipeIngred)) {

            $array['recipeIngred'] = $translation['tr_191'];
        }

        if (empty($recipeInstru)) {

            $array['recipeInstru'] = $translation['tr_191'];
        }

        if (empty($recipeImage)) {

            $array['recipeImage'] = $translation['tr_191'];

        }else{

            // File path config 
            $fileName = explode(".", $recipeImage);
            $renamefile = round(microtime(true)) . '.' . end($fileName);
            $targetFilePath = '../images/' . 'recipe_' . $renamefile;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $maxsize = 2097152; 
            $fileInfo = getimagesize($_FILES["image"]["tmp_name"]);
            $width = $fileInfo[0];
            $height = $fileInfo[1];
             
            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg'); 
            if(!in_array($fileType, $allowTypes)){ 

                $array['recipeImage'] = $translation['tr_192']; 
            } 
            
            if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                $array['recipeImage'] = $translation['tr_193'];
            }

            if($width > "900") {
                $array['recipeImage'] = $translation['tr_194'];
            }

            if($height < "350" || $width < "500") {
                $array['recipeImage'] = $translation['tr_195'];
            }

        }

        if ($isChecked != 'true') {
            $array['isChecked'] = 'error';
        }

        $filterArray = array_filter($array);

        if (count($filterArray) != 0) {

            $array['error'] = $translation['tr_168'];
            echo json_encode($array);

        }else{

        $statement = $connect->prepare("SELECT COUNT(*) AS total FROM recipes WHERE recipe_author = :recipe_author AND recipe_status = 3");
        $statement->execute(array(
          ':recipe_author' => $recipeAuthor
        ));
          
        $results = $statement->fetch();
        $total = $results['total'];
          
        if($total < '3'){

            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $uploadedFile = $renamefile;

            $statment = $connect->prepare("INSERT INTO recipes (recipe_id, recipe_title, recipe_slug, recipe_description, recipe_ingredients, recipe_instructions, recipe_status, recipe_author, recipe_time, recipe_servings, recipe_created, recipe_image) VALUES (null, :recipe_title, :recipe_slug, :recipe_description, :recipe_ingredients, :recipe_instructions, :recipe_status, :recipe_author, :recipe_time, :recipe_servings, CURRENT_TIMESTAMP, :recipe_image)");

            $statment->execute(array(
                ':recipe_title' => $recipeTitle,
                ':recipe_slug' => $recipeSlug,
                ':recipe_description' => $recipeDescription,
                ':recipe_ingredients' => $recipeIngred,
                ':recipe_instructions' => $recipeInstru,
                ':recipe_status' => $recipeStatus,
                ':recipe_author' => $recipeAuthor,
                ':recipe_time' => $recipeTime,
                ':recipe_servings' => $recipeServs,
                ':recipe_image' => 'recipe_' . $uploadedFile
            ));

        $array['success'] = $translation['tr_197'];
        echo json_encode($array);
             
        }else{
                 
        $array['error'] = $translation['tr_198'];
            echo json_encode($array);
        }

    }

}else{

    exit();
}

}


?>