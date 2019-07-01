<?php
//echo "bonjour";
class Etudiant_Service
{
  private $db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }
  

  public function add(Etudiant $perso) //ajout d'un Etudiant dans la base
  {
    $q = $this->db->prepare('INSERT INTO Etudiant
                                           SET
                                              matricule  = :matricule,
                                              nom_etudiant        = :nom_etudiant,
                                              prenom_etudiant     = :prenom_etudiant,
                                              date_naiss = :date_naiss,
                                              telephone     = :telephone,
                                              email      = :email
                                              ');
    $q->bindValue(':matricule', $perso->getMatricule(), PDO::PARAM_STR);
    $q->bindValue(':nom_etudiant', $perso->getNom_etudiant(), PDO::PARAM_STR); //la fonction bindValue retourne un bouléen true si ok false sinon
    $q->bindValue(':prenom_etudiant', $perso->getPrenom_etudiant(), PDO::PARAM_STR);
    $q->bindValue(':date_naiss', $perso->getDate_naiss(), PDO::PARAM_STR);
    $q->bindValue(':telephone', $perso->getTelephone(), PDO::PARAM_INT);
    $q->bindValue(':email', $perso->getEmail(), PDO::PARAM_STR);

    $q->execute();

    //recupere Id Dun  etudiant
    $q = $this->db->query("SELECT MAX(id_etudiant) as id_etudiant FROM Etudiant ");
    while ($datas = $q->fetch()) {
      $id = $datas['id_etudiant'];
    }

    
    //INSERTION Dun ETUDIANT NON BOURSIER
    if (get_class($perso) == "Etudiant_NonBoursier") {
      $adresse = $perso->getAdresse();
      $req = $this->db->prepare('INSERT INTO Non_boursiers
                          set id_etudiant = :id_etudiant,
                              adresse    = :adresse');
      $req->bindValue(':id_etudiant', $id);
      $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }
    // INSERTION DUN ETUDIANT BOURSIER
     elseif (get_class($perso) == "Etudiant_Boursier" ) {
      $id_type = $perso->getId_type();
      $req = $this->db->prepare("INSERT INTO Boursiers (id_etudiant,id_type)
                          Values ( :id_etudiant,:id_type)");
      $req->bindValue(':id_etudiant', $id);
      $req->bindValue(':id_type', $id_type);
      $req->execute();

    // INSERTION DE LOGER
     
     
      if( get_class($perso) == "Etudiant_Loge"){
      $id_chambre = $perso->getId_chambre();
      $req = $this->db->prepare("INSERT INTO Logers (id_etudiant, id_chambre  ) 
                            VALUES(:id_etudiant,:id_chambre)");
      $req->bindValue(':id_etudiant', $id);
      $req->bindValue(':id_chambre', $id_chambre);
      $req->execute();
    
      $req->closeCursor();
    }
  }
   

   
}
  public function findAll($table)
  {
    $req = $this->db->prepare("SELECT *FROM $table");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
  }
  public function find()
  {
    $req = $this->db->prepare("SELECT *FROM Boursiers,Etudiant,Types WHERE Etudiant.id_etudiant=Boursiers.id_etudiant AND Types.id_type=Boursiers.id_type");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
  }
  public function findb()
  {
    $req = $this->db->prepare("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,adresse FROM Non_boursiers,Etudiant WHERE Etudiant.id_etudiant=Non_boursiers.id_etudiant  ");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
  }
  public function findl()
  {
    $req = $this->db->prepare("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,Logers.id_chambre,nom_batiment FROM Chambres,Batiments,Logers,Etudiant WHERE Etudiant.id_etudiant=Logers.id_etudiant AND Batiments.id_batiment=Chambres.id_batiment AND Logers.id_chambre=Chambres.id_Chambre");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
  }
}


/* else if ($_POST['type']==2) {
  $req=$db->prepare("SELECT id_type FROM Type where libelle='Demi_Bourse'");
  while($datas=$req->fetch()){
    $b=$datas['id_type'];  
  }
    $req=$this->db->prepare('INSERT INTO Boursier
                          set id_etudiant = :id_etudiant,
                              id_type    = :id_type');
 $req->bindValue(':id_etudiant', $id);
 $req->bindValue(':id_type',$b);
  }
  $req->execute();
  $req->closeCursor();
}

 */

// Methode de selection de toute la liste des personnages
  //public function getListEtudiant() {
  //$persos=array() ;
  
  //$req = $this->db->query('SELECT id_etudiant,matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email
    //                      FROM Etudiant ');
   // while($datas=$req->fetchAll()){
    //  $persos=$datas;
    //}

   //var_dump($persos);

  //}
//}
  //$req->closeCursor();
//}
