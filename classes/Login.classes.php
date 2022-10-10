<?php
class Login extends Dbh{

  
    protected function getUser($matricule_nss,$pwd)
    {

        $stmt=$this->connect()->prepare('SELECT * FROM etudiant WHERE Matricule=? ');
        if(!$stmt->execute(array($matricule_nss))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
         
        if($stmt->rowCount()==0){
            $stmt=$this->connect()->prepare('SELECT * FROM enseignant WHERE NSS=? ');
            if(!$stmt->execute(array($matricule_nss))){
                $stmt=null;
                header("Location: ../../templates/login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()==0){
                $stmt=$this->connect()->prepare('SELECT * FROM administrateur WHERE NSS=? ');
                if(!$stmt->execute(array($matricule_nss))){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }
                if($stmt->rowCount()==0){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=account_dont_existe");
                    exit();
                }else{
                           
                    $pwdHashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
                
                
                    $check=password_verify($pwd,$pwdHashed[0]['Password']);
                    
                    if($check==false){
                        $stmt=null;
                        header("Location: ../../templates/login.php?error=wrong_password");
                        exit();
                    }
                    elseif($check==true){

                        $_SESSION['user']=$pwdHashed[0]['Username'];
                        $_SESSION['nom']=$pwdHashed[0]['Nom'];
                        $_SESSION['prenom']=$pwdHashed[0]['prenom'];
                        $_SESSION['email']=$pwdHashed[0]['Email'];
                        $_SESSION['id']=$pwdHashed[0]['NSS'];
                        $_SESSION['role']="admin";
                        header("Location: ../../templates/administrateur/acceuil.php");
                        exit();
                    }

                    $stmt=null;
                }
            }else{
                       
                    $pwdHashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
                
                
                    $check=password_verify($pwd,$pwdHashed[0]['Password']);
                    
                    if($check==false){
                        $stmt=null;
                        header("Location: ../../templates/login.php?error=wrong_password");
                        exit();
                    }
                    elseif($check==true){

                        $_SESSION['user']=$pwdHashed[0]['Username'];
                        $_SESSION['nom']=$pwdHashed[0]['Nom'];
                        $_SESSION['prenom']=$pwdHashed[0]['prenom'];
                        $_SESSION['email']=$pwdHashed[0]['email'];
                        $_SESSION['id']=$pwdHashed[0]['NSS'];
                        $_SESSION['img']=$pwdHashed[0]['img_status'];
                       
                        $_SESSION['role']="prof";
                        header("Location: ../../templates/prof/acceuil.php");
                        exit();
                    }

                    $stmt=null;
                    }
        }else{
            
            $pwdHashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
         
        
            $check=password_verify($pwd,$pwdHashed[0]['Password']);
            
            if($check==false){
                $stmt=null;
                header("Location: ../../templates/login.php?error=wrong_password");
                exit();
            }
            elseif($check==true){

                $_SESSION['user']=$pwdHashed[0]['Username'];
                $_SESSION['nom']=$pwdHashed[0]['nom'];
                $_SESSION['prenom']=$pwdHashed[0]['prenom'];
                $_SESSION['email']=$pwdHashed[0]['email'];
                $_SESSION['id']=$pwdHashed[0]['matricule'];
                $_SESSION['Codesection']=$pwdHashed[0]['Codesection'];
                $_SESSION['gp']=$pwdHashed[0]['Gp'];
                $stm2=$this->connect()->prepare('UPDATE etudiant set status_online=1 WHERE matricule=?');
                if(!$stm2->execute(array($matricule_nss))){
                    $stm2=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }
                $_SESSION['role']="etudiant";
                $_SESSION['img']=$pwdHashed[0]['img_status'];
                header("Location: ../../templates/etudiants/acceuil.php");
                exit();
            }

            $stmt=null;
            }

    }/*
    protected function getRole($matricule_nss){
        $stmt=$this->connect()->prepare('SELECT * FROM user WHERE matricule=?');
        if(!$stmt->execute(array($matricule_nss))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
           
        if($stmt->rowCount()==0){
            $stmt=null;
            header("Location: ../../templates/login.php?error=account_dont_existe");
            exit();
        }else{

        }
        $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user[0]['role'];
    }*/
 
}