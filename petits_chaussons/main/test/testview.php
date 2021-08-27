<?php
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

session_start();
include $ROOT_DIR . 'dbConnect.php';
include $ROOT_DIR . 'includeClasses.php';
include $ROOT_DIR . 'header.php';
include $ROOT_DIR . 'functions.php';

print_r($user);

echo('</br>');


// echo $_SERVER['PHP_SELF'];