<?php 

require '../core.php';

if (!isLogged()){

    exit();

}else{

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_GET['action']) && $_GET['action'] == 'follow') {

        $follower_id = clearGetData($_POST['follower']);
        $user_id = clearGetData($_POST['user']);

        if ($follower_id != $user_id) {

                $statement = $connect->prepare("SELECT * FROM followers WHERE user_id = :user_id AND follower_id = :follower_id");
                $statement->execute(array(':user_id' => $user_id, ':follower_id' => $follower_id));
                $result = $statement->fetch();

                if ($result == false) {

                $statment = $connect->prepare("INSERT INTO followers (id,follower_id,user_id) VALUES (null, :follower_id, :user_id)");

                $statment->execute(array(
                    ':follower_id' => $follower_id,
                    ':user_id' => $user_id
                ));

                }else{
                    exit();
                }

        }else{
                    exit();
                }


    }

    elseif(isset($_GET['action']) && $_GET['action'] == 'unfollow') {

        $follower_id = clearGetData($_POST['follower']);
        $user_id = clearGetData($_POST['user']);

        if ($follower_id != $user_id) {

        $sentence = $connect->prepare("DELETE FROM followers WHERE follower_id = :follower_id AND user_id = :user_id");

        $sentence->execute(array(
            ':follower_id' => $follower_id,
            ':user_id' => $user_id
        ));

    }else{
        exit();
    }


    }
}

}


?>