<?php
class ajouter_commentaire extends Dbh{
    
     #remarque id_user represent NSS prof et matricue etudiants
     #remarque id_file represent id devoir ou cour ou travaux
    protected function ajouter($Commentaire,$id_user,$id_file,$type){
        date_default_timezone_set('Africa/Algiers');
        $stmt=$this->connect()->prepare('INSERT INTO commentaire(commentaire,id_user,type,id_file,Date) VALUES (?,?,?,?,?);');
 
        if(!$stmt->execute(array($Commentaire,$id_user,$type,$id_file,date("Y-m-d H:i:s")))){
            $stmt=null;
            
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }
    
    public function list_commentaire($id,$type){
        $stmt=$this->connect()->prepare('SELECT * FROM commentaire WHERE id_file=? and type=? ORDER BY Date desc');
        if(!$stmt->execute(array($id,$type))){
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
    public function count($id,$type){
        $stmt=$this->connect()->prepare('SELECT count(*) FROM commentaire WHERE id_file=? and type=?');
        if(!$stmt->execute(array($id,$type))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $nbr=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $nbr[0]['count(*)'];
    }
}
 