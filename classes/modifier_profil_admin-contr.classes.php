<?php

class modifier_profil_admin_contr extends  modifier_profil_admin{
 
    private $id;
 
    private  $email;
    private $uid;

    private  $pwd;
    private  $pwdrepeat;
    private $save_email;
    private $save_uid;
    private $save_pwd;
 
    public function __construct($id,$uid,$email,$pwd,$pwdrepeat,$save_pwd,$save_email,$save_uid)
    {   
         $this->id=$id;
          
       
         $this->uid=$uid;
         $this->email=strtolower($email);
         $this->pwd=$pwd;
         $this->pwdrepeat=$pwdrepeat;
 
    
         $this->save_uid=$save_uid;
         $this->save_email=$save_email;       
 
         $this->save_pwd=$save_pwd;
      
    }
 
    public function ModiferUser(){
        if($this->InputVide()==false){
             header("Location: ../../templates/administrateur/profil.php?error=emptyinput");
             exit();
        }
      
       if($this->verifi_uid()==false){
         header("Location: ../../templates/administrateur/profil.php?error=user_errorStat");
         exit();
       }/*
       if($this->checkSP($this->codesp)==false){
         header("Location: ../../templates/administrateur/etudiant.php?error=specialite_n'exist_pas");
         exit();
       }*/
       if($this->invalidEmail()==false){
         header("Location: ../../templates/administrateur/profil.php?error=email_errorStat");
         exit();
       }
       if($this->verifi_user()==false){
         header("Location: ../../templates/administrateur/profil.php?error=user_existe_or_email_already_used");
         exit();
       }
 
       $this->setprofil($this->id,$this->uid,$this->pwd,$this->email,$this->save_pwd);
    }
 
     private function InputVide(){
  
         if(empty($this->id) ||  empty($this->uid)||empty($this->email)  || empty($this->pwd)|| empty($this->pwdrepeat))
         {
             $result=false;
         }else{
             $result=true;
         }
         return $result;
    }
 
   
     private function verifi_uid() {
         
         if (!preg_match("/^[a-zA-Z0-9]*[_\s\.]*[a-zA-Z0-9]*$/", $this->uid))
         {
              $result = false;
         }
         else
         {
           $result = true;
         }
         return $result;
     } 
     private function verif_pwd(){
         $pwd=$this->pwd;
         $pwdrepeat=$this->pwd;
         if(strcmp($pwd, $pwdrepeat) == 0){
 
             if(strlen($pwd<5)){
                 $msgError="Votre mot de passe est faible";
                 return $msgError;
 
             }elseif(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $pwd))#verifier si il contient lettre et nombre 
             {
                 $msgError="Votre mot de passe dois contenir lettre et nombre";
                 return $msgError;
             }
 
         }else{
             $msgError="Votre mot de passe n'est pas le meme";
             return $msgError;
         }
      
     }
     private function invalidEmail(){
         if(filter_var($this->email , FILTER_VALIDATE_EMAIL)){
             $result=true;
         }else{
             $result=false;
         }
         return $result;
     }
 
     private function verifi_user() {
         
         if ($this->checkUserExist($this->email,$this->uid,$this->id,$this->save_email,$this->save_uid))
         {
              $result = false;
         }
         else
         {
           $result = true;
         }
         return $result;
     }
   
 }


