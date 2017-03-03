<?php
include ('Model/recuperation.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>News - Connexion</title>
       
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/flexslider.css" type='text/css' rel="stylesheet">
        <link href="css/style.css" type='text/css' rel="stylesheet">

      

    </head>
    <body>
        <!-- Header -->
        <div class="tm-header1">
            <div class="container">
                <div class="row">
                    <nav class="tm-nav1 ">
                        <ul>
                            <li><a href="inscription.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inscription</a></li>
                            <li><a href="connexion.php" class="active"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></li>
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
                                <li><a href="index.php" >Accueil</a></li>
                                <li><a href="View/sportpage.php">Sport</a></li>
                                <li><a href="View/ecopage.php">Economie</a></li>
                                <li><a href="View/polpage.php">Politiques</a></li>
                                <li><a href="View/techpage.php">Technologies</a></li>
                            </ul>
                        </nav>		
                    </div>				
                </div>
            </div>	  	
        </div>


        <div class="img-background">
            <div class="container login">

                <div class="login-box ">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="box-header">
                            <h2>Récupération mot de passe</h2>
                            <?php if($section == 'code'){?>
                            Recuperation de mot de passe pour <?= $_SESSION['recup_mail'] ?>
                            <input type="email" placeholder="Code de verification" name="code_code" ><br>
                            <button type="submit" name="code_submit" value="Valider">Valider</button>
                            <?php } else {?>
                        </div><br>
                        <input type="email" placeholder="Votre adresse mail" name="recup_mail" ><br>
                        <button type="submit" name="recup_submit" value="Valider">Valider</button>
                    </form>
                    <?php } ?>
                    <?php
                    if(isset($erreur))
                    {
                        echo '<font color="red">'.$erreur.'</font>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </body>
    <footer class="tm-black-bg">
        <div class="container">
            <div class="row">
                <p class="tm-copyright-text">Copyright &copy; Sinakho 

                    | Contact <a rel="nofollow" href="View/contact.php" target="_parent">Sinakho michael</a></p>
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