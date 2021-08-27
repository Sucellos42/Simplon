<?php

session_start();
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';
global $pdo;

$personnelColor = htmlspecialchars($_POST['personnel-colorchoose']);
$administratifColor = htmlspecialchars($_POST['administratif-colorchoose']);
$commercialColor = htmlspecialchars($_POST['commercial-colorchoose']);
$strategiqueColor = htmlspecialchars($_POST['strategique-colorchoose']);
$managementColor = htmlspecialchars($_POST['management-colorchoose']);
$marketingColor = htmlspecialchars($_POST['marketing-colorchoose']);
$techniqueColor = htmlspecialchars($_POST['technique-colorchoose']);


    $updatePersonnelColor =  "UPDATE categories SET color = :personnelColor 
    WHERE id = 1 ";
    $personnelColor = substr($personnelColor, 1);
    
    $preparePDO = $pdo->prepare($updatePersonnelColor);
    
    $preparePDO->bindParam(':personnelColor', $personnelColor);
    
    $preparePDO->execute();



$updateAdministratifColor =  "UPDATE categories SET color = :administratifColor 
WHERE id = 2 ";
$administratifColor = substr($administratifColor, 1);

$preparePDO = $pdo->prepare($updateAdministratifColor);

$preparePDO->bindParam(':administratifColor', $administratifColor);

$preparePDO->execute();


$updateCommercialColor =  "UPDATE categories SET color = :commercialColor 
WHERE id = 3 ";
$commercialColor = substr($commercialColor, 1);

$preparePDO = $pdo->prepare($updateCommercialColor);

$preparePDO->bindParam(':commercialColor', $commercialColor);

$preparePDO->execute();


$updateStrategiqueColor =  "UPDATE categories SET color = :strategiqueColor 
WHERE id = 4 ";
$strategiqueColor = substr($strategiqueColor, 1);

$preparePDO = $pdo->prepare($updateStrategiqueColor);

$preparePDO->bindParam(':strategiqueColor', $strategiqueColor);

$preparePDO->execute();


$updateManagementColor =  "UPDATE categories SET color = :managementColor 
WHERE id = 5 ";
$managementColor = substr($managementColor, 1);

$preparePDO = $pdo->prepare($updateManagementColor);

$preparePDO->bindParam(':managementColor', $managementColor);

$preparePDO->execute();


$updateMarketingColor =  "UPDATE categories SET color = :marketingColor 
WHERE id = 6 ";
$marketingColor = substr($marketingColor, 1);

$preparePDO = $pdo->prepare($updateMarketingColor);

$preparePDO->bindParam(':marketingColor', $marketingColor);

$preparePDO->execute();


$updateTechniqueColor =  "UPDATE categories SET color = :techniqueColor 
WHERE id = 7 ";
$techniqueColor = substr($techniqueColor, 1);

$preparePDO = $pdo->prepare($updateTechniqueColor);

$preparePDO->bindParam(':techniqueColor', $techniqueColor);

$preparePDO->execute();

unset($pdo);
///todo : lien de redirection
header('Location: ../dashboard/index.php');
?>