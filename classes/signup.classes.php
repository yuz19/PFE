<?php
class Signup extends Dbh{

    protected function setUser($uid,$pwd,$email){
        $stmt=$this->connect()->prepare('INSERT INTO user(username,email,password,role) VALUES (?,?,?,?);');
        $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($uid,$pwd,$email))){
            $stmt=null;
            header("Location:../templates/sign.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }


    
    protected function checkUserExist($uid,$email){
        $stmt =$this->connect()->prepare('SELECT username FROM user WHERE  username=? or email=?;');

        if(!$stmt->execute(array($uid,$email))){
            $stmt=null;
            header("Location:../templates/sign.php?error=stmtfailed");
            exit();
        }
      
        if($stmt->rowCount()>0){
            $resultCheck=false;
        }else{
            $resultCheck=true;
        }
        return   $resultCheck;
    }
}