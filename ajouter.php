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



    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");


    $insert = mysqli_query($bdd, "INSERT INTO employes (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
    SELECT MAX(noemp)+1, " . "'" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['emploi'] . "', " . $_POST['sup'] . ", sysdate(), " . $_POST['sal'] . ", " . $_POST['comm'] . ", " . $_POST['noserv'] . " FROM employes;");

    // $test =  "INSERT INTO employes (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
    // SELECT MAX(noemp)+1," . "'" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['emploi'] . "', " . $_POST['sup'] . ", sysdate(), " . $_POST['sal'] . ", " . $_POST['comm'] . ", " . $_POST['noserv'] . " FROM employes;";
    // var_dump($test);
    header('Location: gestion.php');

    ?>


</body>

</html>