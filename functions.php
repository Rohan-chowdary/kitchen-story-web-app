<?php

/*--------------------*/
// Description: Evora - Real Estate PHP Script
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

use voku\helper\AntiXSS;

require_once __DIR__ . '/classes/anti-xss/autoload.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/classes/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

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

function isLogged(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {
        return true;
    }else{
        return false;
    }
}

function isAdmin(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_EMAIL);
    
    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_status = 1 AND user_role = 1 LIMIT 1"); 
    $sentence->execute(array(
        ':user_email' => $emailSession
        ));
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

function isEditor(){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_EMAIL);
    
    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_status = 1 AND user_role = 2 LIMIT 1"); 
    $sentence->execute(array(
        ':user_email' => $emailSession
        ));
    $row = $sentence->fetch();

    if ($row) {
        return true;
    }else{
        return false;
    }
}

function isEditing(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit';
}

function isRecipes(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'recipes';
}

function isFavorites(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'favorites';
}

function isFollowers(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'followers';
}

function isFollowing(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'following';
}

function getStrings($connect){

        $sentence = $connect->query("SELECT * FROM translations");
        $row = $sentence->fetch(PDO::FETCH_ASSOC);
        return $row;
}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    return $data;
}

function textTruncate($data, $chars) {
    if(strlen($data) > $chars) {
        $data = $data.' ';
        $data = substr($data, 0, $chars);
        $data = $data.'...';
    }
    return $data;
}

function echoNoHtml($data){
    $data = strip_tags($data);
    $data = htmlentities($data, ENT_QUOTES, "UTF-8");
    $data = substr($data, 0, 255);
    return $data;
}

function clearGetData($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function lengthInput($data, $min, $max = NULL){

    $characters = strlen($data);
    $spaces = preg_match('/\s/',$data);

    if ($max) {
        if ($characters >= $min && $characters <= $max && !$spaces) {
            return true;
        }else{
            return false;
        }
    }else{

        if ($characters >= $min && !$spaces) {
            return true;
        }else{
            return false;
        }
    }
}

function validateInput($data){

    $specialChars = preg_match('@[^\w]@', $data);

    if ($specialChars) {
        return true;
    }else{
        return false;
    }
}

function getNumPage(){
    
    return isset($_GET['p']) && !empty($_GET['p']) && (int)$_GET['p'] ? clearGetData($_GET['p']) : 1;
}

function getItemId(){
    
    return isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : NULL;
}

function getIDCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getIDUser(){
    
    return isset($_GET['user']) && !empty($_GET['user']) && $_GET['user'] ? clearGetData($_GET['user']) : NULL;
}

function getSortBy($value){

   if (isset($_GET['sortby']) && $_GET['sortby'] === $value) {
       return "value = '$value' selected";
   }

   return "value = '$value'";
}

function getSlugItem(){
    
    return isset($_GET['slug']) && !empty($_GET['slug']) && $_GET['slug'] ? clearGetData($_GET['slug']) : NULL;
}

function getQuery(){
    
    return isset($_GET['query']) && !empty($_GET['query']) && $_GET['query'] ? clearGetData($_GET['query']) : NULL;
}

function getMemberQuery(){
    
    return isset($_GET['member']) && !empty($_GET['member']) && $_GET['member'] ? clearGetData($_GET['member']) : NULL;
}

function getSlugCategory(){
    
    return isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] ? clearGetData($_GET['category']) : NULL;
}

function getParamsSort(){
    
    return isset($_GET['sortby']) && !empty($_GET['sortby']) ? clearGetData($_GET['sortby']) : NULL;
}

function getComments($items_per_page, $id){

    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;

    $sentence = connect()->prepare("SELECT comments.*, users.user_name AS user_name, users.user_email AS user_email, users.user_avatar AS user_avatar FROM comments LEFT JOIN users ON users.user_id = comments.user_id WHERE item_id = :item_id AND users.user_status = 1 ORDER BY created_at DESC LIMIT $limit, $items_per_page"); 
    $sentence->execute(array(
        ':item_id' => $id
        ));
    return $sentence->fetchAll();
}

