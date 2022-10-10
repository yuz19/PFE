<?php
class administrateur extends Dbh{
 
    public function listadmin(){
        $stmt=$this->connect()->prepare('SELECT * FROM administrateur');
        if(!$stmt->execute(array())){
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

