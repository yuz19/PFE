<?php
class modifier_prof extends Dbh{
    
     //verifier ppassword  avant ca
    protected function setUser_sameNSS($nss,$nom,$prenom,$uid,$pwd,$grade,$numTel,$email,$img_status,$save_nss,$save_pwd){
      try{
        if($save_pwd==$pwd){
            $stmt=$this->connect()->prepare('UPDATE enseignant set Nom=?,Prenom=?,Username=?,grade=?,numTel=?,img_status=?,email=? where NSS=?');
            #$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
            if(!$stmt->execute(array($nom,$prenom,$uid,$grade,$numTel,$img_status,$email,$nss))){
                $stmt=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            $stmt=null;
         }else{
            $stmt=$this->connect()->prepare('UPDATE enseignant set Nom=?,Prenom=?,Username=?,grade=?,numTel=?,img_status=?,email=?,password=? where NSS=?');
            $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
            if(!$stmt->execute(array($nom,$prenom,$uid,$grade,$numTel,$img_status,$email,$hashedPwd,$save_nss))){
                $stmt=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            $stmt=null;
        }
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../../templates/administrateur/prof.php?&error=Error_requete");
        exit();
    }
    }

    protected function setUser_DiffNSS($nss,$nom,$prenom,$uid,$pwd,$grade,$numTel,$email,$img_status,$save_nss,$save_pwd){
        if($save_pwd==$pwd){
            $stmt=$this->connect()->prepare('UPDATE enseignant set NSS=?,Nom=?,Prenom=?,Username=?,grade=?,numTel=?,img_status=?,email=? where NSS=?');
            if(!$stmt->execute(array($nss,$nom,$prenom,$uid,$grade,$numTel,$img_status,$email,$save_nss))){
                $stmt=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            $stmt=null;
        }else{
            $stmt=$this->connect()->prepare('UPDATE enseignant set NSS=?,Nom=?,Prenom=?,Username=?,grade=?,numTel=?,img_status=?,email=?,password=? where NSS=?');
            $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
            if(!$stmt->execute(array($nss,$nom,$prenom,$uid,$grade,$numTel,$img_status,$email,$hashedPwd,$save_nss))){
                $stmt=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            $stmt=null;
        }
       
      
        #;

 
    }
 

        protected function checkUserExist($uid,$nss,$save_nss,$email,$save_uid,$save_email){
        if($save_nss!=$nss){
            $stmt =$this->connect()->prepare('SELECT * FROM enseignant WHERE  NSS=? ');
            if(!$stmt->execute(array($nss))){
                $stmt=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()>0){    
                $resultCheck_nss=true;
            }else{
               $resultCheck_nss=false;
            }
        }else{
            $resultCheck_nss=false;
        }
            //check if email is change and if yes check if its already used
        if($email!=$save_email){
            $stmt3=$this->connect()->prepare('SELECT *FROM enseignant WHERE  NSS<>? and email=? ');
            if(!$stmt3->execute(array($nss,$email))){
                $stmt3=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            
             
            if($stmt3->rowCount()>0){
                $resultCheck_mail=true;
            }else{
                $resultCheck_mail=false;
            }
        }else{
            $resultCheck_mail=false;
        }
          //check if username is change and if yes check if its already used
        if($uid!=$save_uid){
            $stmt5=$this->connect()->prepare('SELECT *FROM enseignant WHERE  NSS<>? and Username=? ');
            if(!$stmt5->execute(array($nss,$uid))){
                $stmt5=null;
                header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
                exit();
            }
            
            if($stmt5->rowCount()>0){
                $resultCheck_uid=true;
            }else{
                $resultCheck_uid=false;
            }
        }else{
            $resultCheck_uid=false; 
        }
         $stmt2=$this->connect()->prepare('SELECT *FROM administrateur WHERE  username=? or NSS=? or email=?');
  
       
        $stmt4=$this->connect()->prepare('SELECT *FROM etudiant WHERE username=? or  email=?');
  
        if(!$stmt2->execute(array($uid,$nss,$email))){
            $stmt2=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }  
 

        if(!$stmt4->execute(array($uid,$email))){
            $stmt4=null;
            header("Location: ../../templates/administrateur/prof.php?error=stmtfailed");
            exit();
        }

        if( $stmt2->rowCount()>0 or $stmt4->rowCount()>0 or $resultCheck_mail==true or $resultCheck_nss==true or $resultCheck_uid==true) {
            $resultCheck=true; 
        }else{
            $resultCheck=false;
        }
        return   $resultCheck;
    }
    
 
   
}