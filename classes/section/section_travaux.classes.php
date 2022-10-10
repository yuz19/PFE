<?php
class section_travaux extends Dbh{
 
    public function lisection_unique($id){
 
        $stmt=$this->connect()->prepare('SELECT DISTINCT Codesection,Codemodule FROM gestion where NSS=? and type<>"cour" ');
     
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $sections=null; 
        }else{
            $sections=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=null;
        
        }
        return $sections;
    }
    public function get_group($id){
        $stmt=$this->connect()->prepare('SELECT  Codesection,Gp,Codemodule FROM gestion where NSS=? and type<>"cour"');
     
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $GP=null; 
        }else{
            $GP=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=null;
        
        }
        return $GP;
    }
}