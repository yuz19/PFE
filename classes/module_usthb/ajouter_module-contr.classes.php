<?php

class ajouter_module extends module{
   private $module;
   private $Codesection;
 
   private $titre;
   private  $coeficient;
   private $unite;


   public function __construct($module,$Codesection,$titre,$coeficient,$unite)
   {   
        $this->module=$module;
        $this->Codesection=$Codesection;
  
 
        $this->titre=$titre;
        $this->coeficient=$coeficient;
        $this->unite=$unite;
   
      
     
   }

   public function ajouter(){
       if(empty($this->transform_to_codesection())){
        header("Location: ../templates/administrateur/module.php?error=codesection_module_error");
        exit();
       }
       if($this->InputVide()==false){
        header("Location: ../templates/administrateur/module.php?error=emptyinput");
          exit();
      }
      if($this->verifier_exist($this->transform_to_codesection())){
        header("Location: ../templates/administrateur/module.php?error=existe");
        exit();
      }
    $this->ajouter_module($this->transform_to_codesection(),$this->titre,$this->coeficient,$this->unite);
   }/*
   public function transform_to_codesection(){
    return $this->specialite.'_'.$this->section.'_'.$this->numero;
   }*/
   public function transform_to_codesection(){
    return $this->module.'_'.$this->Codesection;
   }
   private function InputVide(){
 
    if(empty($this->module)  || empty($this->Codesection)||empty($this->titre)||empty($this->coeficient)||empty($this->unite) )
    {
        $result=false;
    }else{
        $result=true;
    }
    return $result;
}
}