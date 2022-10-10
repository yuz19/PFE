<?php

class ajouter_section extends section{
 
  private $specialite;
  private $section;
  private  $numero;
  
  private $gp;


  public function __construct($specialite,$section,$numero,$Gp)
  {   
      
       $this->specialite=$specialite;
       $this->section=$section; 
       $this->numero=$numero;
     $this->gp=$Gp;
     
    
  }


   public function ajouter(){
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
     $this->ajouter_section($this->transform_to_codesection(),$this->gp);
    

   } 
   public function transform_to_codesection(){
    return $this->specialite.'_'.$this->section.'_'.$this->numero;
   }
   private function InputVide(){
 
      if(  empty($this->specialite)||empty($this->section)||empty($this->numero)||empty($this->gp) )
      {
          $result=false;
      }else{
          $result=true;
      }
      return $result;
  } 
}