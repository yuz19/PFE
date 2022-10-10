<?php

class ajouter_commentaire_contr extends ajouter_commentaire{
   private $Commentaire;
   private $id_user;
   private $id_file;
   private $type;
   private $page;

   public function __construct($Commentaire,$id_user,$id_file,$type,$page)
   {   
        $this->id_user=$id_user;
        $this->Commentaire=$Commentaire;
        $this->id_file=$id_file;
        $this->type=$type;
        $this->page=$page;
   }
   public function ajouter_commentaire($type){
    if($this->InputVide()==false){
        if($type=='devoir' and $this->page='prof'){
            header("Location: ../templates/Prof/prof_devoir.php?error=emptyinput");
            exit();
        }
        if($type=='cour' and $this->page='prof'){
            header("Location: ../templates/Prof/prof_cour.php?error=emptyinput");
            exit();
        }
        if($type=='travaux' and $this->page='prof'){
            header("Location: ../templates/Prof/prof_travaux.php?error=emptyinput");
            exit();
        }
        if($type=='travaux' and $this->page='etudiant'){
            header("Location: ../../templates/Prof/prof_travaux_comment.php?error=emptyinput");
            exit();
        }
        if($type=='devoir' and $this->page='etudiant'){
            header("Location: ../../templates/Prof/prof_devoir_comment.php?error=emptyinput");
            exit();
        }
        if($type=='cour' and $this->page='etudiant'){
            header("Location: ../../templates/Prof/prof_cour_comment.php?error=emptyinput");
            exit();
        }
      }
      
  
      $this->ajouter($this->Commentaire,$this->id_user,$this->id_file,$this->type);
      
    }

   private function InputVide(){
 
    if(empty($this->id_user) ||empty($this->Commentaire))
    {
        $result=false;
    }else{
        $result=true;
    }
    return $result;
}
}