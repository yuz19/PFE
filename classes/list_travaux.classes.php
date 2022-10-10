<?php

class list_travaux extends Dbh{
    
   public function get_travaux($id){
 
    $stmt=$this->connect()->prepare("SELECT * FROM support_td_tp WHERE idtd_tp=?");
    if(!$stmt->execute(array($id))){
        $stmt=null;
        header("Location: ../../templates/login.php?error=stmtfailed");
        exit();
    }
    if($stmt->rowCount()==0){
        return null;
        } else{
                
            $publication=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=null;
            return $publication;
            
        }
 
    } 
    public function list_travaux($codesection,$gp,$NSS,$Codemodule){
        try{
        $stmt=$this->connect()->prepare('SELECT * FROM support_td_tp,gestion WHERE gestion.Codesection=? and gestion.Codesection=support_td_tp.Codesection   and support_td_tp.Gp=?  and gestion.Gp=support_td_tp.Gp and gestion.NSS=support_td_tp.NSS and gestion.NSS=? and gestion.Codemodule=?');
        if(!$stmt->execute(array($codesection,$gp,$NSS,$Codemodule))){
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
            header("Location: ../../templates/etudiants/etudiant_travaux_prof.php?&error=Error_requete");
            exit();
        }
    }
   
}