<?php
class umail extends Dbh{
  
    public function envoyer_mail($user_from,$user_to,$subject,$mail,$file_status,$name_file,$date)
    {
        $stmt=$this->connect()->prepare("INSERT INTO umail(user_from,user_to,subject,mail,file_status,name_file,date)VALUES(?,?,?,?,?,?,?)");
        if(!$stmt->execute(array($user_from,$user_to,$subject,$mail,$file_status,$name_file,$date))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }
    protected function count(){
        $stmt=$this->connect()->prepare(" SELECT max(id) FROM umail");
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $count=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
          return $count[0]['max(id)'];
    }   
    protected function verifier_compt_parMail(){

    }  
}