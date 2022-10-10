<?php

class ajouter_prof_contr extends ajouter_prof{
   private $nom;
   private $nss;
   private $prenom;
 
   private $uid;
   private  $pwd;
   private  $pwdrepeat;
   private $grade;
   private $file;

    private $email;
   public function __construct($nss,$nom,$prenom,$uid,$pwd,$pwdrepeat,$grade,$numTel,$email,$file)
   {   
        $this->nss=$nss;
        $this->nom=$nom;
        $this->prenom=$prenom; 
        $this->uid=$uid;
        $this->file=$file;
        $this->pwd=$pwd;
        $this->pwdrepeat=$pwdrepeat;
        $this->email=strtolower($email);
        $this->grade=$grade;
        #$this->Niveau_specialite=$Niveau_specialite;
        $this->numTel=$numTel;
   }

   public function signupUser(){
       if($this->InputVide()==false){
            header("Location: ../../templates/administrateur/prof.php?error=emptyinput");
            exit();
       }
       if($this->verif_nss()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=matr_errorStat");
        exit();
      }
      if($this->invalidEmail()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=email_error");
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
      if(strcmp($this->pwd, $this->pwdrepeat) != 0){
        header("Location: ../../templates/administrateur/prof.php?error=password_n_est_pas_le_meme");
        exit();
      }
      $this->setUser($this->nss,$this->nom,$this->prenom,$this->uid,$this->pwd,$this->grade,$this->numTel,$this->email,$this->file_e());
   }
 
    private function InputVide(){
 
        if(empty($this->nom) || empty($this->prenom)||  empty($this->uid)||empty($this->grade)|| empty($this->pwd)|| empty($this->pwdrepeat) || empty($this->numTel)|| empty($this->nss))
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
   }
   private function verif_nss():bool{
    if(preg_match("#^[1-9][0-9]*$#",$this->nss)){
        $result=true;
    }else{
        $result=false;
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
    private function verif_prenom():bool{
        
        if(preg_match("#^\b([a-zA-Z]*[\s]{0,1})*[a-zA-Z]+$#",$this->prenom)){
            $result=true;
        }else{
        
            $result=false;
        }
        return $result;
    }
    private function verifi_uid() {
        
        if (!preg_match("/^([a-zA-Z0-9]*[_\s\.]*)*[a-zA-Z0-9]*$/", $this->uid))
        {
             $result = false;
        }
        else
        {
          $result = true;
        }
        return $result;
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
        
        if ($this->checkUserExist($this->uid,$this->email,$this->nss))
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
                        $fileNameNew="profile-".$this->nss.".png";
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
                    echo "there is an error uploading the file";
                    $img_status=0;
                    return $img_status;
                }
            }else{
                $img_status=0;
                return $img_status;
            }
        }
}