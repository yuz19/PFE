<?php
class poster_devoir extends Dbh{
    protected function ajt_devoir($nom,$deadline,$section,$file,$NSS,$codemodule,$type){
         
    $stmt=$this->connect()->prepare('INSERT INTO support_devoir(NSS,CodeSection,deadline,Nom,nom_file,Codemodule,type) VALUES (?,?,?,?,?,?,?);');
       
        if(!$stmt->execute(array($NSS,$section,$deadline,$nom,$file,$codemodule,$type))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $file = 'save_devoir.txt';
        $current = (int)file_get_contents($file)+1;
        file_put_contents($file,$current);
        $stmt=null;
    }
    protected function count(){
        $stmt=$this->connect()->prepare(" SELECT max(iddev) FROM support_devoir");
        $file = 'save_devoir.txt';
        $current = file_get_contents($file);
    
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $count=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($current<$count[0]['max(id)']){
            file_put_contents($file, $count[0]['max(id)']);
             
        } 

    return file_get_contents($file);

      
    }     

}