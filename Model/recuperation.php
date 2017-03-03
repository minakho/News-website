
<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=news', 'root','');

if(isset($_GET['section'])){
    $section = htmlspecialchars($_GET['section']);

} else{
    $section = "";
}
if(isset($_POST['recup_submit'],$_POST['recup_mail'])){
    if(!empty($_POST{'recup_mail'})){
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
        if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)){
            $mailexist = $bdd->prepare('SELECT id_m,pseudo FROM membres WHERE mail = ?');
            $mailexist->execute(array($recup_mail));
            $mailexist_count = $mailexist->rowCount();
            if($mailexist_count == 1){
                $pseudo = $mailexist->fetch();
                $pseudo = $pseudo['pseudo'];
               
                
                $_SESSION['recup_mail'] = $recup_mail;
                $recup_code = "";
                for ($i=0; $i < 8; $i++){
                    $recup_code .= mt_rand(0,9);
                }
             

                $mail_recup_exist = $bdd->prepare('SELECT id_m FROM recuperation WHERE mail = ?');
                $mail_recup_exist->execute(array($recup_mail));
                $mail_recup_exist = $mail_recup_exist->rowCount();

                if($mail_recup_exist == 1){
                    $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                    $recup_insert->execute(array($recup_code,$recup_mail));
                } else{
                    $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail,code) VALUES (?, ?)');
                    $recup_insert->execute(array($recup_mail,$recup_code));
                }

                $header="MIME-Version: 1.0\r\n";
                $header.='From:"Dailynews"<supportnews@gmail.com>'."\n";
                $header.='Content-Type:text/html; charset="utf-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Dailynews</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>

                     <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
                    Cliquez <a href="http://localhost:8080/Dailynews/recuperation.view.php?section="code&code='.$recup_code.'">ici</a> pour reinitialiser votre mot de passe.
                    

                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
                mail($recup_mail, "Récupération de mot de passe - PrimFX.com", $message, $header);

            } else{
                $erreur = "Cette adresse mail n'est pas enregistrée";
            }
        } else {
            $erreur = "Adresse mail invalide";
        }

    } else {
        $erreur = "Veuillez entrer votre adresse mail";
    }

}

?>
