<?php

/*--------------------*/
// Description: Realfood - Recipes Php Script
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

if(!isset($_SESSION)) { 
    session_start(); 
}

require_once __DIR__ . '/lang/languages.php';
require_once __DIR__ . '/../classes/anti-xss/autoload.php';
require_once __DIR__ . '/../classes/slugify.php';
require_once __DIR__ . '/../classes/anti-xss/autoload.php';
require_once __DIR__ . '/../classes/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/../classes/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../classes/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Ausi\SlugGenerator\SlugGenerator;
use voku\helper\AntiXSS;

function connect($database){
    try{
        $connect = new PDO('mysql:host='. $database['host'] .';dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function check_access($connect){
    $sentence = $connect->query("SELECT * FROM users WHERE user_email = '".$_SESSION['user_email']."' AND user_status = 1 LIMIT 1");
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function isAdmin($connect){

    if (isset($_SESSION['user_email'])) {

        $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);

        $sentence = $connect->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' AND user_status = 1 AND user_role = 1 LIMIT 1"); 
        $sentence->execute();
        $row = $sentence->fetch();

        if ($row) {

            return true;

        }else{

            return false;
        }

    }else{
        return false;
    }

}

function isAgent($connect){

    if (isset($_SESSION['user_email'])) {

        $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);

        $sentence = $connect->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' AND user_status = 1 AND user_role = 2 LIMIT 1"); 
        $sentence->execute();
        $row = $sentence->fetch();

        if ($row) {

            return true;

        }else{

            return false;
        }

    }else{
        return false;
    }

}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');

    if (empty($data)) {
        return "-";
    }else{
        return $data;
    }

}

