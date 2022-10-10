<?php
require('session.classes.php');
class LoginContr extends Login{

   private $matricule_nss;
   private  $pwd;

   public function __construct($matricule_nss,$pwd)
   {
        $this->matricule_nss=$matricule_nss; 
 
        $this->pwd=$pwd;
 
   }

   public function loginUser(){
       if($this->InputVide()==true){
            header("Location: ../../templates/login.php?error=emptyinput");
            exit();
       }
       $this->getUser($this->matricule_nss,$this->pwd);
   /*
     
       if(strcmp(strtolower($this->getRole($this->matricule_nss)),"etudiant")==0){
     
            header("Location: ../../templates/etudiants/acceuil.php");
            exit();
            
       }elseif(strcmp(strtolower($this->getRole($this->matricule_nss)),"prof")==0){
          
            header("Location: ../../templates/Prof/acceuil.php");
            exit();
       }elseif(strcmp(strtolower($this->getRole($this->matricule_nss)),"admin")==0){
            header("Location: ../../templates/admin/acceuil.php");
           exit();
       }else{
          header("Location: ../../templates/error.php");
       }*/
     
   }

 private function InputVide(){
 
        if( empty($this->matricule_nss) || empty($this->pwd))
        {
            $result=true;
        }else{
            $result=false;
        }
        return $result;
   }
 
}