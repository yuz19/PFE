<?php 
class offline extends Dbh{

    public function off(){
      
            $stm2=$this->connect()->prepare('UPDATE etudiant set status_online=0 WHERE matricule=?');
            if(!$stm2->execute(array($_SESSION['id']))){
                $stm2=null;
                header("Location: ../../templates/login.php?error=stmtfailed");
                exit();
            }
            
        
    }
}