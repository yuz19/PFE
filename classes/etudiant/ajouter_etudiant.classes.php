<?php
class ajouter_etudiant extends Dbh{
    
     
    protected function setUser($matricule,$nom,$prenom,$uid,$pwd,$email,$codesection,$group,$img_status){
        try{

            $stmt=$this->connect()->prepare('INSERT INTO etudiant(matricule,nom,prenom,email,Codesection,Gp,Username,password,img_status) VALUES (?,?,?,?,?,?,?,?,?);');
            $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
            $stmt->execute(array($matricule,$nom,$prenom,$email,$codesection,$group,$uid,$hashedPwd,$img_status));
            $stmt=null;

        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/etudiant.php?error=Error_requete");
            exit();
        }
       
    }

    
    
    protected function checkUserExist($uid,$email,$matricule){
        try{

            $stmt =$this->connect()->prepare('SELECT * FROM etudiant WHERE  Username=? or matricule=? or email=?;');
            $stmt2=$this->connect()->prepare('SELECT * FROM enseignant x,administrateur y WHERE  y.email=? or x.email=?');

            $stmt->execute(array($uid,$matricule,$email));
            $stmt2->execute(array($email,$email));
           
    
            if($stmt->rowCount()>0 or $stmt2->rowCount()>0){
                $resultCheck=true;
            }else{
                $resultCheck=false;
            }
            return   $resultCheck; 
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/etudiant.php?error=Error_requete");
            exit();
        }
    
    }
    protected function checkCodeSc($codesection){
        try{
            $stmt_sp =$this->connect()->prepare('SELECT *  FROM section WHERE  Codesection=? ');
        
            $stmt_sp->execute(array($codesection));
       
            
            if($stmt_sp->rowCount()>0){
                $resultCheck=true;
            }else{
                $resultCheck=false;   
            }

            return $resultCheck;
            
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/etudiant.php?error=Error_requete");
            exit();
        }
       
    }   
}