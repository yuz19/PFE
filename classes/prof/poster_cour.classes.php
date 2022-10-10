<?php
class poster_cour extends Dbh{
    protected function ajt_cour($nom,$date,$section,$file,$NSS){
         
    $stmt=$this->connect()->prepare('INSERT INTO support_cours(NSS,CodeSection,date,Nom,nom_file) VALUES (?,?,?,?,?);');
       
        if(!$stmt->execute(array($NSS,$section,$date,$nom,$file))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $file = 'save_cours.txt';
        $current = (int)file_get_contents($file)+1;
        file_put_contents($file,$current);
        $stmt=null;
    }
    protected function count(){
        $stmt=$this->connect()->prepare(" SELECT max(idcours) FROM support_cours");
        $file = 'save_cours.txt';
        $current = file_get_contents($file);
    
        if(!$stmt->execute(array())){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }
        $count=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($current<$count[0]['max(idcours)']){
            file_put_contents($file, $count[0]['max(idcours)']);
             
        } 

        return file_get_contents($file);
    } 

}