<?php

// Lien vers le PDO 
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';

$value = $_POST['Status'];

print_r($value);