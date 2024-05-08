<?php

require '../config.php';
require '../routes.php';
require './app_functions.php';

$connect = connect();

// Site Configuration
$settings = getSettings($connect);

// Get Translation
$translation = getStrings($connect);

// Default Pages
$defaultSearchPage = getDefaultPage($connect, $settings['st_defaultsearchpage']);
$defaultMembersPage = getDefaultPage($connect, $settings['st_defaultmemberspage']);
$defaultPrivacyPage = getDefaultPage($connect, $settings['st_defaultprivacypage']);
$defaultTermsPage = getDefaultPage($connect, $settings['st_defaulttermspage']);

define('SEARCH_PAGE', $defaultSearchPage['page_slug']);
define('MEMBERS_PAGE', $defaultMembersPage['page_slug']);
define('PRIVACY_PAGE', $defaultPrivacyPage['page_slug']);
define('TERMS_PAGE', $defaultTermsPage['page_slug']);

$urlPath = new Routes();

?>