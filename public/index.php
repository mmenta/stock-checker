<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/common.php');

$requestUri = $_SERVER['REQUEST_URI'];
$url = parseUrl($requestUri);
$page = getPage($url);

// include model
include('views/pages/'.$page.'/model.php');
$Model = new Model();

// get model
switch( $page ) {
    case '404':      $route = '404.php';        break;
    case 'home':     $route = 'home';           break;
    case 'ajax':     $route = 'ajax';           break;
    default:         $route = 'home';       
}


// Load Theme Template ====================
require('./layout.php');
?>


