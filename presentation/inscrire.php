<?php
session_start();
$bdd = mysqli_init();
mysqli_real_connect($bdd, "127.0.0.1", "chris", "123456789", "newtest");
//$bdd = new PDO("mysql:host=localhost;dbname=newtest", "chris", "123456789");
if (isset($_POST["forminscription"])) {
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    //$mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);

    if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {


        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

            $user = mysqli_query($bdd, "INSERT INTO users (id,pseudo,mail,pass ) 
            SELECT MAX(id)+1, " . "'" . $_POST['pseudo'] . "','" . $_POST['mail'] . "','" . $mdp . " ' FROM users;");



            echo "votre compte a bien été créer";
        } else {
            echo "email non valide";
        }
    } else echo "création compte non valide";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>inscription</title>
</head>

<body>
    <div style="text-align:center">
        <h2>Inscription</h2>
        <br /><br>
    </div>
    <form method="POST" action="">
        <table>
            <tr>
                <td style="text-align:right">
                    <label for="speudo"> Pseudo : </label>
                </td>
                <td>
                    <input type="text" placeholder="votre pseudo" id="pseudo" name="pseudo" value="<?php if (isset($pseudo)) {
                                                                                                        echo $pseudo;
                                                                                                    } ?>" />
                </td>
            </tr>
            <tr>
                <td style="text-align:rigth">
                    <label for="mail">Mail</label>
                </td>
                <td>
                    <input type="email" placeholder="enter email" id="mail" name="mail" value="<?php if (isset($mail))   echo $mail ?>" />
                </td>
            </tr>
            <tr>
                <td style="text-align:rigth">
                    <label for="mdp">Mot de passe :</label>
                </td>
                <td>
                    <input type="password" placeholder="enter your password" id="mdp" name="mdp" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td style="text-align:center"><br />
                    <input type="submit" name="forminscription" value="sign in" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($error)) {
        echo '<font color="red">' . $error . "</font>";
    }
    ?>
    </div>


</body>

</html>