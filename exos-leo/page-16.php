<?php

echo('<h1> ** Sommaire ** </h1>');

$folder = "./pages";
$files = scandir($folder);


// unset($files[array_search('poke-plante.txt', $files)]);
// unset($files[array_search('poke-feu.txt', $files)]);
// unset($files[array_search('poke-eau.txt', $files)]);
// unset($files[array_search('citations.txt', $files)]);
print_r($files);


foreach($files as $file){
    echo ("<li><a href='$file' >'$file'</a></li>");
}
