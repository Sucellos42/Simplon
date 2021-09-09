<?php 
define('NL', '<br/>');
include('../header.php');


$fichier_citation = (array) file('../citations.txt');
$fichier_poke_eau = (array) file('../poke-eau.txt');
$fichier_poke_feu = (array) file('../poke-feu.txt');
$fichier_poke_plante = (array) file('../poke-plante.txt');
$citation = array_rand($fichier_citation);
$poke_eau = array_rand($fichier_poke_eau);
$poke_feu = array_rand($fichier_poke_feu);
$poke_plante = array_rand($fichier_poke_plante);
?>

<h1>Citation du jour</h1>
<p><?php echo $fichier_citation[$citation];?></p>

<h1>Liste de pokemons</h1>
<p id="eau"><?php echo $fichier_poke_eau[$poke_eau];?></p>
<p id="feu"><?php echo $fichier_poke_feu[$poke_feu];?></p>
<p id="plante"><?php echo $fichier_poke_plante[$poke_plante];?></p>