function getRepliesByCommentId($id){
    $sentence = connect()->prepare("SELECT replies.*, users.user_name AS user_name, users.user_email AS user_email, users.user_avatar AS user_avatar FROM replies LEFT JOIN users ON users.user_id = replies.user_id AND users.user_status = 1 WHERE comment_id = :comment_id"); 
    $sentence->execute(array(
        ':comment_id' => $id
        ));
    return $sentence->fetchAll();
}

function getCommentsCountById($id){
    $sentence = connect()->prepare("SELECT COUNT(*) AS total FROM comments WHERE item_id = :item_id"); 
    $sentence->execute(array(
        ':item_id' => $id
        ));
    $row = $sentence->fetch();
    return $row['total'];
}

function getLikesCountById($id){
    $sentence = connect()->prepare("SELECT COUNT(*) AS total FROM likes WHERE item = :item"); 
    $sentence->execute(array(
        ':item' => $id
        ));
    $row = $sentence->fetch();
    return $row['total'];
}

function formatDate($date){

    $sentence = connect()->prepare("SELECT st_dateformat FROM settings");
    $sentence->execute();
    $row = $sentence->fetch();
    $newDate = date($row['st_dateformat'], strtotime($date));
    return $newDate;
}

function generatePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function getAddress($city, $zone = NULL){

    if (!$zone) {
        return $city;
    }else{
        return $city . ', ' . $zone;
    }
}

function maskEmail($email){

    $mail_parts = explode('@', $email);
    $username = '@'.$mail_parts[0];
    $len = strlen($username);

    return $username;
}

function getUserInfo($connect, $userEmail = NULL){

    if (!$userEmail) {
        $email = filter_var(strtolower($_SESSION['user_email']), FILTER_VALIDATE_EMAIL);
    }else{
        $email = filter_var(strtolower($userEmail), FILTER_VALIDATE_EMAIL);
    }
    
    if ($email) {

        $sentence = $connect->prepare("SELECT * FROM users WHERE user_status = 1 AND user_email = :user_email LIMIT 1");
        $sentence->execute(array(
            ':user_email' => $email
        ));
        $row = $sentence->fetch();
        return $row;

    }else{

        return null;
    }
}

function isUserVerified($userEmail){

    $sentence = connect()->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_verified = 1 LIMIT 1"); 
    $sentence->execute(array(
        ':user_email' => $userEmail
    ));
    $row = $sentence->fetch();

    if ($row) {
        return true;
    }else{
        return false;
    }
    
}

