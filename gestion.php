<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>gestion employes</title>

</head>

<body>
    <div class=CTA2>
        <a class="btn btn-dark btn-sm" href="form_new_worker.html"> Ajouter un salarié</a>
    </div>
    <?php
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");
    $sup = mysqli_query($bdd, "SELECT sup FROM employes;");
    $tab2 = mysqli_fetch_all($sup, MYSQLI_ASSOC);
    $result = mysqli_query($bdd, "SELECT nom, prenom, emploi, sup, noserv,noemp FROM employes;");
    $tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($tab);
    ?>
    <?php
    $query3 = mysqli_query($bdd, "SELECT (date_ajout)FROM employes WHERE date_ajout=DATE_FORMAT(SYSDATE(),'%y-%m%-%d');");
    $tab3 = mysqli_num_rows($query3);


    echo "<td>Nombre d'ajout aujourd'hui:" . $tab3 . "</td>";
    print_r($tab3);
    ?>
    <div class="content">
        <table class="table ">

            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Emploi</th>
                <th>Superieur</th>
                <th>N° service</th>
            </tr>

            <?php
            for ($i = 0; $i < count($tab); $i++) {
                $trouver = false;
                echo "<tr>";
                echo "<td>" . $tab[$i]['nom'] . "</td>";
                echo "<td>" . $tab[$i]['prenom'] . "</td>";
                echo "<td>" . $tab[$i]['emploi'] . "</td>";
                echo "<td>" . $tab[$i]['sup'] . "</td>";
                echo "<td>" . $tab[$i]['noserv'] . "</td>";
                echo "<td>" . $tab[$i]['noemp'] . "</td>";
                echo "<td><a href='detailsemp.php'><button class='btn btn-warning'>Detail</button></a></td>";
                echo "<td><a href='form_modif.php'><button class='btn btn-warning'>Modifier</button></a></td>";

                foreach ($tab2 as $valeur) {

                    if ($tab[$i]['noemp'] == $valeur['sup']) {
                        $trouver = true;
                        break;
                    }
                }
                if (!$trouver) {
                    echo "<td><a href='supprime.php'><button class='btn btn-warning'>Supprimer</button></a></td>";
                }
                echo "</tr>";
            }
            mysqli_close($bdd);
            ?>
            <div class="btn-group">
                <a href="formajout.php">
                    <button type="submit" name="buttonAjout">ajouter</button>
                </a>

            </div>
        </table>
    </div>
</body>

</html>