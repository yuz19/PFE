<?php

class modifier_etudiant_contr extends  modifier_etudiant{
   private $nom;
   private $matricule;
   private $prenom;
   private  $email;
   private $uid;
   private $file;
   private  $pwd;
   private  $pwdrepeat;
   private $codesection;
   private $group;
    private $tem_img_status;
    private $save_mat;
    private $save_pwd;
    private $save_email;
    private $save_uid;
   public function __construct($matricule,$nom,$prenom,$uid,$email,$pwd,$pwdrepeat,$codesection,$group,$file,$tem_img_status,$save_mat,$save_pwd,$save_email,$save_uid)
   {   
        $this->matricule=$matricule;
        $this->nom=$nom;
        $this->prenom=$prenom; 
        $this->uid=$uid;
        $this->email=strtolower($email);
        $this->pwd=$pwd;
        $this->pwdrepeat=$pwdrepeat;
        $this->file=$file;
        $this->codesection=$codesection;
        $this->tem_img_status=$tem_img_status;
        $this->save_uid=$save_uid;
        $this->save_email=$save_email;       
        $this->save_mat=$save_mat;
        $this->save_pwd=$save_pwd;
        $this->group=$group;
   }

   public function ModiferUser(){
       if($this->InputVide()==false){
            header("Location: ../../templates/administrateur/etudiant.php?error=emptyinput");
            exit();
       }
       if($this->verif_matricule()==false){
           header("Location: ../../templates/administrateur/etudiant.php?error=matr_errorStat");
       }
       if($this->verif_nom()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=nom_errorStat");
        exit();
      }
      if($this->verif_prenom()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=prenom_errorStat");
        exit();
      }
      if($this->verifi_uid()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=user_errorStat");
        exit();
      }/*
      if($this->checkSP($this->codesp)==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=specialite_n'exist_pas");
        exit();
      }*/
      if($this->invalidEmail()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=email_errorStat");
        exit();
      }
      if($this->verifi_user()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=user_existe_or_email_already_used");
        exit();
      }
     
     
         if($this->sameMAT($this->save_mat,$this->matricule)==true){
        $this->setUser_sameMatricule($this->matricule,$this->nom,$this->prenom,$this->uid,$this->pwd,$this->email,$this->codesection,$this->group,$this->file_e(),$this->save_mat,$this->save_pwd);
         }else{
        $this->setUser_DiffMatricule($this->matricule,$this->nom,$this->prenom,$this->uid,$this->pwd,$this->email,$this->codesection,$this->group,$this->file_e(),$this->save_mat,$this->save_pwd);
         }
   }

    private function InputVide(){
 
        if(empty($this->matricule) ||empty($this->nom) || empty($this->prenom)||  empty($this->uid)||empty($this->email) ||empty($this->codesection)  || empty($this->pwd)|| empty($this->pwdrepeat))
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
   }
   private function verif_matricule(){
        if(strlen($this->matricule)<18){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
   }
   private function sameMAT($save_mat,$mat){
    if($save_mat==$mat){
        return true;
        //ustiliser setUser_sameNSS()
    }else{
        return false;
        //utiliseer setUser_DiffNSS()
    }
}
    private function verif_nom():bool{
    
        if(preg_match("#^\b[a-zA-Z]+$#",$this->nom)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
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
    } /*
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
     
    }*/
    private function invalidEmail(){
        if(filter_var($this->email , FILTER_VALIDATE_EMAIL)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }

    private function verifi_user() {
        
        if ($this->checkUserExist($this->uid,$this->matricule,$this->save_mat,$this->email,$this->save_uid,$this->save_email))
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
                    if($this->matricule==$this->save_mat){
                        $fileNameNew="profile-".$this->matricule.".png";
                        $fileDestination='../../uploads/etudiants/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $img_status=1;
                        return   $img_status; 
                    }else{
                        $fileNameNew="profile-".$this->save_mat.".png";
                        $fileDestination='../../uploads/etudiants/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        rename($fileDestination,'../../uploads/etudiants/profile-'.$this->mat.'.png');
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
            if($this->matricule!=$this->save_mat and $this->tem_img_status==1){
                $fileNameNew="profile-".$this->save_mat.".png";
                $fileDestination='../../uploads/etudiants/'.$fileNameNew;
          
                rename($fileDestination,'../../uploads/etudiants/profile-'.$this->matricule.'.png');
            
            }
            return $this->tem_img_status;
        }
    }
}