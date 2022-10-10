<?php

class modifier_profil_prof_contr extends  modifier_profil_prof{
 
    private $id;
 
    private  $email;
    private $uid;
    private $file;
    private  $pwd;
    private  $pwdrepeat;
    private $save_email;
    private $save_uid;
    private $save_pwd;
 
    public function __construct($id,$uid,$email,$pwd,$pwdrepeat,$file,$tem_img_status,$save_pwd,$save_email,$save_uid)
    {   
         $this->id=$id;
          
       
         $this->uid=$uid;
         $this->email=strtolower($email);
         $this->pwd=$pwd;
         $this->pwdrepeat=$pwdrepeat;
         $this->file=$file;
         $this->tem_img_status=$tem_img_status;
         $this->save_uid=$save_uid;
         $this->save_email=$save_email;       
 
         $this->save_pwd=$save_pwd;
      
    }
 
    public function ModiferUser(){
        if($this->InputVide()==false){
             header("Location: ../../templates/prof/profil.php?error=emptyinput");
             exit();
        }
      
       if($this->verifi_uid()==false){
         header("Location: ../../templates/prof/profil.php?error=user_errorStat");
         exit();
       }/*
       if($this->checkSP($this->codesp)==false){
         header("Location: ../../templates/administrateur/etudiant.php?error=specialite_n'exist_pas");
         exit();
       }*/
       if($this->invalidEmail()==false){
         header("Location: ../../templates/prof/profil.php?error=email_errorStat");
         exit();
       }
       if($this->verifi_user()==false){
         header("Location: ../../templates/prof/profil.php?error=user_existe_or_email_already_used");
         exit();
       }
 
       $this->setprofil($this->id,$this->uid,$this->pwd,$this->email,$this->file_e(),$this->save_pwd);
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
     private function file_e(){
     
         $file=$this->file;
     if(!empty($this->file['name'])){  
         $fileName= $file['name'];
         $fileTmpName= $file['tmp_name'];
         $fileSize= $file['size'];
         $fileError=$file['error'];
         $fileType=$file['type'];
         
     
         $fileExt=explode('.',$fileName);
         $fileActualExt=strtolower(end($fileExt));
         echo $fileActualExt;
     
         $allowed=array('jpg','jpeg','png');
     
             if(in_array($fileActualExt,$allowed)){
     
                 if($fileError===0){
     
                     if($fileSize<5000000){
   
                         $fileNameNew="profile-".$this->id.".png";
                         $fileDestination='../../uploads/profs/'.$fileNameNew;
                         move_uploaded_file($fileTmpName,$fileDestination);
                         $img_status=1;
                         return   $img_status; 
                 
 
                    
                     
                     }else{
                         echo "your file is too big!";
                         $img_status=0;
                         return $img_status;
                     }
     
                 }else{
                    $img_status=0;
                    return $img_status;
                     echo "there is an error uploading the file";
                 }
             }
         }else{
            
             return $this->tem_img_status;
         }
     }
 }


