<?php
function chargerClass($classe)
{
  require $classe . ".php";
}
spl_autoload_register('chargerClass');
$db = new PDO('mysql:host=127.0.0.1;dbname=Universite', 'root', 'Zawji@2801');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$etuService = new Etudiant_Service($db);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>DevFolio Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Datatable/css/dataTables.bootstrap.min.css">
  <script src="JQuery/jquery-3.3.1.min.js"></script>
  <script src="Datatable/js/jquery.dataTables.min.js"></script>
  <script src="Datatable/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">Sonatel Academy</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="presentation.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#etu">Etudiants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#bourse">Boursiers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#nonbourse">Non Boursiers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#loger">Logers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#recherche">Recherche</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Listes</h2>

        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  <!--/ Section Contact-Footer Star /-->


  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="etu">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="post-box">
            <h3 class="title-left">
              voici la liste des etudiants
            </h3>
            
            <table id="Boursiers" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>matricule</th>
                  <th>nom</th>
                  <th>prenom</th>
                  <th>date de naissance</th>
                  <th>telephone</th>
                  <th>adresse email</th>
                </tr>
              </thead>
              <tbody>
                <?php
               

                foreach ($etuService->findAll("Etudiant") as $donnes) {

                  echo '<tr>
                 <td>' . $donnes->matricule . '</td>
                 <td>' . $donnes->nom_etudiant . '</td>
                 <td>' . $donnes->prenom_etudiant . '</td>
                 <td>' . $donnes->date_naiss . '</td>
                 <td>' . $donnes->telephone . '</td>
                 <td>' . $donnes->email . '</td>
                 </tr>';
                }




                /* $etudiant=new Etudiant_Boursier("a12","diop","mack","2011-05-03","774512","bbi@gmail.com","1");
          $etuService->add($etudiant);  
          var_dump($etudiant); */
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-wrapper sect-pt4" id="bourse">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-comments">
            <div class="title-box-2">
              <h3 class="title-left">
                voici la liste des etudiants Boursiers
              </h3>
            </div>

            <table id="Boursiers"class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>matricule</th>
                  <th>nom</th>
                  <th>prenom</th>
                  <th>date de naissance</th>
                  <th>telephone</th>
                  <th>adresse email</th>
                  <th>Pansion</th>

                </tr>
              </thead>
              <tbody>
                <?php



                foreach ($etuService->find() as $donnes) {

                  echo '<tr>
             <td>' . $donnes->matricule . '</td>
             <td>' . $donnes->nom_etudiant . '</td>
             <td>' . $donnes->prenom_etudiant . '</td>
             <td>' . $donnes->date_naiss . '</td>
             <td>' . $donnes->telephone . '</td>
             <td>' . $donnes->email . '</td>
             <td>' . $donnes->libelle . '</td>

             </tr>';
                }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!--/ Section Blog-Single End /-->
  <section class="blog-wrapper sect-pt4" id="nonbourse">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="post-box">
            <h3 class="title-left">
              voici la liste des etudiants Non Boursiers
            </h3>
            <table id="Boursiers"class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>matricule</th>
                  <th>nom</th>
                  <th>prenom</th>
                  <th>date de naissance</th>
                  <th>telephone</th>
                  <th>adresse email</th>
                  <th>adresse</th>


                </tr>
              </thead>
              <tbody>
                <?php


                foreach ($etuService->findb() as $donnes) {

                  echo '<tr>
            <td>' . $donnes->matricule . '</td>
            <td>' . $donnes->nom_etudiant . '</td>
            <td>' . $donnes->prenom_etudiant . '</td>
            <td>' . $donnes->date_naiss . '</td>
            <td>' . $donnes->telephone . '</td>
            <td>' . $donnes->email . '</td>
            <td>' . $donnes->adresse . '</td>

            </tr>';
                }

                ?>
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>

  </section>
  <section class="blog-wrapper sect-pt4" id="loger">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-comments">
            <div class="title-box-2">
              <h3 class="title-left">

                voici la liste des etudiants Logers

              </h3>
            </div>
            <table id="Boursiers" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>matricule</th>
                  <th>nom</th>
                  <th>prenom</th>
                  <th>date de naissance</th>
                  <th>telephone</th>
                  <th>adresse email</th>
                  <th>numero chambre</th>
                  <th>nom batiment</th>

                </tr>
              </thead>
              <tbody>
                <?php


                foreach ($etuService->findl() as $donnes) {

                  echo '<tr>
            <td>' . $donnes->matricule . '</td>
            <td>' . $donnes->nom_etudiant . '</td>
            <td>' . $donnes->prenom_etudiant . '</td>
            <td>' . $donnes->date_naiss . '</td>
            <td>' . $donnes->telephone . '</td>
            <td>' . $donnes->email . '</td>
            <td>' . $donnes->id_chambre . '</td>
            <td>' . $donnes->nom_batiment . '</td>

            </tr>';
                }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-wrapper sect-pt4" id="recherche">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="widget-sidebar sidebar-search">
            <h2><strong  class="sidebar-title">Statuts:</strong></h2>
            <div class="sidebar-content">
        <div class="container admin">
            <div class="row">
              <form class="form-signin" action="liste.php#recherche" method="Post">
               <div class="input-group form-group">
                 <input type="text" id="inputNumber" class="form-control" aria-label="Search for..." placeholder="Matricule" name="Matricule" >
                 <input  name="recherche" class="btn btn-secondary btn-search" type="submit" value="Rechercher">
               </div>
              </form>
            <?php 
                      
                     
                     
                         $db = new PDO('mysql:host=127.0.0.1;dbname=Universite', 'root', 'Zawji@2801');
                         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                         $etuService = new Etudiant_Service($db);

                        if(isset($_POST["recherche"])){
                          $Mat=$_POST["Matricule"];
                        //verification matricule
                        $reque= $db->query("SELECT * FROM Etudiant WHERE matricule='".$Mat."'"); 
                        while($donnes=$reque->fetch()){
                          $idEtudiant=$donnes['id_etudiant'];
                        }
                         
//============================================================================
                        $requetlog=$db->query("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,libelle ,Logers.id_chambre,nom_batiment FROM Etudiant,Logers,Chambres,Batiments,Boursiers,Types WHERE Logers.id_etudiant='".$idEtudiant."' AND Etudiant.id_etudiant='".$idEtudiant."'  AND Batiments.id_batiment=Chambres.id_batiment AND Logers.id_chambre=Chambres.id_chambre AND Boursiers.id_type=Types.id_type");
                        $requetlog->execute();
                       
                          
                        if ( $requetlog->execute()==true ) {
            
                          while($apprenant=$requetlog->fetch()){
                              ?>
                         </table>    
                         <table id="Boursiers"class="table table-striped table-bordered" >
               
                          <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Bourses</th>
                            <th>NºChambres</th>
                            <th>Batiments</th>
                          </thead>
                           
                          <?php
                        echo'<tr>
                        
                         <td>'. $apprenant['matricule'].'</td>
                         <td>'. $apprenant['nom_etudiant'].'</td>
                         <td>'. $apprenant['prenom_etudiant'].'</td>
                         <td>'. $apprenant['date_naiss'].'</td>
                         <td>'. $apprenant['telephone'].'</td>
                         <td>'. $apprenant['email'].'</td>
                         <td>'. $apprenant['libelle'].'</td>
                         <td>'. $apprenant['id_chambre'].'</td> 
                         <td>'. $apprenant['nom_batiment'].'</td> ';
                             
                          break;
                          }
                        }
                      

//=========================================================================
                     
                      
                        $requetb= $db->query("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,libelle FROM Etudiant,Boursiers,Types  where Boursiers.id_type=Types.id_Type  AND Boursiers.id_etudiant ='".$idEtudiant."' AND Etudiant.id_etudiant='".$idEtudiant."'  ");
                        $requetb->execute();
                           while($apprenant=$requetb->fetch()){
                             ?>
                         <table id="Boursiers"class="table table-striped table-bordered" >
               
                          <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Bourses</th>
                          </thead>
                           
                           <?php
                            
                           echo'<tr>
                        
                           <td>'. $apprenant['matricule'].'</td>
                           <td>'. $apprenant['nom_etudiant'].'</td>
                           <td>'. $apprenant['prenom_etudiant'].'</td>
                           <td>'. $apprenant['date_naiss'].'</td>
                           <td>'. $apprenant['telephone'].'</td>
                           <td>'. $apprenant['email'].'</td>
                           <td>'. $apprenant['libelle'].'</td>';
                          break;
                          } 
                        
                      
//=========================================================================================
                        $requetnob=$db->query("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,adresse,adresse FROM Etudiant,Non_boursiers WHERE  Non_boursiers.id_etudiant='".$idEtudiant."' AND Etudiant.id_etudiant='".$idEtudiant."'");
                          while($apprenant=$requetnob->fetch()){
                              ?>
                        </table> 
                             <table id="Boursiers" class="table table-striped table-bordered" >
                              <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Adresse</th>
                             </tr>
                          </thead>
                             <?php
                          
                        echo'<tr>
                        
                        <td>'. $apprenant['matricule'].'</td>
                        <td>'. $apprenant['nom_etudiant'].'</td>
                        <td>'. $apprenant['prenom_etudiant'].'</td>
                        <td>'. $apprenant['date_naiss'].'</td>
                        <td>'. $apprenant['telephone'].'</td>
                        <td>'. $apprenant['email'].'</td>
                          <td>'. $apprenant['adresse'].'</td> 
                          </tr>';

                   
                          }
//===========================================================================================
                        }
                          ?>
                          </table>
                           <?php
                    ?>
              </div>
        </div>
   

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>Joile@Mariama95</strong>.Sonatel Academy</p>
              <div class="credits">
                Designed by JuniorLaye07
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>

  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
    $(document).ready(function() {
        $('#Boursiers').DataTable();
    } );
</script>
</body>

</html>