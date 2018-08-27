<?php
session_start();
error_reporting(E_ALL);
ob_start();

$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) @date_default_timezone_set($timezone);


//User types
if (!defined('ADMIN')) 	define("ADMIN","admin");


//Table Names
if (!defined('ADMIN_MASTER')) 		define('ADMIN_MASTER','admin');

//Shortforms
if (!defined('TXDIRECT')) 	define('TXDIRECT',"2018 Corpus. All Rights Reserved.");


define('DOMAIN_NAME','http://'.$_SERVER['SERVER_NAME'].'');
if (!defined('SIGNATURE')) define('SIGNATURE',"The Corpus Team");

// define paths
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/LIC-Calculator/"); 
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
define('BASE_PATH', '/LIC-Calculator/');
define('ASSETS_PATH_CSS', BASE_PATH.'assets/');
define('ASSETS_PATH_JS', BASE_PATH.'assets/');
define('IMAGES_PATH', BASE_PATH. 'assets/images/');
define('INCLUDE_FILE_PATH', ROOT_PATH. '/includes/');
define('FILE_UPLOAD_PATH', BASE_PATH. '/images/');

//buttons
$view_button = '<a class="btn btn-view" href="" title="View Details" aria-label="View Details" lang="[[id]]"><i class="fa fa-eye fa-custom" aria-hidden="true" style="color: #2196F3;"></i></a>';

$edit_button = '<a class="btn btn-edit" href="?update&id=[[id]]" title="Edit" aria-label="Edit"><i class="fa fa-edit fa-custom" aria-hidden="true" style="color: blue;"></i></a>';

$edit_button_1 = '<a class="btn btn-edit" href="" title="Edit" lang="[[id]]" aria-label="Edit"><i class="fa fa-edit fa-custom" aria-hidden="true" style="color: blue;"></i></a>';    

$delete_button = '<a class="btn btn-delete" href="" aria-label="Delete" lang="[[id]]" title="Delete" style="color:red"><i class="fa fa-trash-o fa-custom" aria-hidden="true"></i></a>';

$active_button = '<a class="btn btn-active btn-xs" href="" aria-label="Active" lang="[[id]]" title="Active" ><i class="fa fa-check-circle-o fa-custom text-green" aria-hidden="true"></i></a>';

$inactive_button = '<a class="btn btn-inactive btn-xs" href="" aria-label="Inctive" lang="[[id]]" title="Inctive" ><i class="fa fa-ban text-red fa-custom" aria-hidden="true"></i></a>';

$icon_button = '<a class="btn btn-icon btn-xs mll" href="" aria-label="Icon" lang="[[id]]" title="Icon" ><i class="fa fa-image text-blue fa-custom" aria-hidden="true"></i></a>';



$footer_copyright = '<div>&copy; '.TXDIRECT.'</div>';

$htmlhead = '';

header( 'Content-Type: text/html; charset=utf-8' );

?>