<?php

class modifier_prof_contr extends modifier_prof{
    private $nom;
    private $nss;
    private $prenom;
    private $tem_img_status;
    private $uid;
    private  $pwd;
    private  $pwdrepeat;
    private $grade;
    private $file;
    private $email;
    private $save_nss;
    private $save_pwd;
    private $save_email;
    private $save_uid;
   public function __construct($nss,$nom,$prenom,$uid,$pwd,$pwdrepeat,$grade,$numTel,$email,$file,$tem_img_status,$save_nss,$save_pwd,$save_email,$save_uid)
   {   
        $this->nss=$nss;
        $this->nom=$nom;
        $this->prenom=$prenom; 
        $this->uid=$uid;
        $this->file=$file;
        $this->pwd=$pwd;
        $this->pwdrepeat=$pwdrepeat;
        $this->tem_img_status=$tem_img_status;
        $this->grade=$grade;
        $this->email=strtolower($email);
        $this->save_uid=$save_uid;
        $this->save_email=$save_email;
        #$this->Niveau_specialite=$Niveau_specialite;
        $this->numTel=$numTel;
        $this->save_nss=$save_nss;
        $this->save_pwd=$save_pwd;
   }

   public function ModiferUser(){
       if($this->InputVide()==false){
            header("Location: ../../templates/administrateur/prof.php?error=emptyinput");
            exit();
       }
   
       if($this->verif_nom()==false){
        header("Location: ../../templates/administrateur/prof.php?error=nom_errorStat");
        exit();
      }
      if($this->verif_prenom()==false){
        header("Location: ../../templates/administrateur/prof.php?error=prenom_errorStat");
        exit();
      }
      if($this->verifi_uid()==false){
        header("Location: ../../templates/administrateur/prof.php?error=user_errorStat");
        exit();
      }

      if($this->verifi_user()==false){
        header("Location: ../../templates/administrateur/prof.php?error=user_existe_or_email_already_used");
        exit();
      }
      
    
 
 
    if($this->sameNSS($this->save_nss,$this->nss)==true){
        $this->setUser_sameNSS($this->nss,$this->nom,$this->prenom,$this->uid,$this->pwd,$this->grade,$this->numTel,$this->email,$this->file_e(),$this->save_nss,$this->save_pwd);
    }else{
        $this->setUser_DiffNSS($this->nss,$this->nom,$this->prenom,$this->uid,$this->pwd,$this->grade,$this->numTel,$this->email,$this->file_e(),$this->save_nss,$this->save_pwd);
    }

       
   }
 
    private function InputVide(){
 
        if(empty($this->nom) || empty($this->prenom)||  empty($this->uid)||empty($this->grade)|| empty($this->pwd)|| empty($this->pwdrepeat) || empty($this->numTel))
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
   }
 
    private function verif_nom():bool{
    
        if(preg_match("#^\b[a-zA-Z]+$#",$this->nom)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }

    private function sameNSS($save_nss,$nss){
        if($save_nss==$nss){
            return true;
            //ustiliser setUser_sameNSS()
        }else{
            return false;
            //utiliseer setUser_DiffNSS()
        }
    }
    private function verif_prenom():bool{
        
        if(preg_match("#^\b([a-zA-Z]*[\s]{0,1})*[a-zA-Z]+$#",$this->prenom)){
            $result=true;
        }else{
        
            $result=false;
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

    private function verifi_user(){

        if ($this->checkUserExist($this->uid,$this->nss,$this->save_nss,$this->email,$this->save_uid,$this->save_email))
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
                    if($this->nss==$this->save_nss){
                        $fileNameNew="profile-".$this->nss.".png";
                        $fileDestination='../../uploads/profs/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $img_status=1;
                        return   $img_status; 
                    }else{
                        $fileNameNew="profile-".$this->save_nss.".png";
                        $fileDestination='../../uploads/profs/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        rename($fileDestination,'../../uploads/profs/profile-'.$this->nss.'.png');
                        $img_status=1;
                        return   $img_status; 
                    }
                      
                   
                    
                    }else{
                        echo "your file is too big!";
                        $img_status=0;
                        return $img_status;
                    }
    
                }else{
                    echo "there is an error uploading the file";
                }
            }
        }else{
            if($this->nss!=$this->save_nss and $this->tem_img_status==1){
                $fileNameNew="profile-".$this->save_nss.".png";
                $fileDestination='../../uploads/profs/'.$fileNameNew;
          
                rename($fileDestination,'../../uploads/profs/profile-'.$this->nss.'.png');
            
            }
            return $this->tem_img_status;
        }
    }
}
