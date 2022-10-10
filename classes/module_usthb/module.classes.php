<?php
class module extends Dbh{
    public function __construct(){

    }
    public function listmod(){
        try{
            $stmt=$this->connect()->prepare('SELECT * FROM module');
            $stmt->execute(array());
 
            if($stmt->rowCount()==0){
                   return null;
            }else{         
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
    protected function ajouter_module($module,$titre,$coeficient,$unit){
        try{
            $stmt=$this->connect()->prepare('INSERT INTO module(Codemodule,Titre,Coeficient,Unite) VALUES (?,?,?,?);');
 
            $stmt->execute(array($module,$titre,$coeficient,$unit));
            $stmt=null;  

        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/module.php?&error=Error_requete");
            exit();
        }
 
    }
    protected function modifier_module($module,$module_save,$titre,$coeficient,$unit){
        try{

        
        if($module==$module_save){
            $stmt=$this->connect()->prepare('UPDATE  module set Titre=?,Coeficient=?,Unite=?  where Codemodule=?');
            
            $stmt->execute(array($titre,$coeficient,$unit,$module));
    
            $stmt=null;
        }else{
          
            $stmt=$this->connect()->prepare('SELECT * FROM  module where Codemodule=?');
         
            $stmt->execute(array($module));
       
       
            if($stmt->rowCount()==0){
                $stmt=$this->connect()->prepare('UPDATE  module set Codemodule=?,Titre=?,Coeficient=?,Unite=? where Codemodule =?');
         
                $stmt->execute(array($module,$titre,$coeficient,$unit,$module_save));
            
            }

            $stmt=null;
        }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/module.php?&error=Error_requete");
            exit();
        }
    }

    public function verifier_exist($Codemodule){
        try{

        
            $stmt=$this->connect()->prepare('SELECT * FROM module WHERE Codemodule=?');
            
            if(!$stmt->execute(array($Codemodule))){
                $stmt=null;
                header("Location: ../../templates/administrateur/modifier.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()>0){
                return true;
            }else{
                return false;
        }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/administrateur/module.php?&error=Error_requete");
            exit();
        }
    }
}