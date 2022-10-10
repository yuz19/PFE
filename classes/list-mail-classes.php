<?php

class list_mail extends Dbh{
    public function __construct()
    {
        
    }
    public function listage_mail($mail_to){
        $stmt=$this->connect()->prepare('SELECT * FROM umail WHERE user_to=?');
        if(!$stmt->execute(array($mail_to))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
             return $listes;
             
         }
    }
}