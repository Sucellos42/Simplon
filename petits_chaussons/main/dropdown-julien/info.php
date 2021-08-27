<?php
session_start();
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'functions.php';
include $ROOT_DIR . 'dbConnect.php';
include $ROOT_DIR . 'includeClasses.php';

$user = new User;
print_r($user);