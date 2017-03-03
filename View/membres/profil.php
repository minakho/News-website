
<?php
include ('../../Model/profil_model.php');

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
        <title>Dailynews</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="../../css/font-awesome.min.css" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet"> 
        <link href="../../css/flexslider.css" type='text/css' rel="stylesheet">
        <link href="../../css/style.css" type='text/css' rel="stylesheet">

    </head>
    <body class="tm-gray-bg">
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
                            <li><a href="modif.php?id_m=<?php echo $_SESSION['id_m']; ?>">Mes favoris</a></li>
                        </ul>
                    </nav>				
                </div>
            </div>	  	
        </div>
        <div class="tm-header">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-2 col-sm-0 tm-site-name-container">
                        <a href="#" class="tm-site-name">DailyNews</a>	
                    </div>
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="mobile-menu-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                            <ul>
                                <li><a href="profil.php?id_m=<?php echo $_SESSION['id_m']; ?>" class="active">Accueil</a></li>
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

        <!-- white bg -->
        <section class="tm-white-bg section-padding-bottom background">
           <?php echo '<div class="col-lg-6 col-md-offset-3 col-sm-12"><div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Bienvenue <i class="fa fa-user" aria-hidden="true"></i> <strong>'.$userinfo['pseudo'].' !</strong> 
                            </div></div>' ?>
            
            <div class="container">
                
                <div class="row">
                    <?php
                    if(($favori1 || $favori2 || $favori3 || $favori4) ==1)
                    {
                    if($favori1 == 1){
                        include('../../Controller/class_favori/sport_favori.php');
                        $feedlist = new sport_favori('http://www.lemonde.fr/sport/rss_full.xml');
                        echo $feedlist->display(8, "<div class=\"section2 \">
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>
                        <div class=\"col-lg-4 col-md-6 col-sm-6\"><h2 class=\"tm-section-title\">sport</h2></div>
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>	
                    </div>	");
                        }
                        if($favori2 == 1){
                        include('../../Controller/class_favori/eco_favori.php');
                            $feedlist = new eco_favori('http://www.lemonde.fr/economie/rss_full.xml');
                            echo $feedlist->display(8, "<div class=\"section2 \">
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>
                        <div class=\"col-lg-4 col-md-6 col-sm-6\"><h2 class=\"tm-section-title\">economie</h2></div>
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>	
                    </div>");
                        }
                        if($favori3 == 1){
                        include('../../Controller/class_favori/pol_favori.php');
                            $feedlist = new pol_favori('http://www.lemonde.fr/politique/rss_full.xml');
                            echo $feedlist->display(8, "<div class=\"section2  \">
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>
                        <div class=\"col-lg-4 col-md-6 col-sm-6\"><h2 class=\"tm-section-title\">politique</h2></div>
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>	
                    </div>");
                        }
                        if($favori4 == 1){
                        include('../../Controller/class_favori/tech_favori.php');
                            $feedlist = new tech_favori('http://www.lemonde.fr/technologies/rss_full.xml');
                            echo $feedlist->display(8, "<div class=\"section2  \">
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>
                        <div class=\"col-lg-4 col-md-6 col-sm-6\"><h2 class=\"tm-section-title\">technologies</h2></div>
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>	
                    </div>");
                        }
                    }
                    else{
                    include('../../Controller/membre/une_class.php');
                    $feedlist = new une('http://www.lemonde.fr/m-actu/rss_full.xml');
                    echo $feedlist->display(8, "<div class=\"section2  \">
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>
                        <div class=\"col-lg-4 col-md-6 col-sm-6\"><h2 class=\"tm-section-title\">a la une</h2></div>
                        <div class=\"col-lg-4 col-md-3 col-sm-3\"><hr></div>	
                    </div>");
                    }
                    ?>
                </div>
            </div>
        </section>


        <!-- white bg -->
        <section class="tm-gray-bg section-padding-bottom">
            <div class="container">

                <div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tm-section-divers section-margin-top title-margin">
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-6 col-md-3 col-sm-6"><a href="View/techpage.php"><h5 ><center>SPORT</center> </h5></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
                        </div>	
                        <div class="tm-about-box-1">
                            <a href="#"><img src="../../img/sport.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>
                            <?php
                            include('../../Controller/sport.php');
                            $feedlist = new sport('http://www.lemonde.fr/sport/rss_full.xml');
                            echo $feedlist->display(5, "");
                            
                            ?>

                        </div>			
                    </div>

                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tm-section-divers section-margin-top title-margin">
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-6 col-md-3 col-sm-6"><a href="View/techpage.php"><h5 ><center>ECONOMIE</center> </h5></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
                        </div>	
                        <div class="tm-about-box-1">
                            <a href="#"><img src="../../img/economie.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>

                            <?php
                            include('../../Controller/eco.php');
                            $feedlist = new eco('http://www.lemonde.fr/economie/rss_full.xml');
                            echo $feedlist->display(5, "");

                            ?>


                        </div>			
                    </div>
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tm-section-divers section-margin-top title-margin">
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-6 col-md-3 col-sm-6"><a href="View/techpage.php"><h5 ><center>POLITIQUE</center> </h5></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
                        </div>	
                        <div class="tm-about-box-1">
                            <a href="#"><img src="../../img/politique.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>
                            <?php
                            include('../../Controller/politique.php');
                            $feedlist = new pol('http://www.lemonde.fr/politique/rss_full.xml');
                            echo $feedlist->display(5, "");

                            ?>

                        </div>			
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tm-section-divers section-margin-top title-margin">
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-6 col-md-3 col-sm-6"><a href="View/techpage.php"><h5 ><center>TECHNOLOGIES</center> </h5></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
                        </div>	
                        <div class="tm-about-box-1">
                            <a href="#"><img src="../../img/media.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>
                            <?php
                            include('../../Controller/techno.php');
                            $feedlist = new techno('http://www.lemonde.fr/politique/rss_full.xml');
                            echo $feedlist->display(5, "");

                            ?>

                        </div>			
                    </div>
                </div>		
            </div>
        </section>



        <footer class="tm-black-bg">
            <div class="container">
                <div class="row">
                    <p class="tm-copyright-text">Copyright &copy; Sinakho 

                        | Contact <a rel="nofollow" href="http://www.templatemo.com" target="_parent">Sinakho michael</a></p>
                </div>
            </div>	
            <?= $_SESSION['pseudo']?>	
        </footer>
        <script type="text/javascript" src="../../js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
        <script type="text/javascript" src="../../js/moment.js"></script>							<!-- moment.js -->
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>					<!-- bootstrap js -->
        <script type="text/javascript" src="../../js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="../../js/templatemo-script.js"></script>      		<!-- Templatemo Script -->

    </body>
</html>
<?php
}
else
{
    
}
?>