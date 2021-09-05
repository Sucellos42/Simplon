<?php 
define('NL', '<br/>');

$fichier = file('citations.txt');
$nb_ligne = count($fichier);
echo $fichier . NL;
echo $nb_ligne . NL;
print_r($fichier);
?>
<form action="" method="post">
    <input type="number" name="input" id="" min="0" >
    <input type="submit" value="Envoyer">

</form>

<?php
// $number = 2;



// if (isset($_POST['input'])){
//     $number = $_POST['input'];
// }
$citations = array_rand($fichier, $_POST['input']);
print_r($citations);

if ($_POST['input'] === 0){
    echo ('Combien voulez vous voir de citations');
}
else if ($_POST['input'] === 1){
    echo $fichier($citation) ;
} else if ($_POST['input'] > 1){
    foreach ($citations as $citation) {
        echo $fichier[$citation] . NL ;
    }
}
// for ($citations as $citation){
//     echo $fichier[$citation] . NL ;
// }