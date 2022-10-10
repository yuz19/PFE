<?php
class ajouter_prof extends Dbh{
    
     
    protected function setUser($nss,$nom,$prenom,$uid,$pwd,$grade,$numTel,$email,$img_status){
 
        $stmt=$this->connect()->prepare('INSERT INTO enseignant(NSS,nom,prenom,grade,numtel,Username,password,email,img_status) VALUES (?,?,?,?,?,?,?,?,?);');
        $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($nss,$nom,$prenom,$grade,$numTel,$uid,$hashedPwd,$email,$img_status))){
            $stmt=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }

/*
    protected function checkUserExist($uid,$nss){
        $stmt =$this->connect()->prepare('SELECT * FROM enseignant WHERE  username=? or NSS=? ;');

        if(!$stmt->execute(array($uid,$nss))){
            $stmt=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }
      
        if($stmt->rowCount()>0){
            $resultCheck=true;
        }else{
            $resultCheck=false;
        }
        return   $resultCheck;
    }*/
    protected function checkUserExist($uid,$email,$nss){
        $stmt =$this->connect()->prepare('SELECT * FROM enseignant WHERE  username=? or nss=? or email=?;');
        $stmt2=$this->connect()->prepare('SELECT * FROM etudiant  WHERE  email=? or username=? ');
        $stmt3=$this->connect()->prepare('SELECT * FROM administrateur  WHERE email=? or username=? ');
        if(!$stmt->execute(array($uid,$nss,$email))){
            $stmt=null;
            header("Location: ../../templates/administrateur/etudiant.php?error=stmtfailed");
            exit();
        }
        if(!$stmt2->execute(array($email,$uid))){
            $stmt=null;
            header("Location: ../../templates/administrateur/etudiant.php?error=stmtfailed");
            exit();
        }
        if(!$stmt3->execute(array($email,$uid))){
            $stmt=null;
            header("Location: ../../templates/administrateur/etudiant.php?error=stmtfailed");
            exit();
        }


      
        if($stmt->rowCount()>0 or $stmt2->rowCount()>0 or $stmt3->rowCount()>0){
            $resultCheck=true;
        }else{
            $resultCheck=false;
        }
        return   $resultCheck;
    }
 
   
}