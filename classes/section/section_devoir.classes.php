<?php
class section_devoir extends Dbh{
 
    public function lisection_unique($id){
 
        $stmt=$this->connect()->prepare('SELECT DISTINCT Codesection,Codemodule,Gp,type FROM gestion where NSS=?  ');
     
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
}