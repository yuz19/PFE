<?php
class getPublication extends Dbh{

   public function getPublication($id){
       
        $stmt=$this->connect()->prepare("SELECT * FROM publication WHERE id=?");
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            return null;
            } else{
                    
                $publication=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
                return $publication;
                
            }
        } 
    public function listPublication(){
    
        $stmt=$this->connect()->prepare("SELECT * FROM publication ");
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            return null;
            } else{
                    
                $publication=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
                return $publication;
                
            }
        } 
}