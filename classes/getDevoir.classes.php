<?php
class getDevoir extends Dbh{

   public function getDevoir($id){
       
        $stmt=$this->connect()->prepare("SELECT * FROM support_devoir WHERE iddev=?");
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