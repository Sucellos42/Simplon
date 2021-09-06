<?php 
include('../header.php');
define('NL', '<br/>');

$fichier = file('../citations.txt');
$citation = array_rand($fichier);
?>

<h1>Citation du jour</h1>
<p><?php echo $fichier[$citation];?></p>