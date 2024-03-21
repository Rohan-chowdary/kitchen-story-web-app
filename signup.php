<?php

require './core.php';

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], $translation['tr_signuppage']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3']);

$errors = array();
$validateEmail = true;
$validateName = true;
$validatePassword = true;
$validateChecked = true;

$fullHeight = true;


if (isLogged())
{

    header('Location: '. $urlPath->home());

}else{

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

       


           

            if ($validateName && $validatePassword && $validateEmail && $validateChecked) 
            {
            
                try{        
            
                    $connect;
            
                }catch (PDOException $e){
                    $errors[] = $e->getMessage();   
                }

                $statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email LIMIT 1");
                $statement->execute(array(':user_email' => $_POST['user_email']));
                $result = $statement->fetch();

                if ($result != false) {
            
                    $errors[] = $translation['tr_165'];
        
                }
            }

            $user_password = filter_var($_POST["user_password"], FILTER_SANITIZE_STRING);


            if (empty($errors)) {

                $statement = $connect->prepare("INSERT INTO users (user_id, user_name, user_email, user_password) VALUES (null, :user_name, :user_email, :user_password)");
                $statement->execute(array(
                    ':user_name' => $_POST['user_name'],
                    ':user_email' => $_POST['user_email'],
                    ':user_password' => hash('sha512', $user_password)
                ));

                $userInfo = getUserInfo($connect, $user_email);

                $array_content = array("{LOGO_URL}" => $urlPath->image($theme['th_logo']),
                            "{SITE_DOMAIN}" => $urlPath->home(), 
                            "{SITE_NAME}" => $translation['tr_1'], 
                            "{USER_NAME}" => $userInfo['user_name'], 
                            "{USER_EMAIL}" => $userInfo['user_email'], 
                            "{TERMS_URL}" => $urlPath->terms(), 
                            "{PRIVACY_URL}" => $urlPath->privacy(),
                            "{SIGNIN_URL}" => $urlPath->signin()
                                );

                $emailTemplate = getEmailTemplate($connect, '1');

                if ($emailTemplate) {

                    $emailContent = json_decode($emailTemplate['email_content'],true);

                    $mail = sendMail($array_content, $emailContent[0]['message'], $user_email, $emailTemplate['email_fromname'], $emailContent[0]['subject'], $emailTemplate['email_plaintext']);
                }

                header('Location: '. $urlPath->signin());

            }
        // }
    }
}

require './header.php';
require './views/signup.view.php';
require './footer.php';

?>