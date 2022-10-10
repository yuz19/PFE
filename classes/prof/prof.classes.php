<?php
class prof extends Dbh{

    public function listprof(){
        $stmt=$this->connect()->prepare("SELECT * FROM enseignant");
        if(!$stmt->execute(array())){
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
    }
    public function getprof($nss){
        try{
            $stmt=$this->connect()->prepare("SELECT * FROM enseignant where NSS=?");
        
            $stmt->execute(array($nss));
      
            if($stmt->rowCount()==0){
                return null;
            } else{
                       
                $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
                return $listes[0]['Nom'].' '.$listes[0]['prenom'];
                
            }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/administrateur/dashboard_more.php?&error=Error_requete");
            exit();
        }
       
    }
    public function getprof_fromgestion($codesection,$type){
        $stmt=$this->connect()->prepare("SELECT NSS,Codemodule FROM gestion where Codesection=? and type=?");
        if(!$stmt->execute(array($codesection,$type))){
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
    }
    public function getprof_fromgestion_travaux($codesection,$Gp){
        $stmt=$this->connect()->prepare("SELECT NSS,Codemodule FROM gestion where Codesection=? and type=? and Gp=?");
        if(!$stmt->execute(array($codesection,'travaux',$Gp))){
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
    }
    public function getprof_fromdevoir($codesection){
        $stmt=$this->connect()->prepare("SELECT Distinct support_devoir.NSS,  gestion.Codemodule,gestion.type FROM support_devoir,gestion where support_devoir.Codesection=? and gestion.Codesection=support_devoir.Codesection AND gestion.NSS=support_devoir.NSS and gestion.Gp in (0,?)");
 
        if(!$stmt->execute(array($codesection,$_SESSION['gp']))){
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

    }
    public function get_AllInfo_Prof($nss){
        $stmt=$this->connect()->prepare("SELECT * FROM enseignant where NSS=?");
        if(!$stmt->execute(array($nss))){
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
    }
}