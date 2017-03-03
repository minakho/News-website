<?php
include ('Model/connexion_model.php');
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
                        <h2>Connexion</h2>
                    </div>
                    <label for="mail">Mail</label>
                    <br/>
                    <span ><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input type="email" name="maillogin" placeholder="Mail"/>
                    <br/>
                    
                    <label for="password">Mot de passe</label>
                    <br/>
                    <span ><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="password" name="mdplogin" placeholder="Mot de passe"/>
                    <br/>
                    <button type="submit" name="formconnexion" value="Se connecter">Valider</button>
                    <br/><br>
                   
                    <p> Vous êtes nouveau?</p> <a href="inscription.php"><strong> Inscrivez-vous</strong></a><br><br>
                      <p><a href="recuperation.view.php"><strong>Mot de passe oublié</strong></a></p> 
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

    </body>
    <footer class="tm-black-bg">
        <div class="container">
            <div class="row">
                <p class="tm-copyright-text">Copyright &copy; Sinakho 

                    | Contact <a rel="nofollow" href="http://www.templatemo.com" target="_parent">Sinakho michael</a></p>
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