
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyNews</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/flexslider.css" type='text/css' rel="stylesheet">
        <link href="css/style.css" type='text/css' rel="stylesheet">


    </head>
    <body class="tm-gray-bg">
        <!-- Header -->
        <div class="tm-header1">
            <div class="container">
                <div class="row">
                    <nav class="tm-nav1 ">
                        <ul>
                            <li><a href="inscription.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inscription</a></li>
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
                        <a href="#" class="tm-site-name">DailyNews</a>	
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-9">
                        <div class="mobile-menu-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                            <ul>
                                <li><a href="index.php" class="active">Accueil</a></li>
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

        <!-- white bg -->
        <section class="tm-white-bg section-padding-bottom background">
            <div class="container">
                <div class="row">
                    <div class="tm-section-head section-margin-top section1">
                        <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
                        <div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">A la une</h2></div>
                        <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
                    </div>				
                </div>
                <div class="row">
                    <?php
                    include('Controller/rssclass.une.php');
                    $feedlist = new rss('http://www.lemonde.fr/m-actu/rss_full.xml');
                    echo $feedlist->display(8, "");
                    ?>
                </div>
            </div>
        </section>


        <!-- white bg -->
        <section class="tm-gray-bg section-padding-bottom">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="tm-section-divers section-margin-top ">
                            <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-4 col-md-3 col-sm-6"><a href="View/sportpage.php"><h5 ><center>SPORT</center></h5></a></div>
                            <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
                        </div>
                        <div class="tm-about-box-1 ">
                            <a href="View/sportpage.php"><img src="img/sport.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>
                            <?php
                            include('Controller/sport.php');
                            $feedlist = new sport('http://www.lemonde.fr/sport/rss_full.xml');
                            echo $feedlist->display(5, "");

                            ?>

                        </div>			
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tm-section-divers section-margin-top title-margin">
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-6 col-md-3 col-sm-6"><a href="View/ecopage.php"><h5 ><center>ECONOMIE</center> </h5></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
                        </div>	
                        <div class="tm-about-box-1">
                            <a  href="View/ecopage.php"><img src="img/economie.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>

                            <?php
                            include('Controller/eco.php');
                            $feedlist = new eco('http://www.lemonde.fr/economie/rss_full.xml');
                            echo $feedlist->display(5, "");

                            ?>


                        </div>			
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tm-section-divers section-margin-top title-margin">
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                            <div class="col-lg-6 col-md-3 col-sm-6"><a href="View/polpage.php"><h5 ><center>POLITIQUE</center> </h5></a></div>
                            <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>	
                        </div>	
                        <div class="tm-about-box-1">
                            <a  href="View/polpage.php"><img src="img/politique.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>
                            <?php
                            include('Controller/politique.php');
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
                            <a href="View/techpage.php"><img src="img/media.jpg" alt="img" class="tm-about-box-1-img img_responsive"></a>
                            <?php
                            include('Controller/techno.php');
                            $feedlist = new techno('http://www.lemonde.fr/technologies/rss_full.xml');
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