<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>News - Politique</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
  <link href="../css/flexslider.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

 
  </head>
  <body class="tm-gray-bg">
   <!-- Header -->
        <div class="tm-header1" id="top">
            <div class="container">
                <div class="row">
                    <nav class="tm-nav1 ">
                        <ul>
                            <li><a href="../inscription.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inscription</a></li>
                            <li><a href="../connexion.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></li>
                        </ul>
                    </nav>				
                </div>
            </div>	  	
        </div>
       
  	<!-- Header -->
  <div class="tm-header" >
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-2 col-sm-3 tm-site-name-container">
                        <a href="#" class="tm-site-name">DailyNews</a>	
                    </div>
                    <div class="col-lg-8 col-md-10 col-sm-9">
                        <div class="mobile-menu-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                            <ul>
                                <li><a href="../index.php" >Accueil</a></li>
                                <li><a href="sportpage.php" >Sport</a></li>
                                <li><a href="ecopage.php">Economie</a></li>
                                <li><a href="polpage.php" class="active" >Politiques</a></li>
                                <li><a href="techpage.php" >Technologies</a></li>
                            </ul>
                        </nav>		
                    </div>				
                </div>
            </div>	  	
        </div>




	<!-- white bg -->
	<section class="tm-white-bg section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">Politique</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="row">
				<!-- Testimonial -->
				<div class="col-md-12 col-md-offset-1">
					<div class="tm-what-we-do-right">
    
						 <?php
                            include('../Controller/mainpol.php');
                            $feedlist = new mainpol('http://www.lemonde.fr/politique/rss_full.xml');
                            echo $feedlist->display(15, "");

                            ?>
                           
					</div>
					
				</div>							
			</div>			
		</div>
	</section>
	 <!-- Bouton scrollTop -->
        <a href="#top" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2084 Your Company Name 
                
                | Contact <a rel="nofollow" href="contact.php" target="_parent">Sinakho michael</a></p>
			</div>
		</div>		
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="../js/scroll.js"></script>
	<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="../js/bootstrap.min.js"></script>					<!-- bootstrap js -->
  	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
  	<script type="text/javascript" src="../js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
  	<script type="text/javascript" src="http://codysherman.com/tools/infinite-scrolling/code"></script>  
	
 </body>
 </html>
