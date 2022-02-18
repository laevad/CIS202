<?php
const FOLDER_NAME = 'CIS202'; // change this to desire folder name // same to folder name
ob_start();
session_start();
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/'.FOLDER_NAME) + strlen(FOLDER_NAME)+1;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WEB", $doc_root);

require_once 'query_functions.php';
require_once 'database.php';
require_once 'auth_functions.php';
require_once 'functions.php';
require_once 'validation_functions.php';

$db = db_connect();
$errors = [];