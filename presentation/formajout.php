<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once(__DIR__ . '/../DAO/EmployeDAO.php');

    ?>


    <form action="ajouter.php" method="post">
        <div class="form">
            <legend>Entrez vos informations</legend>

            <div class="form-group">
                <label for="noemp" class="form-label">Noemp</label> :
                <input type="text" class="form-control" name="noemp" placeholder="numéro d'employé" maxlength="4">
                <span class="comments text-danger font-italic"></span>
            </div>


            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="prenom" placeholder="Votre Nom" required>
                <span class="comments text-danger font-italic"></span>

            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="nom" placeholder="Votre Prénom" required>
                <span class="comments text-danger font-italic"></span>

            </div>
            <div class="mb-3">
                <label for="emploi" class="form-label">Emploi :</label>
                <input type="text" class="form-control" id="emploi" name="emploi" placeholder="Votre emploi" required>
            </div>
            <div class="mb-3">
                <label for="sup" class="form-label">Numéro du supérieur :</label>
                <input type="text" class="form-control" id="sup" name="sup" placeholder="Numéro du supérieur" required>

            </div>

            <div class="mb-3">
                <label for="embauche" class="form-label">Date d'embauche :</label>
                <input type="date" class="form-control" id="embauche" name="embauche" placeholder="Exemple : 1999-12-25" required>

            </div>
            <div class="mb-3">
                <label for="sal" class="form-label">Salaire :</label>
                <input type="text" class="form-control" id="sal" name="sal" placeholder="Votre salaire" required>
            </div>
            <div class="mb-3">
                <label for="comm" class="form-label">Commission :</label>
                <input type="text" class="form-control" id="comm" name="comm" placeholder="Votre Commission">
            </div>
            <div class="mb-3">
                <label for="noserv" class="form-label">Numéro de votre service :</label>
                <input type="text" class="form-control" id="noserv" name="noserv" placeholder="Votre Numéro de service" required>
            </div>
            <div>
                </pan><button type="submit" class="btn btn-dark" value="bouttonAjout" name="bouttonAjout">Envoyer</button>
    </form>
    </div>
    </div>
    </form>

    <div class=CTA>

        <a class="btn btn-dark btn-sm" href=""> Revenir à la liste des employés</a>
    </div>
</body>

</html><?php
        function ajout_emp($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm)
        {
            $conn = mysqli_connect('localhost', 'root', '', 'newtest');

            $requete = "INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
    VALUES('$noemp','$nom','$prenom','$emploi','$sup','$embauche','$sal','$comm','$noserv',date(sysdate()));";
            var_dump($requete);
            mysqli_query($conn, "INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
    VALUES('$noemp','$nom','$prenom','$emploi','$sup','$embauche','$sal','$comm','$noserv',date(sysdate()));");
        }
        ?>