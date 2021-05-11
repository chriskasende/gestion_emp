<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
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
                echo "<td><a href='form_modif.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Modifier</button></a></td>";

                foreach ($tab2 as $valeur) {

                    if ($tab[$i]['noemp'] == $valeur['sup']) {
                        $trouver = true;
                        break;
                    }
                }
                if (!$trouver) {
                    echo "<td><a href='supprime.php?id=" . $tab[$i]['noemp'] . "'><button class='btn btn-warning'>Supprimer</button></a></td>";
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