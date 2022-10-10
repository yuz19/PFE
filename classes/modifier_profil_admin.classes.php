<?php 
class modifier_profil_admin extends Dbh{
    
    protected function setprofil($id,$uid,$pwd,$email,$save_pwd){
    
        if($save_pwd==$pwd){
              $stmt=$this->connect()->prepare('UPDATE  administrateur set Username=?,email=? where NSS =?');
              #$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
              if(!$stmt->execute(array($uid,$email,$id))){
                  $stmt=null;
                  header("Location: ../../templates/administrateur/profil.php?error=stmtfailed");
                  exit();
              }
              $stmt=null;
           }else{
              $stmt=$this->connect()->prepare('UPDATE  administrateur set Username=?,email=? ,password=? where NSS =?');
              
              $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
              if(!$stmt->execute(array($uid,$email,$hashedPwd,$id))){
                  $stmt=null;
                  header("Location: ../../templates/administrateur/profil.php?error=stmtfailed");
                  exit();
              }
              $stmt=null;
          }
        }
        protected function checkUserExist($email,$uid,$id,$save_email,$save_uid){
     

            $resultCheckmail=false;
            if($email!=$save_email){
                $stmt=$this->connect()->prepare('SELECT *FROM administrateur WHERE email=?');
                if(!$stmt->execute(array($email))){
                 $stmt=null;
                 header("Location: ../../templates/administrateur/profil.php?error=stmtfailed");
                 exit();
                }
                if( $stmt->rowCount()>0 ) {
                    $resultCheckmail=true;
                }else{
                    $resultCheckmail=false;
                }
                $stmt=null;
            }
            $resultCheckuid=false;
            if($uid!=$save_uid){
                $stmt=$this->connect()->prepare('SELECT *FROM administrateur WHERE Username=?  ');
                if(!$stmt->execute(array($uid))){
                 $stmt=null;
                 header("Location: ../../templates/administrateur/profil.php?error=stmtfailed");
                 exit();
                }
                if( $stmt->rowCount()>0 ) {
                    $resultCheckuid=true;
                }else{
                    $resultCheckuid=false;
                }
                $stmt=null;
            }
            
            $stmt=$this->connect()->prepare('SELECT *FROM enseignant WHERE  email=? or Username=?');
            if(!$stmt->execute(array($email,$uid))){
             $stmt=null;
             header("Location: ../../templates/administrateur/profil.php?error=stmtfailed");
             exit();
            }
            $stmt2=$this->connect()->prepare('SELECT *FROM etudiant WHERE  email=? or Username=?');
            if(!$stmt->execute(array($email,$uid))){
             $stmt=null;
             header("Location: ../../templates/administrateur/profil.php?error=stmtfailed");
             exit();
            }
         
                   
        
            if( $resultCheckmail==true or $resultCheckuid==true or $stmt->rowCount()>0 or $stmt2->rowCount()>0 ) {
                $resultCheck=true;
            }else{
                $resultCheck=false;
            }

  
       
              return   $resultCheck;
        }
}