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
    header('Location: gestion.php');


    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");
    $insert = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$_GET[id]';");


    ?>


</body>

</html>