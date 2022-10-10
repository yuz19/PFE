<?php 
class historique extends Dbh{
    //incremente cpt dans historique pour chaque prof
    public function incremente($nss){
        date_default_timezone_set('Africa/Algiers');
        $date= date("Y-m-d");
        $stmt_verification=$this->connect()->prepare('SELECT *  from historique where NSS=? AND date=?');
           if(!$stmt_verification->execute(array($nss,$date))){
                $stmt=null;
                header("Location: ../../templates/prof/prof_eleve.php?error=stmtfailed");
                exit();
            }
        if($stmt_verification->rowCount()==0){
            $stmt=$this->connect()->prepare('insert into historique(NSS,cpt,date) values (?,?,?)');
            if(!$stmt->execute(array($nss,1,$date))){
                $stmt=null;
                header("Location: ../../templates/prof/prof_eleve.php?error=stmtfailed");
                exit();
            }
            $stmt=null;
     
        }else{
            $stmt=$this->connect()->prepare('UPDATE  historique set cpt=cpt+1 where NSS=? and date=?');
        if(!$stmt->execute(array($nss,$date))){
            $stmt=null;
            header("Location: ../../templates/prof/prof_eleve.php?error=stmtfailed");
            exit();
        }
        $stmt=null;
    
 
        }
     
    }
    //nombre live  online par jour
    public function get_prof_stat($nss){
        $stmt=$this->connect()->prepare('SELECT *  from historique where NSS=? order by date desc LIMIT 5');
        if(!$stmt->execute(array($nss))){
             $stmt=null;
             header("Location: ../../templates/prof/prof_eleve.php?error=stmtfailed");
             exit();
         }
         if($stmt->rowCount()==0){
            return null;
         } else{
                    
             $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt=null;
             return array_reverse($listes,true);
             
         }
    }
      
 
}