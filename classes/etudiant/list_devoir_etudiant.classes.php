<?php

class list_devoir_etudiant extends Dbh{
    
   public function getDevoir($id){
    try{   
    $stmt=$this->connect()->prepare("SELECT * FROM support_devoir WHERE iddev=?");
    $stmt->execute(array($id));

    if($stmt->rowCount()==0){
        return null;
        } else{
                
            $publication=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=null;
            return $publication;
            
        }
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../../templates/etudiants/etudiant_devoir_prof.php?&error=Error_requete");
        exit();
    }
    }    
    public function  list_devoir_prof($Codesection,$NSS,$Codemodule,$type){
        try{
        $stmt=$this->connect()->prepare('SELECT * FROM support_devoir,gestion WHERE gestion.Codesection= ? AND support_devoir.Codesection=? and  gestion.NSS=support_devoir.NSS and gestion.NSS=? and gestion.Codemodule=support_devoir.Codemodule AND gestion.Codemodule=? and gestion.type=? and gestion.type=support_devoir.type and gestion.Gp in (0,?)');
        $stmt->execute(array($Codesection,$Codesection,$NSS,$Codemodule,$type,$_SESSION['gp']));
   
        if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
             return $listes;
             
         }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/etudiants/etudiant_devoir_prof.php?&error=Error_requete");
            exit();
        }
    }
}