
<?php
include ('Model/inscription_model.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Holiday - templatemo</title>
        <!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/flexslider.css" type='text/css' rel="stylesheet">
        <link href="css/style.css" type='text/css' rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>
    <body>
        <!-- Header -->
        <div class="tm-header1">
            <div class="container">
                <div class="row">
                    <nav class="tm-nav1 ">
                        <ul>
                            <li><a href="inscription.php" class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inscription</a></li>
                            <li><a href="connexion.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></li>
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
            <div class="container register">
                <div class="row">

                    <div class="register-box">
                        <div class="register-box-header">
                            <h2>Inscription</h2>
                        </div>
                        <form class="form-horizontal" method="POST" action="#">

                            <div >
                                <label for="pseudo" class="cols-sm-2 control-label">Pseudo</label>
                                <div class="cols-sm-10">
                                    <div >
                                        <span ><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
                                    </div>
                                </div>
                            </div>

                            <div >
                                <label for="mail" class="cols-sm-2 control-label">Mail</label>
                                <div class="cols-sm-10">
                                    <div >
                                        <span ><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
                                    </div>
                                </div>
                            </div>

                            <div >
                                <label for="mail2" class="cols-sm-2 control-label">Confirmation du mail</label>
                                <div class="cols-sm-10">
                                    <div >
                                        <span ><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="email" placeholder="Confirmer votre adresse mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
                                    </div>
                                </div>
                            </div>

                            <div >
                                <label for="mdp" class="cols-sm-2 control-label">Mot de passe</label>
                                <div class="cols-sm-10">
                                    <div >
                                        <span ><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
                                    </div>
                                </div>
                            </div>

                            <div >
                                <label for="mdp2" class="cols-sm-2 control-label">Confirmation du mot de passe</label>
                                <div class="cols-sm-10">
                                    <div >
                                        <span><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" placeholder="Confirmer votre adresse mail" id="mdp2" name="mdp2">
                                    </div>
                                </div>
                            </div>
                            <label for="">Catégorie d'article en favori (optionnel):</label>
                            <div class="form-check">
                               
                                <label for="f_sport" class="form-check-label">
                                    sport
                                    <input type="checkbox" value="1" class="form-check-input" id="f_sport" name="f_sport">
                                   
                                </label>
                                <label for="f_eco" class="form-check-label">
                                   economie
                                    <input type="checkbox" value="1" class="form-check-input" id="f_eco" name="f_eco">
                                    
                                </label>
                                <label for="f_pol" class="form-check-label">
                                   politique
                                    <input type="checkbox" value="1" class="form-check-input" id="f_pol" name="f_pol">
                                    
                                </label>
                                <label for="f_tech" class="form-check-label">
                                   technologies
                                    <input type="checkbox" value="1" class="form-check-input" id="f_tech" name="f_tech">
                                    
                                </label>
                            </div>

                            <div >
                                <button type="submit" name="forminscription" value="Se connecter">Valider</button>
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