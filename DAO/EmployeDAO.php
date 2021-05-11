<?php
include_once(__DIR__ . "/../model/Employe.php");
include_once("commonDAO.php");


class EmployeDAO extends CommonDAO
{


  function ajout_emp($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm)
  {
    $conn = mysqli_connect('localhost', 'root', '', 'newtest');

    $requete = "INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
VALUES('$noemp','$nom','$prenom','$emploi','$sup','$embauche','$sal','$comm','$noserv',date(sysdate()));";
    var_dump($requete);
    mysqli_query($conn, "INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
VALUES('$noemp','$nom','$prenom','$emploi','$sup','$embauche','$sal','$comm','$noserv',date(sysdate()));");
  }
  function supprime_emp($id)
  {

    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");
    $insert = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$id';");
    mysqli_close($bdd);
  }
  function ajout_modif($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm)
  {
    $bdd = mysqli_connect('localhost', 'root', '', 'newtest');
    $modifier = mysqli_query($bdd, "UPDATE employes SET nom ='$nom'  , prenom ='$prenom' , emploi ='$emploi' ,sup = '$sup', embauche = '$embauche',sal = '$sal' , comm ='$comm', noserv ='$noserv', WHERE noemp = '$noemp';");
  }
}
