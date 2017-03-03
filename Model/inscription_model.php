<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=news', 'root','');

if(isset($_POST['forminscription']))
{
    //htmlspecialchars pour empecher les injections de code
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail =  htmlspecialchars($_POST['mail']);
        $mail2 =  htmlspecialchars($_POST['mail2']);
        //hachage du mdp
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        
        if(isset($_POST['f_sport'])){
            $f_sport = $_POST['f_sport'];
        }else{
            $f_sport = 0;
        }
         if(isset($_POST['f_eco'])){
            $f_eco = $_POST['f_eco'];
        }else{
            $f_eco = 0;
        }
         if(isset($_POST['f_pol'])){
            $f_pol = $_POST['f_pol'];
        }else{
            $f_pol = 0;
        }
         if(isset($_POST['f_tech'])){
            $f_tech = $_POST['f_tech'];
        }else{
            $f_tech = 0;
        }
        
    
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        

        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {
            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    //voir si le mail existe deja
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    //Compter le nombre de colonnes qui existe pour ce qu'on a entré avant
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {
                        
                        if($mdp == $mdp2)
                        {
                            $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, f_sport, f_eco, f_pol, f_tech) VALUES(?,?,?,?,?,?,?)");
                            $insertmbr->execute(array($pseudo, $mail, $mdp, $f_sport, $f_eco, $f_pol, $f_tech));
                            $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                        }
                        else
                        {
                            $erreur = "Vos mdp ne correspondent pas !";
                        }
                    }
                    else
                    {
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                }
                else
                {
                    $erreur = "votre adresse mail n'est pas valide!";
                }
            }
            else
            {
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas depasser 255 caracteres ! ";;
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complété !";
    }
}

?>