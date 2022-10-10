<?php 
class supp_CDT extends Dbh{

    public function supprimer($id,$type){
        try{
        session_start();
        switch ($type) {
            case 'cour':
                $stmt=$this->connect()->prepare('DELETE  FROM support_cours where idcours=?');
                if(!$stmt->execute(array($id))){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                } 
                $stmt2=$this->connect()->prepare('DELETE  FROM commentaire where id_file=? and type=?');
                if(!$stmt2->execute(array($id,'cour'))){
                    $stmt2=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }     
                unlink("../uploads/cours/file-".$_SESSION['id']."-".$id.".jpg");
                unlink("../uploads/cours/file-".$_SESSION['id']."-".$id.".pdf");
                break;
            
            case 'devoir':
                $stmt3=$this->connect()->prepare('DELETE  FROM reponse_devoir where iddev=? ');
                if(!$stmt3->execute(array($id))){
                    $stmt3=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }   
                $stmt=$this->connect()->prepare('DELETE  FROM support_devoir where iddev=?');
                if(!$stmt->execute(array($id))){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                } 
                $stmt2=$this->connect()->prepare('DELETE  FROM commentaire where id_file=? and type=?');
                if(!$stmt2->execute(array($id,'devoir'))){
                    $stmt2=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }  
            
                unlink("../uploads/devoir/file-".$_SESSION['id']."-".$id.".jpg");
                unlink("../uploads/devoir/file-".$_SESSION['id']."-".$id.".pdf");
              
                $reponse_devoirs=glob("../uploads/reponse_devoir/*");
 
                foreach($reponse_devoirs as $file){
                   if(preg_match("/$id\.jpg$/",$file) ){
                     unlink($file);
                }   
                if(preg_match("/$id\.pdf$/",$file) ){
                   unlink($file);
               }
               
               }
              
                break;

            case 'travaux':
                $stmt=$this->connect()->prepare('DELETE  FROM support_td_tp where idtd_tp=?');
                if(!$stmt->execute(array($id))){
                    $stmt=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                } 
                $stmt2=$this->connect()->prepare('DELETE  FROM commentaire where id_file=? and type=?');
                if(!$stmt2->execute(array($id,'travaux'))){
                    $stmt2=null;
                    header("Location: ../../templates/login.php?error=stmtfailed");
                    exit();
                }     
                unlink("../uploads/travaux/file-".$_SESSION['id']."-".$id.".jpg");
                unlink("../uploads/travaux/file-".$_SESSION['id']."-".$id.".pdf");
                break;
                break;
            
            default:
                
                break;
        }
    }catch(PDOException $e){
        $stmt=null;
        header("Location: ../templates/prof/acceuil.php?error=Error_requete");
        exit();
    }
    }
}