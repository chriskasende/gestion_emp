<?php$user = mysqli_query($bdd, "INSERT INTO users (id,pseudo,mail,pass ) 
            SELECT MAX(id)+1, " . "'" . $_POST['pseudo'] . "','" . $_POST['mail'] . "','" . $mdp . " ' FROM users;");


include_once(__DIR__."/../model/Employe.php");
include_once(__DIR__ ."commonDAO.php");
 
class UserDAO extends CommonDAO{

  public function tabusers():array{
      $mysqli= parent::connexionBDD();
      $stmt=$mysqli->prepare("SELECT* FROM users");
  }"SELECT hash, email, status FROM utilisateur WHERE email='$email';"

}