function cleardata($data){
    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function get_user_information($connect){
    $sentence = $connect->query("SELECT * FROM users WHERE user_email = '".$_SESSION['user_email']."' LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function currentPage(){

    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function goToPage($parameter, $value) { 
    $params = array(); 
    $output = "?"; 
    $firstRun = true; 
    foreach($_GET as $key=>$val) { 
        if($key != $parameter) { 
            if(!$firstRun) { 
                $output .= "&"; 
            } else { 
                $firstRun = false; 
            } 
            $output .= $key."=".urlencode($val); 
        } 
    } 

    if(!$firstRun) 
        $output .= "&"; 
    $output .= $parameter."=".urlencode($value); 
    return htmlentities($output); 
} 

// MENUS ---------------------------------------

function get_all_menus($connect){

    $sentence = $connect->prepare("SELECT * FROM menus"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_menu($id_menu){
    return (int)cleardata($id_menu);
}

function get_menu_per_id($connect, $id_menu){
    $sentence = $connect->query("SELECT * FROM menus WHERE menu_id = $id_menu LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_navigations($connect){

    $sentence = $connect->prepare("SELECT * FROM navigations ORDER BY navigation_order ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_navigations_by_menu($connect, $id_menu){

    $sentence = $connect->prepare("SELECT navigations.navigation_id, COALESCE(pages.page_slug, navigations.navigation_url) AS navigation_url, COALESCE(pages.page_title, navigations.navigation_label) AS navigation_label, navigations.navigation_type FROM navigations LEFT JOIN pages ON page_id = navigations.navigation_page WHERE navigation_menu = '".$id_menu."' ORDER BY navigation_order ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

// COMMENTS ---------------------------------------

function get_all_comments($connect){

    $sentence = $connect->prepare("(SELECT comments.id as rid, comments.body as body, comments.created_at as created, 'comment' as rtype, users.user_name AS user_name, users.user_id AS user_id FROM comments LEFT JOIN users ON users.user_id = comments.user_id) UNION (SELECT replies.id as rid, replies.body as body, replies.created_at as created, 'reply' as rtype, users.user_name AS user_name, users.user_id AS user_id FROM replies LEFT JOIN users ON users.user_id = replies.user_id) ORDER BY created DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

// PAGES ---------------------------------------

function is_default_page($connect, $page_id){

    $sentence = $connect->prepare("SELECT * FROM settings WHERE '".$page_id."' IN (SELECT st_defaultsearchpage FROM settings) OR '".$page_id."' IN (SELECT st_defaultprivacypage FROM settings) OR '".$page_id."' IN (SELECT st_defaulttermspage FROM settings)"); 
    $sentence->execute();
    $sentence->fetchAll();
    $exist = $sentence->rowCount();

    if ($exist > 0) {
        return true;
    }else{
        return false;
    }
}

function getSocialMedia($connect){
    
    $sentence = $connect->prepare("SELECT st_facebook,st_twitter,st_youtube,st_instagram,st_linkedin,st_whatsapp FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_page_slug($connect, $slug){

    $sentence = $connect->prepare("SELECT COUNT(*) AS total FROM pages WHERE page_slug LIKE '$slug%'");
    $sentence->execute();
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row['total'];
}

function get_pages_by_template($connect, $type){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_template = '".$type."'"); 
    $sentence->execute();
    $row = $sentence->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function totalPages($connect, $items_per_page){

    $total_items = $connect->prepare("SELECT COUNT(*) AS total FROM pages");
    $total_items->execute();
    $total_items = $total_items->fetch()['total'];

    $number_pages = ceil($total_items / $items_per_page);
    return $number_pages;
}

function get_all_pages($connect){

    $sql = "SELECT * FROM pages"; 
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function id_page($id_page){
    return (int)cleardata($id_page);
}

function get_page_per_id($connect, $id_page){
    $sentence = $connect->query("SELECT pages.* FROM pages WHERE page_id = $id_page LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function pages_total($connect){

    $total_numbers = $connect->prepare("SELECT * FROM pages");
    $total_numbers->execute(array());
    $total_numbers->fetchAll();
    $total = $total_numbers->rowCount();
    return $total;
}

// CATEGORIES  ---------------------------------------

function totalCategories($connect, $items_per_page){

    $total_items = $connect->prepare("SELECT COUNT(*) AS total FROM categories");
    $total_items->execute();
    $total_items = $total_items->fetch()['total'];

    $number_pages = ceil($total_items / $items_per_page);
    return $number_pages;
}

function get_all_categories($connect)
{

    $sql = "SELECT * FROM categories ORDER BY category_id DESC";
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_category){
    return (int)cleardata($id_category);
}

function get_category_slug($connect, $slug){

    $sentence = $connect->prepare("SELECT COUNT(*) AS total FROM categories WHERE category_slug LIKE '$slug%'");
    $sentence->execute();
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row['total'];
}

function get_category_per_id($connect, $id_category){
    $sentence = $connect->query("SELECT * FROM categories WHERE category_id = $id_category LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

// DIFFICULTIES  ---------------------------------------

function get_all_difficulties($connect){

    $sql = "SELECT * FROM difficulties ORDER BY difficult_id ASC";
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_difficult($id_difficult){
    return (int)cleardata($id_difficult);
}

function get_difficult_per_id($connect, $id_difficult){
    $sentence = $connect->query("SELECT * FROM difficulties WHERE difficult_id = $id_difficult LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

// RECIPES  ---------------------------------------

function get_latest_recipes($connect){

    $sql = "SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id ORDER BY recipes.recipe_created DESC LIMIT 5";
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_recipes($connect){

    $sql = "SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id ORDER BY recipes.recipe_created DESC";
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_recipes_by_user($connect, $user){

    $sql = "SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id WHERE recipes.recipe_author = $user";
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_recipe_slug($connect, $slug){

    $sentence = $connect->prepare("SELECT COUNT(*) AS total FROM recipes WHERE recipe_slug LIKE '$slug%'");
    $sentence->execute();
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row['total'];
}

function id_recipe($id_recipe){
    return (int)cleardata($id_recipe);
}

function get_recipe_per_id($connect, $id_recipe){
    $sentence = $connect->query("SELECT recipes.*, categories.category_title AS category_title, users.user_name AS author_name FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN users ON recipe_author = users.user_id WHERE recipes.recipe_id = $id_recipe LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function recipes_total($connect){

    $total_numbers = $connect->prepare('SELECT * FROM recipes');
    $total_numbers->execute(array());
    $total_numbers->fetchAll();
    $total = $total_numbers->rowCount();
    return $total;
}

function total_recipes_by_user($connect, $user){

    $total_numbers = $connect->prepare("SELECT * FROM recipes WHERE recipe_author = $user");
    $total_numbers->execute(array());
    $total_numbers->fetchAll();
    $total = $total_numbers->rowCount();
    return $total;
}

// ADS ---------------------------------------

function get_all_ads($connect){

    $sentence = $connect->prepare("SELECT * FROM ads"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_ad($id_ad){
    return (int)cleardata($id_ad);
}

function get_ad_per_id($connect, $id_ad){
    $sentence = $connect->query("SELECT * FROM ads WHERE ad_id = $id_ad LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

// USERS ---------------------------------------

function get_active_users($connect)
{

    $sentence = $connect->prepare("SELECT * FROM users WHERE user_status = 1 ORDER BY user_id ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function totalUsers($connect, $items_per_page){

    $total_items = $connect->prepare("SELECT COUNT(*) AS total FROM users");
    $total_items->execute();
    $total_items = $total_items->fetch()['total'];

    $number_pages = ceil($total_items / $items_per_page);
    return $number_pages;
}

function get_all_users($connect){

    $sentence = $connect->prepare("SELECT users.*,roles.role_name AS role_name FROM users,roles WHERE users.user_role = roles.role_id ORDER BY users.user_created DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_user($id_user){
    return (int)cleardata($id_user);
}

function get_user_per_id($connect, $id_user){
    $sentence = $connect->query("SELECT users.*,roles.role_name AS role_name FROM users,roles WHERE users.user_role = roles.role_id AND users.user_id = $id_user LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function users_total($connect){

    $total_numbers = $connect->prepare('SELECT * FROM users');
    $total_numbers->execute(array());
    $total_numbers->fetchAll();
    $total = $total_numbers->rowCount();
    return $total;
}

// SUBSCRIBERS ---------------------------------------

function totalSubscribers($connect, $items_per_page){

    $total_items = $connect->prepare("SELECT COUNT(*) AS total FROM subscribers");
    $total_items->execute();
    $total_items = $total_items->fetch()['total'];

    $number_pages = ceil($total_items / $items_per_page);
    return $number_pages;
}

function get_all_subscribers($connect){

    $sentence = $connect->prepare("SELECT * FROM subscribers"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

// EMAILS

function id_email($id){
    return (int)cleardata($id);
}

function get_etemplate_by_id($connect, $id){

    $sentence = $connect->prepare("SELECT * FROM emailtemplates WHERE email_id = '".$id."'");
    $sentence->execute();
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function get_all_email_templates($connect){

    $sentence = $connect->prepare("SELECT * FROM emailtemplates"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getEmailTemplate($connect, $id){

    if (!empty($id) && (int)($id)) {

        $q = $connect->query("SELECT * FROM emailtemplates WHERE email_id = ".$id." LIMIT 1");
        $f = $q->fetch();
        $result = $f;

        return $result;

    }else{

        return null;
    }  
}

function checkMail($settings){

    $smtp = new SMTP;

//Enable connection-level debug output
//$smtp->do_debug = SMTP::DEBUG_CONNECTION;

    $result = "";

    try {
    //Connect to an SMTP server
        if (!$smtp->connect($settings['st_smtphost'], $settings['st_smtpport'])) {
         $result = "Connect failed";
     }
    //Say hello
     if (!$smtp->hello(gethostname())) {
        $result = "EHLO failed";
    }
    //Get the list of ESMTP services the server offers
    $e = $smtp->getServerExtList();
    //If server can do TLS encryption, use it
    if (is_array($e) && array_key_exists($settings['st_smtpencrypt'], $e)) {
        $tlsok = $smtp->startTLS();
        if (!$tlsok) {
            $result = 'Failed to start encryption: ' . $smtp->getError()['error'];
        }
        //Repeat EHLO after STARTTLS
        if (!$smtp->hello(gethostname())) {
            $result = 'EHLO (2) failed: ' . $smtp->getError()['error'];
        }
        //Get new capabilities list, which will usually now include AUTH if it didn't before
        $e = $smtp->getServerExtList();
    }
    //If server supports authentication, do it (even if no encryption)
    if (is_array($e) && array_key_exists('AUTH', $e)) {
        if ($smtp->authenticate($settings['st_smtpemail'], $settings['st_smtppassword'])) {
        } else{
            $result = 'Authentication failed: ' . $smtp->getError()['error'];
        }
    }

} catch (Exception $e) {
    $result = 'SMTP error: ' . $e->getMessage();
}

return $result;

}

function sendMail($array_content, $email_content, $destinationmail, $fromName, $subject, $isHtml, $settings) {

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                          
        $mail->Host       = $settings['st_smtphost'];                
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $settings['st_smtpemail'];              
        $mail->Password   = $settings['st_smtppassword'];                             
        $mail->SMTPSecure = $settings['st_smtpencrypt'];
        $mail->Port       = $settings['st_smtpport'];

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
        if (!$mail->send())
        {
            $result = $mail->ErrorInfo;
        }
        else 
        {
            $result = TRUE;
        }

        return $result;

    } catch (Exception $e) {
       return null;
   }

} 

// OTHERS ---------------------------------------

function getSettings($connect){
    $q = $connect->query("SELECT * FROM settings");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function get_settings($connect){

    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function get_translation($connect){

    $sentence = $connect->prepare("SELECT * FROM translations"); 
    $sentence->execute();
    $row = $sentence->fetch();
    $result = $row;
    return $result;
}


function get_theme($connect){

    $sentence = $connect->prepare("SELECT * FROM theme"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_roles($connect){

    $sentence = $connect->prepare("SELECT * FROM roles ORDER BY role_id ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function FormatDate($connect, $date){

    $sentence = $connect->prepare("SELECT st_dateformat FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();

    $newDate = date($row['st_dateformat'], strtotime($date));
    return $newDate;
}

function hexToRgb($hex, $alpha = false) {
 $hex = str_replace('#', '', $hex);
 $length = strlen($hex);
 $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
 $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
 $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
 if ( $alpha ) {
  $rgb['a'] = $alpha;
}

   // return $rgb;
return implode(array_keys($rgb)) . '(' . implode(', ', $rgb) . ')';
}

?>