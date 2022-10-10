<?php

class list_travaux_prof extends Dbh{
    
   public function get_travaux_prof($id){
      try{ 
    $stmt=$this->connect()->prepare("SELECT * FROM support_td_tp WHERE idtd_tp=?");
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
        header("Location: ../../templates/prof/travaux.php?error=Error_requete");
        exit();
    }
    }
    public function get_travaux_etudiant($id){
        try{ 
      $stmt=$this->connect()->prepare("SELECT * FROM support_td_tp WHERE idtd_tp=?");
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
          header("Location: ../../templates/etudiants/travaux_prof.php?error=Error_requete");
          exit();
      }
      }

    public function list_travaux_prof($id){
        try{
        $stmt=$this->connect()->prepare('SELECT * FROM support_td_tp WHERE  NSS=?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
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