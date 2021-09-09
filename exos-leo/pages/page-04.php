<?php 
define('NL', '<br/>');

$fichier = file('citations.txt');
$citations = array_rand($fichier, 1);

for ($i = 1; $i <= 10; $i++) {
    echo ($i . (" ")  . $fichier[$citations] . NL);
}

?>