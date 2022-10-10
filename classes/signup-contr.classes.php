<?php

class SignupContr extends Signup{
   private $nom;
   private $prenom;
   private  $email;
   private $uid;
   private  $pwd;
   private  $pwdrepeat;

   public function __construct( $nom,$prenom,$uid,$email,$pwd,$pwdrepeat)
   {
        $this->$nom=$nom;
        $this->$prenom=$prenom; 
        $this->uid=$uid;
        $this->$email=$email;
        $this->$pwd=$pwd;
        $this->$pwdrepeat=$pwdrepeat;
   }

   public function signupUser(){
       if($this->InputVide()==false){
            header("location :../templates/sign.php?error=emptyinput");
            exit();
       }
       if($this->verif_nom()==false){
        header("location :../templates/sign.php?error=nom_errorStat");
        exit();
      }
      if($this->verif_prenom()==false){
        header("location :../templates/sign.php?error=prenom_errorStat");
        exit();
      }
      if($this->verifi_uid()==false){
        header("location :../templates/sign.php?error=user_errorStat");
        exit();
      }
      if(!empty($this->verif_pwd())){
        header("location :../templates/sign.php?error=".$this->verif_pwd());
      
      }
      if($this->invalidEmail()==false){
        header("location :../templates/sign.php?error=email_errorStat");
        exit();
      }
      if($this->verifi_user()==false){
        header("location :../templates/sign.php?error=user_existe");
        exit();
      }
      $this->setUser($this->uid,$this->email,$this->pwd);
   }

 private function InputVide(){
 
        if(empty($this->nom) || empty($this->prenom)|| empty($this->email)|| empty($this->pwd)|| empty($this->pwdrepeat))
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
   }
    private function verif_nom():bool{
    
        if(preg_match("#^\b[A-Z]{1,}[_\s]{0,1}[A-Z]*$#",$this->nom)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }
    private function verif_prenom():bool{
        
        if(preg_match("#^\b[A-Z]{1}[a-z]+[_\s]?[a-z]+$#",$this->prenom)){
            $result=true;
        }else{
        
            $result=false;
        }
        return $result;
    }
    private function verifi_uid() {
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
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
        if(!filter_var($this->email , FILTER_VALIDATE_EMAIL)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }

    private function verifi_user() {
        
        if (!$this->checkUserExist($this->uid,$this->email))
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