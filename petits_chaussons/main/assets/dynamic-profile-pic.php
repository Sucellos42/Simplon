<?php
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

session_start();
include $ROOT_DIR . 'dbConnect.php';
include $ROOT_DIR . 'includeClasses.php';
include $ROOT_DIR . 'functions.php';

$user = new User();
return $user->profilePic;
?>