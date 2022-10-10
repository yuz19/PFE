<?php
class reponsedevoir extends Dbh{
    public function __construct(){

    }
    public function listreponsedevoir(){
        $stmt=$this->connect()->prepare('SELECT * FROM reponse_devoir');
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
    public function Inforeponsedevoir($iddv,$matricule){
        $stmt=$this->connect()->prepare('SELECT * FROM reponse_devoir where iddev=? and matricule=?');
        if(!$stmt->execute(array($iddv,$matricule))){
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

    public function delete($id,$matricule){

        $stmt=$this->connect()->prepare('DELETE  FROM reponse_devoir where iddev=? and matricule=?' );
        if(!$stmt->execute(array($id,$matricule))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }else{
            unlink("../uploads/reponse_devoir/file-".$matricule."-".$id.".png");
            unlink("../uploads/reponse_devoir/file-".$matricule."-".$id.".pdf");
            unlink("../uploads/reponse_devoir/file-".$matricule."-".$id.".jpg");
        }

       
    }


    public function getreponsedevoir($iddv){
        $stmt=$this->connect()->prepare('SELECT * FROM reponse_devoir where iddev=?' );
        if(!$stmt->execute(array($iddv))){
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
    
    protected function ajouter_reponse($iddev,$file,$matricule){
  
        $stmt=$this->connect()->prepare('INSERT INTO reponse_devoir(iddev,matricule,nom_file) VALUES (?,?,?);');
 
        if(!$stmt->execute(array($iddev,$matricule,$file))){
            $stmt=null;
            header("Location: ../../templates/administrateur/etudiant.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }/*
    protected function modifier_module($module,$module_save,$titre,$coeficient,$unit){
        if($module==$module_save){
            $stmt=$this->connect()->prepare('UPDATE  module set Titre=?,Coeficient=?,Unite=?  where Codemodule=?');
            
            if(!$stmt->execute(array($titre,$coeficient,$unit,$module))){
                $stmt=null;
                header("Location: ../../templates/administrateur/etudiant-modifier.php?error=stmtfailed");
                exit();
            }
            $stmt=null;
        }else{
          
            $stmt=$this->connect()->prepare('SELECT * FROM  module where Codemodule=?');
         
            if(!$stmt->execute(array($module))){
                $stmt=null;
                header("Location: ../../templates/administrateur/etudiant-modifier.php?error=stmtfailed");
                exit();
            }
       
            if($stmt->rowCount()==0){
                $stmt=$this->connect()->prepare('UPDATE  module set Codemodule=?,Titre=?,Coeficient=?,Unite=? where Codemodule =?');
         
                if(!$stmt->execute(array($module,$titre,$coeficient,$unit,$module_save))){
                    $stmt=null;
                    header("Location: ../../templates/administrateur/modifier.php?error=stmtfailed");
                    exit();
                }
            }

            $stmt=null;
        }
    }*/

    public function verifier_exist($iddev,$matricule){
        $stmt=$this->connect()->prepare('SELECT * FROM reponse_devoir WHERE iddev=? and matricule=?');
     
        if(!$stmt->execute(array($iddev,$matricule))){

        
            header("Location: ../../templates/etudiants/etudiant_devoir.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()>0){
            return false;
        }else{
            return true;
        }
        $stmt=null;
    }
}