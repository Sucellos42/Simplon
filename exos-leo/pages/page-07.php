<?php
define('NL', '<br/>');

$typeFeu = ['Dracoufeuille', 'Ponitouille', 'Sulfurette'];
$typeEau = ['Carabistouille', 'Ramoulette', 'Pykoukwak'];
$typeTerre = ['Bulbizouille', 'Empilflouille', 'Ortiche'];

$eau = array_rand($typeEau, 1);
$terre = array_rand($typeTerre, 1);
$feu = array_rand($typeFeu, 1);


for ($i=1; $i <= 3; $i++) {
    echo $typeEau[$eau] . '<br/>';

}
for ($i = 1; $i <= 3; $i++) {
    echo $typeTerre[$terre] . NL;

}
for ($i = 1; $i <= 3; $i++) {
    echo $typeFeu[$feu] . NL;

}
