<?php
class get_user extends Dbh{

    public function get_use($id){
        $stmt=$this->connect()->prepare('SELECT * FROM etudiant where matricule=?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }      
        if($stmt->rowCount()>0){
        
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
          
             return     strtoupper($listes[0]['nom']).' '.ucfirst($listes[0]['prenom']);
             
         }else{
            $stmt=$this->connect()->prepare('SELECT * FROM enseignant where NSS=?');
            if(!$stmt->execute(array($id))){
                $stmt=null;
                header("Location: ../../templates/login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()>0){
        
                    
                $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
             
                return     strtoupper($listes[0]['Nom']).' '.ucfirst($listes[0]['prenom']);
            }
         }
    
    }
    public function if_photo_profil_existe($id){
        $stmt=$this->connect()->prepare('SELECT img_status FROM etudiant where matricule=?');
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }      
        if($stmt->rowCount()>0){
        
                    
             $liste=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
             $listes['etudiant']=$liste[0]['img_status'] ;
             return     $listes;
             
         }else{
            $stmt=$this->connect()->prepare('SELECT img_status FROM enseignant where NSS=?');
            if(!$stmt->execute(array($id))){
                $stmt=null;
                header("Location: ../../templates/login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()>0){
        
                    
                $liste=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
                $listes['enseignant']=$liste[0]['img_status']  ;
                return     $listes;
            }
         }
    
    }

}