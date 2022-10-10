<?php
class new_annee extends Dbh{
        #delete cour unlink file commentaire
    public function start($id){
        $stmt_cour=$this->connect()->prepare('DELETE from  support_cours   where NSS =?');
        if(!$stmt_cour->execute(array($id))){
            $stmt_cour=null;
            header("Location: ../../templates/prof/profil.php?error=stmtfailed");
            exit();
        }
        $stmt_devoir=$this->connect()->prepare('DELETE from  support_devoir  where NSS =?');
        if(!$stmt_devoir->execute(array($id))){
            $stmt_devoir=null;
            header("Location: ../../templates/prof/profil.php?error=stmtfailed");
            exit();
        }
        $stmt_travaux=$this->connect()->prepare('DELETE from  support_td_tp   where NSS =?');
        if(!$stmt_travaux->execute(array($id))){
            $stmt_travaux=null;
            header("Location: ../../templates/prof/profil.php?error=stmtfailed");
            exit();
        }
        $stmt_commentaire=$this->connect()->prepare('DELETE from  support_td_tp   where NSS =?');
        if(!$stmt_commentaire->execute(array($id))){
            $stmt_commentaire=null;
            header("Location: ../../templates/prof/profil.php?error=stmtfailed");
            exit();
        }

        $devoirs=glob("../uploads/devoir/*");
 
        foreach($devoirs as $file){
            if(preg_match("/$id/",$file) ){
             unlink($file);
            }   
          }
          $cours=glob("../uploads/cours/*");
 
          foreach($cours as $file){
              if(preg_match("/$id/",$file) ){
               unlink($file);
              }   
            }
            $travaux=glob("../uploads/travaux/*");
 
            foreach($travaux as $file){
                if(preg_match("/$id/",$file) ){
                 unlink($file);
                }   
              }
    }
}