<?php

class modifier_section extends  section{
    private $specialite;
    private $section;
    private  $numero;
    private $group_save;
    private $gp;
    private $codesection_save;
  
    public function __construct($specialite,$section,$numero,$Gp,$codesection_save,$group_save)
    {   
        
         $this->specialite=$specialite;
         $this->section=$section; 
         $this->numero=$numero;
       $this->gp=$Gp;
        $this->codesection_save=$codesection_save;
        $this->group_save=$group_save;
    }

   public function Modifer(){
    if(empty($this->transform_to_codesection())){
        header("Location: ../templates/administrateur/section.php?error=codesection_module_error");
        exit();
       }
       if($this->InputVide()==false){
        header("Location: ../templates/administrateur/section.php?error=emptyinput");
      
       exit();
   }
   if($this->verifier_exist($this->transform_to_codesection(),$this->gp)){
    header("Location: ../templates/administrateur/section.php?error=existe");
    exit();
  }
    $this->modifier_section($this->transform_to_codesection(),$this->gp,$this->codesection_save,$this->group_save);
     
   }
   public function transform_to_codesection(){
    return $this->specialite.'_'.$this->section.'_'.$this->numero;
   }

   private function InputVide(){
 
    if(  empty($this->specialite)||empty($this->section)||empty($this->numero)||empty($this->gp)|| empty($this->codesection_save))
    {
        $result=false;
    }else{
        $result=true;
    }
    return $result;
} 
  
   
}