<?php
class stat_plus extends Dbh{

    public function stat_devoir($nss){
        
        $stmt=$this->connect()->prepare("SELECT distinct(Codesection ) FROM gestion where NSS=?");
        if(!$stmt->execute(array($nss))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()==0){
            return null;
        } else{
            $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt=null;
        if(count($temp)>0){
        foreach($temp as $sect){
            $stmt=$this->connect()->prepare("SELECT count(iddev)  FROM etudiant,reponse_devoir where reponse_devoir.matricule=etudiant.matricule and Codesection=?");
            if(!$stmt->execute(array($sect['Codesection']))){
                $stmt=null;
                header("Location: ../../templates/login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()==0){
                return null;
            } else{
                    
                $lis=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
                $stmt=null;
                $list[ "'".$sect['Codesection']."'"]=
                    $lis[0]['count(iddev)']
                    ; 
            }   
        }}else{
            $stmt=$this->connect()->prepare("SELECT count(iddev)  FROM etudiant,reponse_devoir where reponse_devoir.matricule=etudiant.matricule and Codesection=?");
            if(!$stmt->execute(array($temp[0]['Codesection']))){
                $stmt=null;
                header("Location: ../../templates/login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount()==0){
                return null;
            } else{
                    
                $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
                $stmt=null;
                $list["'".$temp[0]['Codesection']."'"]=
                    $temp[0]['count(iddev)']
                ; 
        }  
        } 
            return $list;
    
            
            
        }
    }
    public function stat_cour($nss){
        $stmt_getDate=$this->connect()->prepare("SELECT distinct date   FROM support_cours where NSS=?");
        if(!$stmt_getDate->execute(array($nss))){
            $stmt_getDate=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        if($stmt_getDate->rowCount()==0){
            return null;
        } else{
            $temp=$stmt_getDate->fetchAll(PDO::FETCH_ASSOC);
            if(count($temp)>0){
                foreach($temp as $value){
                    $tp=(string)explode(' ',$value['date'])[0];
                    $stmt=$this->connect()->prepare("SELECT count(*)  FROM support_cours where NSS=? AND  date LIKE ?");
          
                    
                    if(!$stmt->execute(array($nss,$tp."%"))){
                        $stmt=null;
                        header("Location: ../../templates/login.php?error=stmtfailed");
                        exit();
                    }
                    if($stmt->rowCount()==0){
                        return null;
                    } else{
                            
                        $lis=$stmt->fetchAll(PDO::FETCH_ASSOC);
                
                        $stmt=null;
                        $list["'".$tp."'"]=
                            $lis[0]['count(*)']
                        ; 
                }  
                }
  
               
            }else{
                $tp=(string)explode(' ',$temp[0]['date'])[0];
                $stmt=$this->connect()->prepare("SELECT count(*)  FROM support_cours where NSS=? AND  date LIKE ?");
      
                
                if(!$stmt->execute(array($nss,$tp."%"))){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }
                if($stmt->rowCount()==0){
                    return null;
                } else{
                        
                    $lis=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
                    $stmt=null;
                    $list["'".$tp."'"]=
                        $lis[0]['count(*)']
                    ; }
            }
           
              return $list;
      
        }
    
    }
    public function stat_td_tp($nss){
        $stmt_getDate=$this->connect()->prepare("SELECT distinct date   FROM support_td_tp where NSS=?");
        if(!$stmt_getDate->execute(array($nss))){
            $stmt_getDate=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        if($stmt_getDate->rowCount()==0){
            return null;
        } else{
            $temp=$stmt_getDate->fetchAll(PDO::FETCH_ASSOC);
            if(count($temp)>0){
                foreach($temp as $value){
                    $tp=(string)explode(' ',$value['date'])[0];
                    $stmt=$this->connect()->prepare("SELECT count(*)  FROM support_td_tp where NSS=? AND  date LIKE ?");
          
                    
                    if(!$stmt->execute(array($nss,$tp."%"))){
                        $stmt=null;
                        header("Location: ../../templates/login.php?error=stmtfailed");
                        exit();
                    }
                    if($stmt->rowCount()==0){
                        return null;
                    } else{
                            
                        $lis=$stmt->fetchAll(PDO::FETCH_ASSOC);
                
                        $stmt=null;
                        $list["'".$tp."'"]=
                            $lis[0]['count(*)']
                        ; 
                }  
                }
  
               
            }else{
                $tp=(string)explode(' ',$temp[0]['date'])[0];
                $stmt=$this->connect()->prepare("SELECT count(*)  FROM support_cours where NSS=? AND  date LIKE ?");
      
                
                if(!$stmt->execute(array($nss,$tp."%"))){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }
                if($stmt->rowCount()==0){
                    return null;
                } else{
                        
                    $lis=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
                    $stmt=null;
                    $list["'".$tp."'"]=
                        $lis[0]['count(*)']
                    ; }
            }
           
              return $list;
      
        }
    }
    
    public function stat_prof(){

        try{
            $stmt=$this->connect()->prepare("SELECT * FROM historique ");         
            $stmt->execute(array());
            if($stmt->rowCount()==0){
                return null;
            } else{
                    
                $lis=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
                $stmt=null;
                return $lis;
        }    
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/administrateur/dashboard_more.php?&error=Error_requete");
            exit();
        }
       
    }
}