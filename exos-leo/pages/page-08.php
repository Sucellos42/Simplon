<?php
define('NL', '<br/>');

$typeFeu = ['Dracoufeuille', 'Ponitouille', 'Sulfurette'];
$typeEau = ['Carabistouille', 'Ramoulette', 'Pykoukwak'];
$typeTerre = ['Bulbizouille', 'Empilflouille', 'Ortiche'];


echo ('Type Eau: ' . NL);
for ($i=1; $i <= 3; $i++) {
    $eau = array_rand($typeEau, 1);
    echo $typeEau[$eau] . '<br/>';
    
}
echo (NL .'Type Terre: ' . NL);
for ($i = 1; $i <= 3; $i++) {
    $terre = array_rand($typeTerre, 1);
    echo $typeTerre[$terre] . NL;
    
}
echo (NL .'Type Feu: ' . NL );
for ($i = 1; $i <= 3; $i++) {
    $feu = array_rand($typeFeu, 1);
    echo $typeFeu[$feu] . NL;

}