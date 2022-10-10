<?php

class list_cour_etudiant extends Dbh{
    
   public function getcour($id){
    try{
    $stmt=$this->connect()->prepare("SELECT * FROM support_cours WHERE idcours=?");
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
        header("Location: ../../templates/etudiants/etudiant_cours_prof.php?error=Error_requete");
        exit();
    }
    } 
    public function  list_cour($Codesection,$NSS,$codemodule){
        try{
        $stmt=$this->connect()->prepare('SELECT * FROM support_cours,gestion WHERE gestion.Codesection= ? AND support_cours.Codesection=gestion.Codesection and gestion.NSS=support_cours.NSS and gestion.NSS=?  and gestion.Codemodule=? and gestion.type="cour"');
        $stmt->execute(array($Codesection,$NSS,$codemodule));

        if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
             return $listes;
             
         }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/etudiants/etudiant_cours_prof.php?&error=Error_requete");
            exit();
        }
    }
}