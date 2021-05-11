<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>BDD personnel</title>
</head>

<body>
    <?php

    include_once(__DIR__ . '/../DAO/EmployeDAO.php');

    $noemp = $nom = $prenom =  $emploi = $sup = $embauche = $sal = $comm = $noserv  = $date_ajout  = null;
    $isThereError = false;
    $message = "";
    $nomRegex = "#[A-Za-z\é\è\ê\-]+$#";
    // $nomRegex = "#[A-Za-z-]+$#";
    $noempRegex = "#^[0-9]{4}$#";


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
        echo "non ajouté";
        $noemp = $_POST['noemp'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $emploi = $_POST['emploi'];
        $sup = $_POST['sup'];
        $embauche = $_POST['embauche'];
        $sal = $_POST['sal'];
        $comm = $_POST['comm'];
        $noserv = $_POST['noserv'];


        /////////////////////////////////////
        if (empty($noemp)) {
            $message = "Numéro requis";
            $isThereError = true;
        } elseif (!preg_match($noempRegex, $noemp)) {
            $message = "4 chiffres maximum commençant par 1";
            $isThereError = true;
        }
        if (empty($nom)) {
            $message = "Nom requis";
            $isThereError = true;
        } elseif (!preg_match($nomRegex, $nom)) {
            $message = "lettres et espaces uniquement";
            $isThereError = true;
        }
        /////////////////////////////////////
        if (empty($prenom)) {
            $message = "Prénom requis";
            $isThereError = true;
        } elseif (!preg_match($nomRegex, $prenom)) {
            $message = "lettres et espaces uniquement";
            $isThereError = true;
        }

        // Condition regex pour imprimer les données dans la table

        if (preg_match($nomRegex, $nom) && preg_match($nomRegex, $prenom) && preg_match($noempRegex, $noemp) && !$isThereError) {

            // ajout_emp($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm);
            // renvoie vers l'index
            // header("Refresh: 3;URL=gestion.php");
        }
    }
    ?>



    <?php

    if (preg_match("#[^\D]#", $_POST['sup']) && preg_match("#[^\D]#", $_POST['noserv'])) {
        $employeDAO = new EmployeDAO();
        $tab = $employeDAO->ajout_emp($_POST['sup'], $_POST['noemp'], $_POST['noserv'], $_POST['nom'],  $_POST['prenom'],  $_POST['emploi'], $_POST['embauche'], $_POST['sal'], $_POST['comm']);
        echo "<p> ajout  exécuté.</p>";
    } else {
        echo "<p>Vérifier saisie<p>";
    }

    //$bdd = mysqli_init();
    //mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");


    // $insert = mysqli_query($bdd, "INSERT INTO employes (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
    //SELECT MAX(noemp)+1, " . "'" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['emploi'] . "', " . $_POST['sup'] . ", sysdate(), " . $_POST['sal'] . ", " . $_POST['comm'] . ", " . $_POST['noserv'] . " FROM employes;");

    // $test =  "INSERT INTO employes (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
    // SELECT MAX(noemp)+1," . "'" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['emploi'] . "', " . $_POST['sup'] . ", sysdate(), " . $_POST['sal'] . ", " . $_POST['comm'] . ", " . $_POST['noserv'] . " FROM employes;";
    // var_dump($test);
    header('Location: gestion.php');

    ?>


</body>

</html>