<?php
class modifier_etudiant extends Dbh{
    
 
  

    
  /*  
    protected function checkUserExist($matricule){
        $stmt =$this->connect()->prepare('SELECT * FROM etudiant WHERE  Matricule=?');
        
        if(!$stmt->execute(array($matricule))){
            $stmt=null;
            header("Location: ../../templates/sign.php?error=stmtfailed");
            exit();
        }
      
        if($stmt->rowCount()>0){
            $resultCheck=true;
        }else{
            $resultCheck=false;
        }
        return   $resultCheck;

    }*/
 
    protected function setUser_sameMatricule($matricule,$nom,$prenom,$uid,$pwd,$email,$codesection,$group,$img_status,$save_mat,$save_pwd){
      try{
        if($save_pwd==$pwd){
            
            $stmt=$this->connect()->prepare('UPDATE  etudiant set nom=?,prenom=?,Username=?,Gp=?,email=?,Codesection=?,img_status=? where Matricule =?');
            #$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
            $stmt->execute(array($nom,$prenom,$uid,$group,$email,$codesection,$img_status,$matricule));
         
            $stmt=null;
         }else{
            $stmt=$this->connect()->prepare('UPDATE  etudiant set nom=?,prenom=?,Username=?,Gp=?,email=? ,Codesection=?,img_status=?,password=? where matricule =?');
            
            $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
            $stmt->execute(array($nom,$prenom,$uid,$group,$email,$codesection,$img_status,$hashedPwd,$matricule));
        
            $stmt=null;
        }
       }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/administrateur/etudiant.php?&error=Error_requete");
            exit();
        }
    }

    protected function setUser_DiffMatricule($matricule,$nom,$prenom,$uid,$pwd,$email,$codesection,$group,$img_status,$save_mat,$save_pwd){
       try{
            if($save_pwd==$pwd){
                $stmt=$this->connect()->prepare('UPDATE  etudiant set Matricule=?,Nom=?,Prenom=?,Username=?,Gp=?,email=? ,CodeSection=?,img_status=? where matricule =?');
            
                $stmt->execute(array($matricule,$nom,$prenom,$uid,$group,$email,$codesection,$img_status,$save_mat));
              
                $stmt=null;
            }else{
                $stmt=$this->connect()->prepare('UPDATE  etudiant set Matricule=?,Nom=?,Prenom=?,Username=?,email=?,CodeSection=?,img_status=?,password=? where matricule=?');
                $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
                $stmt->execute(array($matricule,$nom,$prenom,$uid,$group,$email,$codesection,$img_status,$hashedPwd,$save_mat));
           
                $stmt=null;
            }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/administrateur/etudiant.php?&error=Error_requete");
            exit();
        }
      
        #;

 
    }
 

        protected function checkUserExist($uid,$matricule,$save_mat,$email,$save_uid,$save_email){
        try{
            if($save_mat!=$matricule){
                $stmt =$this->connect()->prepare('SELECT * FROM etudiant WHERE  matricule=? ');
                $stmt->execute(array($matricule));
              

                if($stmt->rowCount()>0){    
                    $resultCheck_mat=true;
                }else{
                $resultCheck_mat=false;
                }
            }else{
                $resultCheck_mat=false;
            }
                //check if email is change and if yes check if its already used
            if($email!=$save_email){
                $stmt3=$this->connect()->prepare('SELECT *FROM etudiant WHERE  matricule<>? and email=? ');
                
                $stmt3->execute(array($matricule,$email));
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
                $stmt5=$this->connect()->prepare('SELECT *FROM etudiant WHERE  matricule<>? and username=? ');
                $stmt5->execute(array($matricule,$uid));  
                if($stmt5->rowCount()>0){
                    $resultCheck_uid=true;
                }else{
                    $resultCheck_uid=false;
                }
            }else{
                $resultCheck_uid=false; 
            }
            $stmt2=$this->connect()->prepare('SELECT *FROM administrateur x,enseignant y WHERE  x.username=? or x.email=? or  y.username=? or y.email=? ');
        
            $stmt2->execute(array($uid,$email,$uid,$email));

            if( $stmt2->rowCount()>0 or $resultCheck_mail==true or $resultCheck_mat==true or $resultCheck_uid==true) {
                $resultCheck=true;
            }else{
                $resultCheck=false;
            }
            return   $resultCheck;
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../../templates/administrateur/etudiant.php?&error=Error_requete");
        exit();
    }
    }
    
 

}