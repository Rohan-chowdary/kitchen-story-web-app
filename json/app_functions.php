<?php

use voku\helper\AntiXSS;

require_once __DIR__ . '../../classes/anti-xss/autoload.php';
require_once __DIR__ . '../../classes/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '../../classes/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '../../classes/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function connect(){

    global $database;

    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function getImage($src){

    return SITE_URL.'/images/'.$src;
}

function getSettings($connect){
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getStrings($connect){
    
    $sentence = $connect->prepare("SELECT * FROM translations"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getDefaultPage($connect, $page){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = '".$page."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    
    if ($row) {
        return $row;
    }else{
        return null;
    }

}

function maskEmail($email){

    $mail_parts = explode('@', $email);
    $username = '@'.$mail_parts[0];
    $len = strlen($username);

    return $username;
}

function isUserVerified($userEmail){

    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = '".$userEmail."' AND user_verified = 1 LIMIT 1"); 
    $sentence->execute();
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }
    
}

function countFormat($num) {

      if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;
    }

  return $num;
}

function formatHTML($content){

    $content = str_replace(array("\n","\r","\t"),'', $content);
    $content = str_replace("</h1>", "</h3><br />", $content);
    $content = str_replace("</h2>", "</h3><br />", $content);
    $content = str_replace("</h3>", "</h3><br />", $content);
    $content = str_replace("</h4>", "</h3><br />", $content);
    $content = str_replace("</h5>", "</h3><br />", $content);
    $content = str_replace("</h6>", "</h3><br />", $content);
    return $content;
    
}

function formatDate($date){

    $sentence = connect()->prepare("SELECT st_dateformat FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $newDate = date($row['st_dateformat'], strtotime($date));
    return $newDate;
}

function clearGetData($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function getParamsQuery(){
    
    return isset($_GET['query']) && !empty($_GET['query']) && $_GET['query'] ? clearGetData($_GET['query']) : NULL;
}

function getParamsCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getParamsFeatured(){
    
    return isset($_GET['featured']) && !empty($_GET['featured']) && $_GET['featured'] ? clearGetData($_GET['featured']) : NULL;
}

function getParamsAuthor(){
    
    return isset($_GET['author']) && !empty($_GET['author']) && $_GET['author'] ? clearGetData($_GET['author']) : NULL;
}

function getParamsUserID(){
    
    return isset($_GET['user']) && !empty($_GET['user']) ? clearGetData($_GET['user']) : NULL;
}

function getParamsItemID(){
    
    return isset($_GET['item']) && !empty($_GET['item']) ? clearGetData($_GET['item']) : NULL;
}

function getParamsFollowerID(){
    
    return isset($_GET['follower']) && !empty($_GET['follower']) ? clearGetData($_GET['follower']) : NULL;
}

function getParamsID(){
    
    return isset($_GET['id']) && !empty($_GET['id']) ? clearGetData($_GET['id']) : NULL;
}

function getParamsSort(){
    
    return isset($_GET['sortby']) && !empty($_GET['sortby']) && $_GET['sortby'] !== 'undefined' ? clearGetData($_GET['sortby']) : NULL;
}

function getEmailTemplate($connect, $id){

    if (!empty($id) && (int)($id)) {

        $q = $connect->query("SELECT * FROM emailtemplates WHERE email_id = ".$id." LIMIT 1");
        $f = $q->fetch();
        $result = $f;

        if ($result['email_disabled'] == 1) {
            return null;
        }else{
            return $result;
        }
    }else{

        return null;
    }  

}

function sendMail($array_content, $email_content, $destinationmail, $fromName, $subject, $isHtml, $replyToName = NULL, $replyToAddress = NULL) {
    
    $sentence = connect()->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    $settings = $sentence->fetch();
    
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                          
        $mail->Host       = $settings['st_smtphost'];                
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $settings['st_smtpemail'];              
        $mail->Password   = $settings['st_smtppassword'];                             
        $mail->SMTPSecure = $settings['st_smtpencrypt'];
        $mail->Port       = $settings['st_smtpport'];

        if (isset($replyToAddress, $replyToName) && !empty($replyToAddress) && !empty($replyToName)) {
            $mail->addReplyTo($replyToAddress, $replyToName);
        }

        $mail->setFrom($settings['st_smtpemail'], $fromName);
        $mail->CharSet = "UTF-8";
        $mail->AddAddress($destinationmail); 
        $mail->isHTML($isHtml);

        $find = array_keys($array_content);
        $replace = array_values($array_content);

        $mailcontent = str_replace($find, $replace, $email_content);
        $mailsubject = str_replace($find, $replace, $subject);

        $mail->Subject = $mailsubject;
        $mail->Body = $mailcontent;
        if (!$mail->send()){

            $result = $mail->ErrorInfo;
            
        }else{

            $result = TRUE;
        }

        return $result;

    } catch (Exception $e) {
     return null;
    }

} 

?>