
<?php
// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO membres( id,pseudo, pass, mail) VALUES(:pseudo, :pass, :email)');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email
));
