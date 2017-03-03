
<?php
include ('../../Model/profil_model.php');
include ('../../Model/inscription_model.php');


if(isset($_GET['id_m']) AND $_GET['id_m'] > 0)
{
    $getid_m = intval($_GET['id_m']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id_m = ?');
    $requser->execute(array($getid_m));
    $userinfo = $requser->fetch();
    $favori1 = $userinfo['f_sport'];
    $favori2 = $userinfo['f_eco'];
    $favori3 = $userinfo['f_pol'];
    $favori4 = $userinfo['f_tech'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Holiday - templatemo</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="../../css/font-awesome.min.css" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet"> 
        <link href="../../css/flexslider.css" type='text/css' rel="stylesheet">
        <link href="../../css/style.css" type='text/css' rel="stylesheet">

    
    </head>
    <body>
        <!-- Header -->
        <div class="tm-header1">
            <div class="container">
                <div class="row">
                    <nav class="tm-nav1 ">
                        <ul>

                            <?php
    if(isset($_SESSION['id_m']) AND $userinfo['id_m'] == $_SESSION['id_m'])
    {
                            ?>

                            <li> <a href="deconnexion.php"> se deconnecter</a></li>       
                            <?php  
    }
                            ?>
                            <li><a href="modif.php?id_m=<?php echo $_SESSION['id_m']; ?>" class="active">Mes favoris</a></li>
                        </ul>
                    </nav>				
                </div>
            </div>	  	
        </div>

        <div class="tm-header">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-3 tm-site-name-container">
                        <a href="index.php" class="tm-site-name">DailyNews</a>	
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-9">
                        <div class="mobile-menu-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                            <ul>
                                <li><a href="profil.php?id_m=<?php echo $_SESSION['id_m']; ?>">Accueil</a></li>
                                <li><a href="membresport.php?id_m=<?php echo $_SESSION['id_m']; ?>">Sport</a></li>
                                <li><a href="membreeco.php?id_m=<?php echo $_SESSION['id_m']; ?>">Economie</a></li>
                                <li><a href="membrepol.php?id_m=<?php echo $_SESSION['id_m']; ?>">Politiques</a></li>
                                <li><a href="membretech.php?id_m=<?php echo $_SESSION['id_m']; ?>">Technologies</a></li>
                            </ul>
                        </nav>		
                    </div>				
                </div>
            </div>	  	
        </div>


        <div class="img-background">
            <div class="container register">
                <div class="row">

                    <div class="register-box">
                        <div class="register-box-header">
                            <h2>Modification favoris</h2>
                        </div>
                        <form class="form-horizontal" method="POST" action="../../Model/update.php">


    <label for="">Mes favoris :</label>
    <div class="form-check">
       
        <div><p><strong>Sport</strong></p>
           <?php
            if($userinfo['f_sport'] == 0){
            ?>
            <label  class="form-check-label">ajouter
                <input type="checkbox" value="1" class="form-check-input" name="ajoutersport">
            </label>
            <?php
            }else {
                
            
            ?>
            <label for="" class="form-check-label"> retier
                <input type="checkbox" value="0" class="form-check-input" name="retirersport">
            </label>
            <?php
            }
            ?>
        </div>
        <div><p><strong>Economie</strong></p>
           <?php
            if($userinfo['f_eco'] == 0){
                
            
            ?>
            <label  class="form-check-label">ajouter
                <input type="checkbox" value="1" class="form-check-input" name="ajoutereco">
            </label>
            <?php
            }else {
 
            ?>
            <label for="" class="form-check-label"> retier
                <input type="checkbox" value="0" class="form-check-input" name="retirereco">
            </label>
            <?php
            }
            ?>
        </div>
        <div><p><strong>Politique</strong></p>
           <?php
            if($userinfo['f_pol'] == 0){

            ?>
            <label  class="form-check-label">ajouter
                <input type="checkbox" value="1" class="form-check-input" name="ajouterpol">
            </label>
            <?php
            }else {
 
            ?>
            <label for="" class="form-check-label"> retier
                <input type="checkbox" value="0" class="form-check-input" name="retirerpol">
            </label>
            <?php
            }
            ?>
        </div>
        <div><p><strong>Technologie</strong></p>
           <?php
            if($userinfo['f_tech'] == 0){

            ?>
            <label  class="form-check-label">ajouter
                <input type="checkbox" value="1" class="form-check-input" name="ajoutertech">
            </label>
            <?php
            }else { 
            ?>
            <label for="" class="form-check-label"> retier
                <input type="checkbox" value="0" class="form-check-input" name="retirertech">
            </label>
            <?php
            }
            ?>
        </div>
       
    </div>
    <br>
    <div >
        <button type="submit" name="modifier" value="Se connecter">Valider</button>
    </div>
</form>
                        <?php
    if(isset($erreur))
    {
        echo '<font color="red">'.$erreur.'</font>';
    }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </body>
    <footer class="tm-black-bg">
        <div class="container">
            <div class="row">
                <p class="tm-copyright-text">Copyright &copy; Sinakho 

                    | Contact <a rel="nofollow" href="../contact.php" target="_parent">Sinakho michael</a></p>
            </div>
        </div>		
    </footer>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
    <script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->

    </body>
</html>
<?php
}
else
{

}
?>