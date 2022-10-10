<?php
class section_cour extends Dbh{
 
    public function lisection_unique($id){
        try{
            $stmt=$this->connect()->prepare('SELECT DISTINCT Codesection,Codemodule FROM gestion where NSS=? and type="cour" ');
        
            $stmt->execute(array($id));
 
            if($stmt->rowCount()==0){
                $sections=null; 
            }else{
                $sections=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
            
            }
            return $sections;
        }catch(PDOException $e){
            $stmt=null; 
            header("Location: ../../templates/prof/prof_cours.php?error=Error_requete");
            exit();
        }
    }
}