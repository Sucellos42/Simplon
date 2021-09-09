<?php
define('NL', '<br/>');

$typeFeu = ['Dracoufeuille', 'Ponitouille', 'Sulfurette'];
$typeEau = ['Carabistouille', 'Ramoulette', 'Pykoukwak'];
$typeTerre = ['Bulbizouille', 'Empilflouille', 'Ortiche'];

$eau = array_rand($typeEau, 1);
$terre = array_rand($typeTerre, 1);
$feu = array_rand($typeFeu, 1);

echo $typeEau[$eau] . '<br/>';
echo $typeTerre[$terre] . NL;
echo $typeFeu[$feu] . NL;
