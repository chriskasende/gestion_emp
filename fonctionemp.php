<?php
$conn = mysqli_connect('localhost', 'root', '', 'newtest');
$noemp = $nom = $prenom =  $emploi = $sup = $embauche = $sal = $comm = $noserv  = $date_ajout  = null;
$isThereError = false;
$message = "";
$nomRegex = "#[A-Za-z\é\è\ê\-]+$#";
// $nomRegex = "#[A-Za-z-]+$#";
$noempRegex = "#^[0-9]{4}$#";
if (isset($_POST['bouttonAjout'])) {
    echo " inscrit";
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
            ajout_emp($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm);

            // Renvoi vers l'index
            // header("Refresh: 3;URL=gestion.php");
        }
    }
} ?>

<body>
    <?php

    mysqli_close($conn);
    if (isset($_POST['buttonAjout']) && !$isThereError) {
    ?> <div class=" alerte-success">Employé ajouté ! </div>
    <?php
    } elseif (isset($_POST['buttonAjout']) && $isThereError) {
    ?> <div class=" alerte-danger">L'ajout a échoué</div>
    <?php
    }
    ?>




    <form action="" method="post">
        <div class="form">
            <legend>Entrez vos informations</legend>

            <div class="form-group">
                <label for="noemp" class="form-label">Noemp</label> :
                <input type="text" class="form-control" name="noemp" placeholder="numéro d'employé" maxlength="4" value="<?php echo $noemp ?>">
                <span class="comments text-danger font-italic"><?php echo $message ?></span>
            </div>


            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="prenom" placeholder="Votre Nom" required value="<?php echo $nom ?>">
                <span class="comments text-danger font-italic"><?php echo $message ?></span>

            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="nom" placeholder="Votre Prénom" required value="<?php echo $prenom ?>">
                <span class="comments text-danger font-italic"><?php echo $message ?></span>

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

</html>
<?php
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