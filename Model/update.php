<?php
require_once('profil_model.php');

if(isset($_POST['modifier'])){

    $sql = "UPDATE `membres` SET ";
    if(isset($_POST['ajoutersport'])){
        $sql .="`f_sport` = :addsport, ";

    }elseif(isset($_POST['retirersport'])){
            $sql .="`f_sport` = :delsport, ";
        }

    if(isset($_POST['ajoutereco'])){
        $sql .="`f_eco` = :addeco, ";

    }elseif(isset($_POST['retirereco'])){
            $sql .="`f_eco` = :deleco, ";
        }
    
    if(isset($_POST['ajouterpol'])){
        $sql .="`f_pol` = :addpol, ";

    }elseif(isset($_POST['retirerpol'])){
            $sql .="`f_pol` = :delpol, ";
        }
    
    if(isset($_POST['ajoutertech'])){
        $sql .="`f_tech` = :addtech, ";

    }elseif(isset($_POST['retirertech'])){
            $sql .="`f_tech` = :deltech, ";
        }
    
    $sql .="`null` = null WHERE `membres`.`id_m` = :id";
    $stmt = $bdd->prepare($sql);
    if(isset($_POST['ajoutersport'])){
         $stmt->bindValue(":addsport", $_POST['ajoutersport']);

    }elseif(isset($_POST['retirersport'])){
             $stmt->bindValue(":delsport", $_POST['retirersport']);
        }
     if(isset($_POST['ajoutereco'])){
        $stmt->bindValue(":addeco", $_POST['ajoutereco']);

    }elseif(isset($_POST['retirereco'])){
            $stmt->bindValue(":deleco", $_POST['retirereco']);
        }
    if(isset($_POST['ajouterpol'])){
        $stmt->bindValue(":addpol", $_POST['ajouterpol']);

    }elseif(isset($_POST['retirerpol'])){
            $stmt->bindValue(":delpol", $_POST['retirerpol']);
        }
   if(isset($_POST['ajoutertech'])){
        $stmt->bindValue(":addtech", $_POST['ajoutertech']);

    }elseif(isset($_POST['retirertech'])){
            $stmt->bindValue(":deltech", $_POST['retirertech']);
        }
   

    $stmt->bindValue(":id", $_SESSION['id_m']);
    $stmt->execute();
    
   header("Location:../View/membres/profil.php?id_m=".$_SESSION['id_m']);
}
?>
