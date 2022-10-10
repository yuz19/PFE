<?php
class etudiant extends Dbh{
    public function __construct(){

    }
    public function listetud(){
        try{
            $stmt=$this->connect()->prepare('SELECT * FROM etudiant');
            $stmt->execute(array());
       
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
    public function get_etudiant($matricule){
        $stmt=$this->connect()->prepare('SELECT * FROM etudiant where matricule=?');
        if(!$stmt->execute(array($matricule))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }      if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
          
             return     strtoupper($listes[0]['nom']).' '.ucfirst($listes[0]['prenom']);
             
         }
    
    }
    public function get_AllInfo_etudiant($matricule){
        $stmt=$this->connect()->prepare('SELECT * FROM etudiant where matricule=?');
        if(!$stmt->execute(array($matricule))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }      if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
          
             return    $listes;
             
         }
    
    }
 
}

