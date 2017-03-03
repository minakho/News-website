<?php
include ('../../Model/profil_model.php');
?>
<?php
if(isset($_GET['id_m']) AND $_GET['id_m'] > 0)
{
    $getid_m = intval($_GET['id_m']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id_m = ?');
    $requser->execute(array($getid_m));
    $userinfo = $requser->fetch();

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
    <body class="tm-gray-bg" id="top">
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
                            <li><a href="modif.php?id_m=<?php echo $_SESSION['id_m']; ?>" >Mes favoris</a></li>
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
                                <li><a href="profil.php?id_m=<?php echo $_SESSION['id_m']; ?>" >Accueil</a></li>
                                <li><a href="membresport.php?id_m=<?php echo $_SESSION['id_m']; ?>">Sport</a></li>
                                <li><a href="membreeco.php?id_m=<?php echo $_SESSION['id_m']; ?>">Economie</a></li>
                                <li><a href="membrepol.php?id_m=<?php echo $_SESSION['id_m']; ?>"class="active">Politiques</a></li>
                                <li><a href="membretech.php?id_m=<?php echo $_SESSION['id_m']; ?>">Technologies</a></li>
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
                            include('../../Controller/membre/pol_class.php');
                            $feedlist = new pol_class('http://www.lemonde.fr/politique/rss_full.xml');
                            echo $feedlist->display(15, "");

                            ?>
                            <!-- PARTAGE <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
							<a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
							<a href="#" class="tm-social-icon"><i class="fa fa-pinterest"></i></a>
							<a href="#" class="tm-social-icon"><i class="fa fa-google-plus"></i></a> -->
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
                
                | Contact <a rel="nofollow" href="../contact.php" target="_parent">Sinakho michael</a></p>
			</div>
		</div>		
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	 <script type="text/javascript" src="../../js/scroll.js"></script>
	<script type="text/javascript" src="../../js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>					<!-- bootstrap js -->
  	<script type="text/javascript" src="../../js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
  	<script type="text/javascript" src="../../js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
  	<script type="text/javascript" src="http://codysherman.com/tools/infinite-scrolling/code"></script>  
	
 </body>
 </html>
 <?php
}
else
{

}
?>
