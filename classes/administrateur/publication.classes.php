<?php
class publication extends Dbh{

    protected function postPublication($nss,$titre,$contenu,$bg_status,$uploadFile_status,$nom_file)
    {   
        try{
            $stmt=$this->connect()->prepare("INSERT INTO publication(NSS,titre,contenu,bg_status,file_status,nom_file)VALUES(?,?,?,?,?,?)");
                
            $stmt->execute(array($nss,$titre,$contenu,$bg_status,$uploadFile_status,$nom_file));
            
            
            $file = 'save.txt';
            $current = (int)file_get_contents($file)+1;
            file_put_contents($file,$current);

            $stmt=null;
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/acceuil.php?error=erreur");
            exit();
        }

    }   
 
    protected function count(){
        try{
            $stmt=$this->connect()->prepare(" SELECT max(id) FROM publication");
            $file = 'save.txt';
            $current = file_get_contents($file);
        
            $stmt->execute(array());
         
            $count=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if($current<$count[0]['max(id)']){
                    file_put_contents($file, $count[0]['max(id)']);
                     
            } 
    
            return file_get_contents($file);
        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/acceuil.php?error=erreur");
            exit();
        }
       
    }   

}