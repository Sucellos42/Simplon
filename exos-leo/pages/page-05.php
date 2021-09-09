<?php 
define('NL', '<br/>');

$fichier = file('citations.txt');

for ($i = 1; $i <= 10; $i++) {
    $citations = array_rand($fichier, 1);
    echo ($i . (" ")  . $fichier[$citations] . NL);
}

?>