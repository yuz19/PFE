<?php

class ajouter_etudiant_contr extends ajouter_etudiant{
   private $nom;
   private $matricule;
   private $prenom;
   private  $email;
   private $uid;
   private  $pwd;
   private $file;
   private  $pwdrepeat;
   private $codesection;
   private $Niveau_specialite;
   private $codesp;

   public function __construct($matricule,$nom,$prenom,$uid,$email,$pwd,$pwdrepeat,$codesp,$codesection,$Niveau_specialite,$file)
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
        $this->Niveau_specialite=$Niveau_specialite;
        $this->codesp=$codesp;
   }

   public function signupUser(){
  
       if($this->InputVide()==false){
            header("Location: ../../templates/administrateur/etudiant.php?error=emptyinput ");
          
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
      }
      if($this->checkSP($this->codesp)==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=specialite_n'exist_pas");
        exit();
      }
      if($this->invalidEmail()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=email_errorStat");
        exit();
      }
      if($this->verifi_user()==false){
        header("Location: ../../templates/administrateur/etudiant.php?error=user_existe_or_email_already_used");
        exit();
      }
      
      $this->setUser($this->matricule,$this->nom,$this->prenom,$this->uid,$this->pwd,$this->email,$this->codesp,$this->codesection,$this->Niveau_specialite,$this->file_e());
   }

    private function InputVide(){
 
        if(empty($this->matricule) ||empty($this->nom) || empty($this->prenom)||  empty($this->uid)||empty($this->email)||empty($this->codesp) ||empty($this->codesection) ||empty($this->codesection) || empty($this->pwd))
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
    private function verif_nom():bool{
    
        if(preg_match("#^\b[a-zA-Z]+$#",$this->nom)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }
    private function verif_prenom():bool{
        
        if(preg_match("#^\b[a-zA-Z]+$#",$this->prenom)){
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
        if(filter_var($this->email , FILTER_VALIDATE_EMAIL)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }

    private function verifi_user() {
        
        if ($this->checkUserExist($this->uid,$this->email,$this->matricule))
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
    if(!empty($file['name'])){ 
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
                    $fileNameNew="profile-".$this->matricule."png";
                    $fileDestination='../../uploads/etudiants/'.$fileNameNew;
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
            }
        }
    }else{
        $img_status=0;
        return $img_status;
    }
    }
}