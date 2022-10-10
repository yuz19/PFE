<?php

class modifier_module_contr extends  module{
   private $module;
   private $Codesection;
   private $titre;
   private  $coeficient;
   private $unite;
    private $Codemodule_save;
   public function __construct($module,$Codesection,$titre,$coeficient,$unite,$Codemodule_save)
   {   
        $this->module=$module;
        $this->Codesection=$Codesection;
 
        $this->titre=$titre;
        $this->Codemodule_save=$Codemodule_save;
        $this->coeficient=$coeficient;
        $this->unite=$unite;
  
   }

   public function Modifer(){
    if(empty($this->transform_to_codesection())){
        header("Location: ../templates/administrateur/module.php?error=codesection_module_error");
        exit();
       }
       if($this->InputVide()==false){
        header("Location: ../templates/administrateur/module.php?error=emptyinput");
      
       exit();
   }
    $this->modifier_module($this->transform_to_codesection(),$this->Codemodule_save,$this->titre,$this->coeficient,$this->unite);
     
   }
   public function transform_to_codesection(){
    return $this->module.'_'.$this->Codesection;
   }

    private function InputVide(){
 
        if(empty($this->module) ||empty($this->Codesection) || empty($this->titre)||  empty($this->coeficient)||empty($this->unite)  )
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
   }
  
   
}