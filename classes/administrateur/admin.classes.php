<?php
class admin extends Dbh{
    public function     getAdmin($NSS){
        try{
            $stmt=$this->connect()->prepare('SELECT * FROM administrateur where NSS=?');
           $stmt->execute(array($NSS));
      
            if($stmt->rowCount()>0){
                $listes=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt=null;
             
                return    $listes;
            }else{
                return null;
            }  

        }catch(PDOException $e){
            $stmt=null;
            header("Location: ../templates/administrateur/acceuil.php?error=Error_requete");
            exit();
        }

        
    }
    public function  supp_compte($id,$code,$Gp,$type,$typed){


     
        switch ($type) {
            case 'etudiant':
                try{
                    $stmt=$this->connect()->prepare('DELETE  FROM etudiant where matricule=?');
                    $stmt->execute(array($id));
                    unlink("../uploads/etudiants/profile-".$id.".png");
                    $stmt=null;
                }catch(PDOException $e){
                    $stmt=null;
                    header("Location: ../../templates/administrateur/etudiant.php?&error=Error_requete");
                    exit();
                }
                break;
            case 'prof':
                try{
                    $stmt=$this->connect()->prepare('DELETE  FROM enseignant where NSS=?');
                    $stmt->execute(array($id));   
                    unlink("../../uploads/profs/profile-".$id.".png"); 
                    $stmt=null;
                }catch(PDOException $e){
                    $stmt=null;
                    header("Location: ../../templates/administrateur/prof.php?&error=Error_requete");
                    exit();
                }
     
                break;
      
            case 'module':
                try{
                    $stmt=$this->connect()->prepare('DELETE  FROM module where Codemodule=?');
                    $stmt->execute(array($code));   
                    $stmt=null;
                }catch(PDOException $e){
                    $stmt=null;
                    header("Location: ../../templates/administrateur/prof.php?&error=Error_requete");
                    exit();
                }
                break;
            case 'section':
                try{  
                    $stmt=$this->connect()->prepare('DELETE  FROM section where Codesection=? and Gp=?');
                    $stmt->execute(array($code,$Gp));
                    $stmt=null;
                }catch(PDOException $e){
                    $stmt=null;
                    header("Location: ../../templates/administrateur/section.php?&error=Error_requete");
                    exit();
                }
  
                break;
            case 'gestion':
                try{
                    $stmt=$this->connect()->prepare('DELETE  FROM gestion where Codesection=? and NSS=? and Gp=? and type=?');
                    $stmt->execute(array($code,$id,$Gp,$typed));
                    $stmt=null;
                }catch(PDOException $e){
                    $stmt=null;
                    header("Location: ../../templates/administrateur/prof.php?&error=Error_requete");
                    exit();
                }
                break;
            default:
            header("Location: ../../templates/administrateur/acceuil.php?&error=Error_requete");
                break;
            }
        
        }
    }