function getGravatar( $email, $s = 150, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function numTotalPages($total_items, $items_page){

    $numPages = ceil($total_items / $items_page);
    return $numPages;
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

function getSocialMedia($connect){
    
    $sentence = $connect->prepare("SELECT st_facebook,st_twitter,st_youtube,st_instagram,st_linkedin,st_whatsapp FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function isInFav($connect, $userId, $itemId){
    $sentence = $connect->prepare("SELECT * FROM likes WHERE user = :user AND item = :item LIMIT 1");
    $sentence->execute(array(
        ':user' => $userId,
        ':item' => $itemId
    ));
    $sentence = $sentence->fetch();
    return ($sentence) ? true : false;
}

function isFollowed($connect, $userId, $followerId){
    $sentence = $connect->prepare("SELECT * FROM followers WHERE user_id = :user_id AND follower_id = :follower_id LIMIT 1");
    $sentence->execute(array(
        ':user_id' => $userId,
        ':follower_id' => $followerId
    ));
    $sentence = $sentence->fetch();
    return ($sentence) ? true : false;
}

/*------------------------------------------------------------ */
/* SITE */
/*------------------------------------------------------------ */

function getSeoTitle($pageTitle = NULL, $pageSubTitle = NULL){

    if (!$pageSubTitle && empty($pageSubTitle)) {
        
        return $pageTitle;
        
    }elseif(!$pageTitle && empty($pageTitle)){

        return $pageSubTitle;

    }elseif($pageTitle && !empty($pageTitle) && $pageSubTitle && !empty($pageSubTitle)){

        return $pageSubTitle.' - '.$pageTitle;

    }else{

        return null;
    }
}

function getSeoDescription($generalDescription, $itemDescription = NULL, $seoDescription = NULL){

    if (!$itemDescription && empty($itemDescription) && !$seoDescription && empty($seoDescription)) {
        
        return echoNoHtml($generalDescription);
        
    }else{

        if ($seoDescription && !empty($seoDescription)) {

            return echoNoHtml($seoDescription);

        }else{

            return echoNoHtml($itemDescription);
        }

    }
}

/*------------------------------------------------------------ */
/* CONTENT */
/*------------------------------------------------------------ */

function getSlider($connect, $limit){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipe_author != 3 AND recipe_status = 1 AND recipe_featured = 1 ORDER BY recipe_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getLatestRecipes($connect, $limit){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipe_status = 1 ORDER BY recipe_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getRelatedRecipes($connect, $recipeId, $categoryId){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipe_category = :category AND recipe_id != :recipe AND recipe_status = 1 ORDER BY recipe_created DESC");
    $sentence->execute(array(
        ':recipe' => $recipeId,
        ':category' => $categoryId
    ));
    return $sentence->fetchAll();
}

function getFeaturedCategories($connect){
    $sentence = $connect->prepare("SELECT categories.*, (SELECT COUNT(*) FROM recipes WHERE recipes.recipe_category = categories.category_id AND recipe_status = 1) AS total_items FROM categories WHERE categories.category_featured = 1 AND categories.category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getCategories($connect){
    $sentence = $connect->prepare("SELECT * FROM categories WHERE category_status = 1");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getUserInfoById($connect, $id){
    $sentence = $connect->prepare("SELECT users.*, (SELECT COUNT(*) FROM likes WHERE likes.user = users.user_id) AS total_likes, (SELECT COUNT(*) FROM recipes WHERE recipes.recipe_author = users.user_id AND recipes.recipe_status = 1) AS total_recipes, (SELECT COUNT(*) FROM followers WHERE followers.user_id = users.user_id) AS total_following, (SELECT COUNT(*) FROM followers WHERE followers.follower_id = users.user_id ) AS total_followers FROM users WHERE user_status = 1 AND user_id = :user LIMIT 1");
    $sentence->execute(array(
        ':user' => $id
    ));
    $row = $sentence->fetch();
    return $row;
}

function getRandomRecipes($connect, $limit){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, users.user_email AS author_email, users.user_avatar AS author_avatar, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipe_author != 3 AND recipe_status = 1 ORDER BY RAND() LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getCommunityRecipes($connect, $limit){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, users.user_email AS author_email, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipes.recipe_status = 1 ORDER BY recipes.recipe_created DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getMostLikedRecipes($connect, $limit){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, users.user_email AS author_email, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipes.recipe_status = 1 ORDER BY total_likes DESC LIMIT $limit");
    $sentence->execute();
    return $sentence->fetchAll();
}

function getRecipeIDBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT recipe_id AS id FROM recipes WHERE recipe_slug = :slug LIMIT 1");
    $sentence->execute(array(
        ':slug' => $slug
    ));
    $row = $sentence->fetch();
    return $row;
}

function getRecipeByID($connect, $id){
    $sentence = $connect->prepare("SELECT recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, users.user_email AS author_email, users.user_avatar AS author_avatar, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id AND users.user_status = 1 WHERE recipe_status = 1 AND recipe_id = :id LIMIT 1");
    $sentence->execute(array(
        ':id' => $id
    ));
    $row = $sentence->fetch();
    return $row;
}

function getSearch($connect, $items_per_page){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS recipes.*, categories.category_title AS category_title, difficulties.difficult_title AS difficult_title, users.user_name AS author_name, (SELECT COUNT(*) FROM likes WHERE recipes.recipe_id = likes.item) AS total_likes FROM recipes LEFT JOIN categories ON recipe_category = categories.category_id LEFT JOIN difficulties ON recipe_difficult = difficulties.difficult_id LEFT JOIN users ON recipe_author = users.user_id WHERE recipe_status = 1";

    if(getIDCategory()){

        $sqlQuery .= " AND categories.category_id = '".getIDCategory()."'";
    }

    if(getIDUser()){

        $sqlQuery .= " AND recipes.recipe_author = '".getIDUser()."'";
    }

    if(getQuery()){

        $sqlQuery .= " AND recipes.recipe_title LIKE '%".getQuery()."%' OR recipes.recipe_ingredients LIKE '%".getQuery()."%' OR categories.category_title LIKE '%".getQuery()."%'";
    }

    if (getParamsSort()) {

        if(getParamsSort() == 'default') {

            $sqlQuery .= " ORDER BY recipes.recipe_id DESC";

        }elseif(getParamsSort() == 'date-asc') {

            $sqlQuery .= " ORDER BY recipes.recipe_created ASC";

        }elseif (getParamsSort() == 'date-desc') {

            $sqlQuery .= " ORDER BY recipes.recipe_created DESC";

        }elseif (getParamsSort() == 'best-rated') {

            $sqlQuery .= " ORDER BY total_likes DESC";
        }

    }elseif(!isset($_GET['sortby']) || empty($_GET['sortby'])) {

        $sqlQuery .= " ORDER BY recipes.recipe_created DESC";
    }

    $sqlQuery .= " LIMIT $limit, $items_per_page";

    $sentence = $connect->prepare($sqlQuery);

    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getMembers($connect, $items_per_page){
    
    $limit = (getNumPage() > 1) ? getNumPage() * $items_per_page - $items_per_page : 0;
    
    $sqlQuery = "SELECT SQL_CALC_FOUND_ROWS users.*, (SELECT COUNT(*) FROM likes WHERE likes.user = users.user_id) AS total_likes, (SELECT COUNT(*) FROM recipes WHERE recipes.recipe_author = users.user_id AND recipes.recipe_status = 1) AS total_recipes FROM users WHERE users.user_status = 1";

    if(getMemberQuery()){

        $sqlQuery .= " AND users.user_name LIKE '%".getMemberQuery()."%'";
    }

    if (getParamsSort()) {

        if (getParamsSort() == 'best-rated') {

            $sqlQuery .= " ORDER BY total_likes DESC";
        }

    }elseif(!isset($_GET['sortby']) || empty($_GET['sortby'])) {

        $sqlQuery .= " ORDER BY total_likes DESC";
    }

    $sqlQuery .= " LIMIT $limit, $items_per_page";

    $sentence = $connect->prepare($sqlQuery);

    $sentence->execute();

    $total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();
    $items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);
}

function getUserFavorites($connect, $userId){
    $sentence = $connect->prepare("SELECT recipes.*, likes.* FROM recipes,likes WHERE likes.user = :user_id AND likes.item = recipes.recipe_id GROUP BY recipes.recipe_id");
    $sentence->execute(array(
        ':user_id' => $userId
    ));
    return $sentence->fetchAll();
}

function getUserFollowers($connect, $userId){
    $sentence = $connect->prepare("SELECT users.user_id, users.user_name, users.user_avatar, followers.follower_id FROM followers LEFT JOIN users ON users.user_id = followers.user_id WHERE follower_id = :id");
    $sentence->execute(array(
        ':id' => $userId
    ));
    return $sentence->fetchAll();
}

function getUserFollowing($connect, $userId){
    $sentence = $connect->prepare("SELECT users.user_id, users.user_name, users.user_avatar, followers.follower_id FROM followers LEFT JOIN users ON users.user_id = followers.follower_id WHERE followers.user_id = :id");
    $sentence->execute(array(
        ':id' => $userId
    ));
    return $sentence->fetchAll();
}

function getUserRecipes($connect, $userId){
    $sentence = $connect->prepare("SELECT * FROM recipes WHERE recipe_author = :id ORDER BY recipe_created DESC");
    $sentence->execute(array(
        ':id' => $userId
    ));
    return $sentence->fetchAll();
}

function getRecipeSlug($connect, $slug){

    $sentence = $connect->prepare("SELECT COUNT(*) AS total FROM recipes WHERE recipe_slug LIKE :slug");
    $sentence->execute(array(
        ':slug' => $slug.'%'
    ));
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row['total'];
}

/*------------------------------------------------------------ */
/* ADS */
/*------------------------------------------------------------ */

function getHeaderAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'header' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getFooterAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'footer' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getSidebarAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE ad_position = 'sidebar' AND ad_status = 1 ORDER BY RAND() LIMIT 1"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function getSettings($connect){
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getTheme($connect){
    
    $sentence = $connect->prepare("SELECT * FROM theme"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getDefaultPage($connect, $page){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = :page_id LIMIT 1");
    $sentence->execute(array(
        ':page_id' => $page
    ));
    $row = $sentence->fetch();
    
    if ($row) {
        return $row;
    }else{
        return null;
    }

}

function getPageIDBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT page_id AS id FROM pages WHERE page_slug = :slug LIMIT 1");
    $sentence->execute(array(
        ':slug' => $slug
    ));
    $row = $sentence->fetch();
    return $row;
}

function getPageBySlug($connect, $slug){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_slug = :slug LIMIT 1");
    $sentence->execute(array(
        ':slug' => $slug
    ));
    $row = $sentence->fetch();
    return $row;
}

function getPageByID($connect, $id_page){
    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_status = 1 AND page_id = :id LIMIT 1");
    $sentence->execute(array(
        ':id' => $id_page
    ));
    $row = $sentence->fetch();
    return $row;
}

function getSidebarMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_sidebar = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getHeaderMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_header = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getFooterMenu($connect){
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_footer = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getNavigation($connect, $idMenu){
    
    $sentence = $connect->prepare("SELECT navigations.navigation_id, navigations.navigation_page, navigations.navigation_target, COALESCE(pages.page_slug, navigations.navigation_url) AS navigation_url, COALESCE(pages.page_title, navigations.navigation_label) AS navigation_label, navigations.navigation_type FROM navigations LEFT JOIN pages ON page_id = navigations.navigation_page WHERE navigation_menu = :menu ORDER BY navigation_order ASC"); 
    $sentence->execute(array(
        ':menu' => $idMenu
    ));
    return $sentence->fetchAll();
}

function getEmailTemplate($connect, $id){

    if (!empty($id)) {

        $q = $connect->prepare("SELECT * FROM emailtemplates WHERE email_id = :email_id LIMIT 1");
        $q->execute(array(
            ':email_id' => $id
        ));
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

            $result = 'TRUE';
        }

        return $result;

    } catch (Exception $e) {
     return $e;
    }

}

function memberSince($date){

    $timestamp = strtotime($date);
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    //$date = "$day " . $months[$month] . " $year";
    $date = $months[$month] . " $year";
    return $date;
}

function cropAlign($image, $cropWidth, $cropHeight, $horizontalAlign = 'center', $verticalAlign = 'middle') {
    $width = imagesx($image);
    $height = imagesy($image);
    $horizontalAlignPixels = calculatePixelsForAlign($width, $cropWidth, $horizontalAlign);
    $verticalAlignPixels = calculatePixelsForAlign($height, $cropHeight, $verticalAlign);
    return imageCrop($image, [
        'x' => $horizontalAlignPixels[0],
        'y' => $verticalAlignPixels[0],
        'width' => $horizontalAlignPixels[1],
        'height' => $verticalAlignPixels[1]
    ]);
}

function calculatePixelsForAlign($imageSize, $cropSize, $align) {
    switch ($align) {
        case 'left':
        case 'top':
            return [0, min($cropSize, $imageSize)];
        case 'right':
        case 'bottom':
            return [max(0, $imageSize - $cropSize), min($cropSize, $imageSize)];
        case 'center':
        case 'middle':
            return [
                max(0, floor(($imageSize / 2) - ($cropSize / 2))),
                min($cropSize, $imageSize),
            ];
        default: return [0, $imageSize];
    }
}

?>