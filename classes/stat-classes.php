<?php
class stat extends Dbh{

    public function stat_simple($id){
        try{
        $stmt=$this->connect()->prepare("SELECT count(*)  FROM support_cours where NSS=?");
        $stmt->execute(array($id));

        if($stmt->rowCount()==0){
            return null;
            } else{
                    
                $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);

                $stmt=null;
                $list[]=[
                    'cours'=>$temp[0]['count(*)']
                ];
              
                
            }
            $stmt=$this->connect()->prepare("SELECT count(*)  FROM support_devoir where NSS=?");
            $stmt->execute(array($id));

            if($stmt->rowCount()==0){
                return null;
                } else{
                        
                    $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
                    $stmt=null;
                    $list[]=[
                        'devoir'=>$temp[0]['count(*)']
                    ];
                   
                    
                }
                return $list;
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/prof/acceuil.php?error=Error_requete");
            exit();
        }
    }
    public function get_section($id){
        try{
            $stmt=$this->connect()->prepare("SELECT Codesection  FROM gestion where NSS=?");
            $stmt->execute(array($id));

            if($stmt->rowCount()==0){
                return null;
                } else{
                        
                    $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);

                    $stmt=null;
                return $temp;
            }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/prof/prof_devoir.php?error=Error_requete");
            exit();
        }
    }
    public function etudiant_online($codesection){
 
        try{
        if(!empty($codesection)){
            $sections="'".$codesection[0]['Codesection']."'";
            
            for($i=1;$i<count($codesection);$i++)
            {
                $sections.=','."'".$codesection[$i]['Codesection']."'";
            }
            }else{
                $sections=0;
            }
        $stmt=$this->connect()->prepare("SELECT *  FROM etudiant where Codesection IN($sections) and status_online=?");
        if(!$stmt->execute(array(1))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }   
        if($stmt->rowCount()==0){
            return null;
            } else{
                    
                $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);

                $stmt=null;
              return $temp;
        }
        
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../../templates/prof/acceuil.php?error=Error_requete");
        exit();
    }
    }
    public function etudiant_list($id){
    try{
        if(!empty($codesection)){
            $sections="'".$codesection[0]['Codesection']."'";
            
            for($i=1;$i<count($codesection);$i++)
            {
                $sections.=','."'".$codesection[$i]['Codesection']."'";
            }
            }else{
                $sections=0;
            }
        $stmt=$this->connect()->prepare("SELECT *  FROM etudiant where Codesection IN($sections)");
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }   
        if($stmt->rowCount()==0){
            return null;
            } else{
                    
                $temp=$stmt->fetchAll(PDO::FETCH_ASSOC);

                $stmt=null;
              return $temp;
        }
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../../templates/prof/acceuil.php?error=Error_requete");
            exit();
        }
    }
}