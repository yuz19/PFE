<?php
class poster_travaux extends Dbh{
    protected function ajt_travaux($nom,$date,$section,$file,$NSS,$group){
         
    $stmt=$this->connect()->prepare('INSERT INTO support_td_tp(NSS,Codesection,date,nom,nom_file,Gp) VALUES (?,?,?,?,?,?);');
       
        if(!$stmt->execute(array($NSS,$section,$date,$nom,$file,$group))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $file = 'save_travaux.txt';
        $current = (int)file_get_contents($file)+1;
        file_put_contents($file,$current);
        $stmt=null;
    }
    protected function count(){
        $stmt=$this->connect()->prepare(" SELECT max(idtd_tp) FROM support_td_tp");
        $file = 'save_travaux.txt';
        $current = file_get_contents($file);
    
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $count=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($current<$count[0]['max(idtd_tp)']){
                file_put_contents($file, $count[0]['max(idtd_tp)']);
                 
        } 

        return file_get_contents($file);
    }  

}