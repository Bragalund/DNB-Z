<?php

ob_start();
session_start();

if(!defined("CONFIG")){
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
	exit("Not Found");
}

// Here is the connection information.

if(class_exists("Database")){
	$dbhost = getenv('DB_HOST') ?: 'localhost';
	$dbuser = getenv('DB_USER') ?: 'dnb_user';
	$dbpass = getenv('DB_PASSWORD') ?: 'dnb_pass';
	$dbname = getenv('DB_NAME') ?: 'dnb_z';

	$db = Database::init();
	$db->connect($dbhost, $dbuser, $dbpass, $dbname, '', 'assoc', $conf['localhost']);
	$db->setSettings('utf8', true);
}
else {
	header($_SERVER['SERVER_PROTOCOL']." 500 Internal Error");
	exit("Missing database connection");
}

/*if( !isset($_SESSION['user']) ) {
	header("Location: home.php");
	exit;
}
*/
