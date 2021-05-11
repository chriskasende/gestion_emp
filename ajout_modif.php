<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Document</title>
</head>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'newtest');
$noemp = $nom = $prenom =  $emploi = $sup = $embauche = $sal = $comm = $noserv  = $date_ajout  = null;
$isThereError = false;
$message = "";
$nomRegex = "#[A-Za-z\é\è\ê\-]+$#";
// $nomRegex = "#[A-Za-z-]+$#";
$noempRegex = "#^[0-9]{4}$#";
if (isset($_POST['bouttonmodif'])) {
    echo " modif";
    if (isset(
        $_POST["noemp"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["emploi"],
        $_POST["sup"],
        $_POST["embauche"],
        $_POST["sal"],
        $_POST["comm"],
        $_POST["noserv"],


    )) {
        echo "n'imp";
        $noemp = $_POST['noemp'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $emploi = $_POST['emploi'];
        $sup = $_POST['sup'];
        $embauche = $_POST['embauche'];
        $sal = $_POST['sal'];
        $comm = $_POST['comm'];
        $noserv = $_POST['noserv'];
    }
}





function ajout_modif($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm)
{
    $bdd = mysqli_connect('localhost', 'root', '', 'newtest');
    $modifier = mysqli_query($bdd, "UPDATE employes SET nom ='$nom'  , prenom ='$prenom' , emploi ='$emploi' ,sup = '$sup', embauche = '$embauche',sal = '$sal' , comm ='$comm', noserv ='$noserv', WHERE noemp = '$noemp';");
}
ajout_modif($_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['sup'], $_POST['embauche'], $_POST['sal'], $_POST['comm'], $_POST['noserv'], $_POST['noemp']);

// header('Location: gestion.php');
?>