<?php

echo('<h1> ** Sommaire ** </h1>');


$folder = "../pages";
$files = new arrayIterator(scandir($folder));

$folder_regx = new RegexIterator($files, '/page\-1[0 -5]/');




foreach($folder_regx as $file){
    echo ("<li><a href=$file>$file</a></li>");
}
?>