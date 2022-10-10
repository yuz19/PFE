<?php
class section extends Dbh{
/*
    public function lispecialite_unique(){
 
        $stmt=$this->connect()->prepare('SELECT CodeSP FROM specialite');
     
        if(!$stmt->execute(array())){
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
    public function lniveauSp_unique(){
        $stmt=$this->connect()->prepare('SELECT Niveau_specialité FROM specialite');
        
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $niveaux_sp=null; 
        }else{
            $niveaux_sp=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=null;
        
        }
        return $niveaux_sp;
    }*/
    
    public function lisection_unique(){
        try{
            $stmt=$this->connect()->prepare('SELECT DISTINCT (Codesection) FROM section');
        
            $stmt->execute(array());
        
            if($stmt->rowCount()==0){
                $sections=null; 
            }else{
                $sections=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
            
            }
            return $sections;
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/acceuil.php?&error=Error_requete");
            exit();
        }
    }
    public function lisection(){
    try{
        $stmt=$this->connect()->prepare('SELECT * FROM section');
     
        $stmt->execute(array());
    
        if($stmt->rowCount()==0){
            $sections=null; 
        }else{
            $sections=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=null;
        
        }
        return $sections;
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../templates/administrateur/section.php?&error=Error_requete");
        exit();
    }
    }
  
    protected function ajouter_section($Codesection,$Gp){
    try{
        $stmt=$this->connect()->prepare('INSERT INTO section (Codesection,Gp) VALUES (?,?);');
        
        $stmt->execute(array($Codesection,$Gp));

    
        $stmt=null;
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../templates/administrateur/section.php?&error=Error_requete");
        exit();
    }

    }

    protected function modifier_section($Codesection,$Gp,$codesection_save,$group_save){
    try{
    if($Codesection==$codesection_save and $Gp!=$group_save){
        $stmt_verifier=$this->connect()->prepare('SELECT * FROM section WHERE Gp=? and Codesection=?');

        $stmt_verifier->execute(array($Gp,$Codesection));

        if($stmt_verifier->rowCount()==0){
            $stmt=$this->connect()->prepare('UPDATE section set Gp=? WHERE Codesection=? and Gp=? ');
        
            $stmt->execute(array($Gp,$Codesection,$group_save));
      
        }
    }
        
    
        if($Codesection!=$codesection_save and $Gp==$group_save){
            $stmt_verifier=$this->connect()->prepare('SELECT * FROM section WHERE Gp=? and Codesection=?');

            $stmt_verifier->execute(array($Gp,$Codesection));
    
            if($stmt_verifier->rowCount()==0){
                $stmt=$this->connect()->prepare('UPDATE section set Codesection=? WHERE Codesection=? and Gp=? ');
            
                $stmt->execute(array($Codesection,$codesection_save,$Gp));

            }
        }
          
        $stmt=null;
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../templates/administrateur/section.php?&error=Error_requete");
        exit();
    }
            
    }
    #$stmt_verifier=$this->connect()->prepare('SELECT * FROM section WHERE Gp=?')
  
    
    public function verifier_exist($Codesection,$Gp){
        try{

      
        $stmt=$this->connect()->prepare('SELECT * FROM section WHERE Codesection=? and Gp=?');
        
        $stmt->execute(array($Codesection,$Gp));

        if($stmt->rowCount()>0){
            return true;
        }else{
            return false;
        }
           }catch(PDOException $e){
        $stmt=null;
        header("Location: ../templates/administrateur/section.php?&error=Error_requete");
        exit();
    }
    }

}