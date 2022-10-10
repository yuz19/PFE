<?php

class list_cour extends Dbh{
    
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
        header("Location: ../../templates/prof/prof_cours.php?error=Error_requete");
        exit();
    }
    } 
    public function list_cour($NSS){
        try{
        $stmt=$this->connect()->prepare('SELECT * FROM support_cours WHERE NSS=?');
        $stmt->execute(array($NSS));
 
        if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
             return $listes;
             
         }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/prof/acceuil.php?error=Error_requete");
            exit();
        }
    }
}