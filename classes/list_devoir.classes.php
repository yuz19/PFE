<?php

class list_devoir extends Dbh{
    
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
        header("Location: ../../templates/prof/prof_devoir.php?&error=Error_requete");
        exit();
    }
    } 
    public function list_devoir($NSS){
        try{
        $stmt=$this->connect()->prepare('SELECT * FROM support_devoir WHERE NSS=?');
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
            header("Location: ../../templates/prof/acceuil.php?&error=Error_requete");
            exit();
        }
    }
}