<?php
include ('../classes/mk_img.classes.php');
class publication_contr extends publication{
    private $titre;
    private $contenu;
    private $bg_img;
    private $upload_file;
    private $nss;
    private $nom_file;
    private $id;
   public function __construct($nss,$titre,$contenu,$bg_img,$upload_file)
   {    $this->nss=$nss;
        $this->titre=$titre;
        $this->contenu=$contenu;
        $this->bg_img=$bg_img;
        $this->upload_file=$upload_file;
   
     
   }
   public function addPub(){
       if($this->InputVide()==false){
        header("Location: ../templates/administrateur/acceuil.php?error=empty_input");
        exit(); 
       }
        if($this->verifier_titre()==false){
            header("Location: ../templates/administrateur/acceuil.php?error=titre>taille max");
            exit();
        }
        $this->id=$this->count();
        $this->id++;
        if(!empty($this->upload_file['name'])){
            $this->nom_file=$this->upload_file['name']; 
        }else{
            
            $this->nom_file=0;
        }
        if($this->upload_file['size']>=70000000){
            header("Location: ../templates/administrateur/acceuil.php?error=titre>taille max");
            exit();
        }
        $this->postPublication($this->nss,$this->titre,$this->contenu,$this->file_bg(),$this->file_Upload(),$this->nom_file);
   }
   public function verifier_titre(){
       $titre=$this->titre;
       if(strlen($titre)>50){
           return false;
       }else{
           return true;
       }
   }
   
   private function InputVide(){
   
     if(empty($this->titre) || empty($this->contenu))
     {  
        $result=false;
     }else{
         $result=true;
     }
        return $result;
    }    
    

    private function file_bg(){
        $file=$this->bg_img; 
        print_r($file); 
         if(!empty($file['name'])){ 
        $fileName= $file['name'];
        $fileTmpName= $file['tmp_name'];
        $fileSize= $file['size'];
        $fileError=$file['error'];
        $fileType=$file['type'];
        
    
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
      
    
        $allowed=array('jpg','jpeg','png');
    
            if(in_array($fileActualExt,$allowed)){
    
                if($fileError===0){
    
                    if($fileSize<5000000){
                   
                        $fileNameNew="profile-".$this->nss."-".$this->id.".png";
                        $fileDestination='../uploads/publications/bgs/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $img_status=1;
                        return   $img_status; 
                    
                    }else{
                        echo "your file is too big!";
                        $img_status=2;
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
        private function file_Upload(){
            $file=$this->upload_file; 
            print_r($file);
            echo($file['name']);
        if(!empty($file['name'])){ 
            $fileName= $file['name'];
            $fileTmpName= $file['tmp_name'];
            $fileSize= $file['size'];
            $fileError=$file['error'];
            $fileType=$file['type'];
            
        
            $fileExt=explode('.',$fileName);
            $fileActualExt=strtolower(end($fileExt));
          
        
            $allowed=array('jpg','jpeg','png','pdf');
        
                if(in_array($fileActualExt,$allowed)){
        
                    if($fileError===0 ){
        
                        if($fileSize<70000000){
                            
                            $fileNameNew="file-".$this->nss."-".$this->id.".".$fileActualExt;
                            $fileDestination='../uploads/publications/files/'.$fileNameNew;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            if(file_exists("../uploads/publications/files/file-".$this->nss."-".$this->id.".pdf"))
                            {  $cImg=new mk_img();
                                
                               $cImg->create("pfe/uploads/publications/files/file-".$this->nss."-".$this->id);
                            }
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
                }
            }else{
                $img_status=0;
                return $img_status;
            }
    
        }




}
