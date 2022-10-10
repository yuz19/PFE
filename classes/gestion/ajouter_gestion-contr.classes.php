<?php

class ajouter_gestion_contr extends gestion{
   private $Codemodule;
   private $nss;
 
   private $Codesection;
   private  $Gp;
   private $type;


   public function __construct($Codemodule,$nss,$Codesection,$Gp,$type)
   {   
        $this->Codemodule=$Codemodule;
        $this->nss=$nss;
        $this->type=$type;
        $this->Codesection=$Codesection;
        $this->Gp=$Gp;
   }

   public function ajouter(){
    if($this->InputVide()==false){
      header("Location: ../templates/administrateur/gestion.php?error=emptyinput");
      exit();
    }
    if($this->cour_grp()==false){
      header("Location: ../templates/administrateur/gestion.php?error=cour_ne_peut_pas_avoir group__TdouTp ne peux pas avoir 0group");
      exit();
    }
       
      if($this->verifier_exist($this->Codemodule,$this->nss,$this->Codesection,$this->Gp,$this->type)){
        header("Location: ../templates/administrateur/module.php?error=existe");
        exit();
      }
    $this->ajouter_gestion($this->Codemodule,$this->nss,$this->Codesection,$this->Gp,$this->type);
   }/*
   public function transform_to_codesection(){
    return $this->specialite.'_'.$this->section.'_'.$this->numero;
   }*/
  
   private function InputVide(){
 
    if(empty($this->Codemodule)  || empty($this->Codesection)||empty($this->nss)||empty($this->type))
    {
        $result=false;
    }else{
        $result=true;
    }
    return $result;
}
  private  function cour_grp(){
    if($this->type=='cour' and $this->Gp!=0){
      return false;
    }elseif($this->type!='cour' and $this->Gp==0){
      return false;
    }
    return true;

  }
}