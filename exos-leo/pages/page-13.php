<?php
define('NL', '<br/>');

$fichier_citations = (array)(file('citations.txt'));



echo "<h1>Les 5 citations du jour</h1>" . NL;
echo "<ul>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<li> <p>";
        $citations = array_rand($fichier_citations);
        echo $fichier_citations[$citations];
        echo "</p></li>";
    }
echo "</ul>"; ?>