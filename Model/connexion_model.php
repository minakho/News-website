<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=news', 'root','');

if(isset($_POST['formconnexion']))
{
    $maillogin = htmlspecialchars($_POST['maillogin']);
    $mdplogin = sha1($_POST['mdplogin']);
    if(!empty($maillogin) AND !empty($mdplogin))
    {
        //on voit si l'utilisateur existe bien donc on fait une requete sur l'utilisateur
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($maillogin, $mdplogin));
        //compter le nombre de ranger qui existe avec les info qu'a rentré les utilisateurs
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id_m'] = $userinfo['id_m'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            //rediriger vers le profil de la personne
            header("Location: View/membres/profil.php?id_m=".$_SESSION['id_m']);
        }
        else
        {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complétés !";
    }
}

?>