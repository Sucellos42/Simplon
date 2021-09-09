<?php 

include('../header.php');

define('NL', '<br/>');

$fichier_citation = (array) file('../citations.txt');
$fichier_poke_eau = (array) file('../poke-eau.txt');
$fichier_poke_feu = (array) file('../poke-feu.txt');
$fichier_poke_plante = (array) file('../poke-plante.txt');
$citation = array_rand($fichier_citation);
$poke_eau = array_rand($fichier_poke_eau);
$poke_feu = array_rand($fichier_poke_feu);
$poke_plante = array_rand($fichier_poke_plante);


function affiche($pokemons){
    echo "<ul>";
    foreach ($pokemons as $pokemon){
        echo "<li> $pokemon </li>";
    }
    echo "</ul>";
}
echo "<h1> Pokedex </h1>";
echo('<h2>Pokemons Feu </h2>') ;
echo affiche($fichier_poke_feu) . NL;
echo('<h2>Pokemons Eau </h2>') ;
echo affiche($fichier_poke_eau) . NL;
echo('<h2>Pokemons Plante </h2>') ;
echo affiche($fichier_poke_plante) . NL;
