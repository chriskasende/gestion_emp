<?php
include_once(__DIR__ . "/../model/Employe.php");
include_once(__DIR__ . "/commonDAO.php");


class EmployeDAO extends CommonDAO
{


  //function ajout_emp($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm)
  //{
  //$conn = mysqli_connect('localhost', 'root', '', 'newtest');

  // $requete = "INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
  //VALUES('$noemp','$nom','$prenom','$emploi','$sup','$embauche','$sal','$comm','$noserv',date(sysdate()));";
  //  var_dump($requete);
  //mysqli_query($conn, "INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
  //VALUES('$noemp','$nom','$prenom','$emploi','$sup','$embauche','$sal','$comm','$noserv',date(sysdate()));");
  //}
  //function supprime_emp($id)
  //{

  //$bdd = mysqli_init();
  // mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");
  //$insert = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$id';");
  //mysqli_close($bdd);
  //}
  //function ajout_modif($sup, $noemp, $noserv, $nom, $prenom, $emploi, $embauche, $sal, $comm)
  //{
  //$bdd = mysqli_connect('localhost', 'root', '', 'newtest');
  //$modifier = mysqli_query($bdd, "UPDATE employes SET nom ='$nom'  , prenom ='$prenom' , emploi ='$emploi' ,sup = '$sup', embauche = '$embauche',sal = '$sal' , comm ='$comm', noserv ='$noserv', WHERE noemp = '$noemp';");
  //}

  //-----------------------------------
  public function ajout_emp(Employe $objet)
  {
    $mysqli = parent::connexionBDD();
    $nom = $objet->getNom();
    $prenom = $objet->getPrenom();
    $emploi = $objet->getEmploi();
    $sup = $objet->getSup();
    $embauche = $objet->getEmbauche();
    $sal = $objet->getSal();
    $comm = $objet->getComm();
    $noserv = $objet->getNoserv();
    $stmt = $mysqli->prepare("INSERT INTO employes(noemp,nom,prenom,emploi,sup,embauche,sal,comm,noserv,date_ajout) 
    VALUES (?,?,?,?,?,?,?,?,?,?);");
    $stmt->bind_param("isssisddis", $id, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $date_ajout);
    $stmt->execute();
    $mysqli->close();
  }
  public function tabSup(): array
  {
    $mysqli = parent::connexionBdd();
    $stmt = $mysqli->prepare("SELECT DISTINCT sup FROM employes;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $tabSup = $rs->fetch_all(MYSQLI_ASSOC);
    $rs->free();
    $mysqli->close();
    return $tabSup;
  }

  public function supprime($noemp)
  {
    $mysqli = parent::connexionBdd();
    $stmt = $mysqli->prepare("DELETE FROM employes WHERE noemp =?;");
    $stmt->bind_param("i", $noemp);
    $stmt->execute();
    $mysqli->close();
  }

  public function ajout_modif(Employe $objet)
  {
    $mysqli = parent::connexionBdd();
    $nom = $objet->getNom();
    $prenom = $objet->getPrenom();
    $emploi = $objet->getEmploi();
    $sup = $objet->getSup();
    $embauche = $objet->getEmbauche();
    $sal = $objet->getSal();
    $comm = $objet->getComm();
    $noserv = $objet->service->setService();
    $stmt = $mysqli->prepare("UPDATE employes SET 
        nom=?,
        prenom=?,
        emploi=?,
        sup=?,
        embauche=?,
        sal=?,
        comm=?,
        noserv=?, WHERE noemp = ?;");
    $stmt->bind_param(
      "sssisddi",
      $nom,
      $prenom,
      $emploi,
      $sup,
      $embauche,
      $sal,
      $comm,
      $noserv,
    );
    $stmt->execute();
    $mysqli->close();
  }

  public function detail(int $id)
  {
    $mysqli = parent::connexionBdd();
    $stmt = $mysqli->prepare("SELECT * FROM employes as e INNER JOIN services AS s ON e.noserv = s.noserv WHERE noemp =?;");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $rs = $stmt->get_result();
    $tabEmploye = $rs->fetch_array(MYSQLI_ASSOC);

    $objet = new Employe;
    $objet->setNoemp($tabEmploye["noemp"]);
    $objet->setNom($tabEmploye["nom"]);
    $objet->setPrenom($tabEmploye["prenom"]);
    $objet->setEmploi($tabEmploye["emploi"]);
    $objet->setSup($tabEmploye["sup"]);
    $objet->setEmbauche($tabEmploye["embauche"]);
    $objet->setSal($tabEmploye["sal"]);
    $objet->setComm($tabEmploye["comm"]);
    $objet->service->setNoserv($tabEmploye["noserv"]);
    $objet->service->setService($tabEmploye["service"]);
    $objet->service->setVille($tabEmploye["ville"]);

    $mysqli->close();
    return $objet;
  }
  public function searchByNoemp(int $noemp): Employe
  {
    $mysqli = parent::connexionBDD();
    $sql = "SELECT* FROM employes WHERE noemp= " . $noemp . ";";
    $rs = $mysqli->query($sql);
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $employe = (new Employe())->setNoemp($data[0]["NOEMP"])->setNom($data[0]["NOM"]);
    $rs->free();
    $mysqli->close();
    return $employe;
  }

  public function recupTabEmploye(): array
  {
    //connecte à la bdd
    $mysqli = parent::connexionBDD();
    //représente le tableau de tout les employes 
    $sql = "SELECT* FROM employes; ";
    //traitement de la requete,$rs contient le résultat

    $rs = $mysqli->query($sql);

    $data = $rs->fetch_all(MYSQLI_ASSOC);
    //
    $rs->free();
    //se déconnecte de la bdd
    $mysqli->close();
    //initialistion d'un nouveau tableau
    $tabemp = [];
    foreach ($data as $value) {
      $employe = (new Employe())->setNoemp($value["noemp"]->setNom($value["nom"])->setPrenom($value["prenom"])->set->Emploi($value["emploi"])->setSup($value["sup"])
        ->setEmbauche($value["embauche"])->setSal($value["sal"])->setComm($value["comm"])->setNoserv($value["noserv"]));
      $tabemp[] = $employe;
    }
    return $tabemp;
  }
}
