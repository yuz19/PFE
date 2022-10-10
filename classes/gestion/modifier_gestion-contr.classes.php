<?php

class modifier_gestion_contr extends gestion{
   private $Codemodule;
   private $nss;
 
   private $Codesection;
   private  $Gp;
   private $type;
  private $Codemodule_save;
  private $nss_save;
  private $Codesection_save;
  private $Gp_save;
  private $type_save;

   public function __construct($Codemodule,$nss,$Codesection,$Gp,$type,$Codemodule_save,$nss_save,$Codesection_save,$Gp_save,$type_save)
   {   
        $this->Codemodule=$Codemodule;
        $this->nss=$nss;
        $this->type=$type;
        $this->Codesection=$Codesection;
        $this->Gp=$Gp;
        $this->Codemodule_save=$Codemodule_save;
        $this->nss_save=$nss_save;
        $this->Codesection_save=$Codesection_save;
        $this->Gp_save=$Gp_save;
        $this->type_save=$type_save;
   }

   public function Modifier(){
    if($this->InputVide()==false){
      header("Location: ../templates/administrateur/gestion.php?error=emptyinput");
      exit();
    }
    if($this->cour_grp()==false){
      header("Location: ../templates/administrateur/gestion.php?error=cour_ne_peut_pas_avoir group__TdouTp ne peux pas avoir 0group");
      exit();
    }
       
      if($this->verifier_exist($this->Codemodule,$this->nss,$this->Codesection,$this->Gp,$this->type)){
        header("Location: ../templates/administrateur/gestion.php?error=existe");
        exit();
      }
    $this->modifier_gestion($this->Codemodule,$this->nss,$this->Codesection,$this->Gp,$this->type,$this->Codemodule_save,$this->nss_save,$this->Codesection_save,$this->Gp_save,$this->type_save);
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