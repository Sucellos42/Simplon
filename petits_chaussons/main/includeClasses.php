<?php

$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';


// Include all Classes
foreach (glob($ROOT_DIR . 'Class/*.php') as $class)
{
    include $class;
}



?>