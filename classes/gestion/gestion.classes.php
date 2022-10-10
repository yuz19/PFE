<?php
class gestion extends Dbh{
    public function __construct(){

    }
    public function listGestion(){
        try{
            $stmt=$this->connect()->prepare('SELECT * FROM gestion');
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
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/administrateur/acceuil.php?&error=Error_requete");
            exit();
        }
 
    }
    protected function ajouter_gestion($Codemodule,$nss,$Codesection,$Gp,$type){
        try{
            $stmt=$this->connect()->prepare('INSERT INTO gestion(Codemodule,Codesection,NSS,type,Gp) VALUES (?,?,?,?,?);');
 
           $stmt->execute(array($Codemodule,$Codesection,$nss,$type,$Gp));
      
            $stmt=null;
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/gestion.php?&error=Error_requete");
            exit();
        }
  
    }
 
    protected function modifier_gestion($Codemodule,$nss,$Codesection,$Gp,$type,$Codemodule_save,$nss_save,$Codesection_save,$Gp_save,$type_save){
  
        try{
                $stmt=$this->connect()->prepare('UPDATE  gestion set Codemodule=? , NSS=? , Codesection=? , Gp=? , type=? where Codemodule =? AND NSS=?AND Codesection=? AND Gp=? AND type=?');
         
        $stmt->execute(array($Codemodule,$nss,$Codesection,$Gp,$type,$Codemodule_save,$nss_save,$Codesection_save,$Gp_save,$type_save));
          
        

            $stmt=null;
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/gestion.php?&error=Error_requete");
            exit();
        }
 
    }

    public function verifier_exist($Codemodule,$nss,$Codesection,$Gp,$type){
        $stmt=$this->connect()->prepare('SELECT * FROM gestion WHERE Codemodule=? and NSS=? and Codesection=? and Gp=? and type=?');
        
        if(!$stmt->execute(array($Codemodule,$nss,$Codesection,$Gp,$type))){
            $stmt=null;
            header("Location: ../../templates/administrateur/modifier.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
  
}


