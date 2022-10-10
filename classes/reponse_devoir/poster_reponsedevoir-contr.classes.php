<?php
include ('../classes/mk_img.classes.php');
class ajouter_reponsedevoir extends reponsedevoir{
    private $file;
    private $matricule;
    private $iddv;
   public function __construct($file,$matricule,$iddv)
   {   
        $this->file=$file;
        $this->matricule=$matricule;
        $this->iddv=$iddv; 
   }
   public function ajoute(){
    if($this->InputVide()==false){
        header("Location: ../templates/etudiants/etudiant_devoir_comment.php?id=".addslashes(urlencode(serialize($this->iddv)))."&error=emptyinput");
        exit();
   }
   if($this->verifier_exist($this->iddv,$this->matricule)==false){
          header("Location: ../templates/etudiants/etudiant_devoir_comment.php?id=".addslashes(urlencode(serialize($this->iddv)))."&error=vous_avez_deja deposer");
        exit();
   }
   
   /*
   $this->id=$this->count();
   $this->id++;*/
    $this->ajouter_reponse($this->iddv,$this->file_Upload(), $this->matricule);
   }
  
   private function InputVide(){
 
        if(empty($this->matricule)  or empty($this->file['size']))
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    private function file_Upload(){
        $file=$this->file; 
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
      
    
        $allowed=array('pdf');
    
            if(in_array($fileActualExt,$allowed)){
    
                if($fileError===0 ){
    
                    if($fileSize<70000000){
                        
                        $fileNameNew="file-".$this->matricule."-".$this->iddv.".".$fileActualExt;
                        $fileDestination='../uploads/reponse_devoir/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        if(file_exists("../uploads/reponse_devoir/file-".$this->matricule."-".$this->iddv.".pdf"))
                        {  $cImg=new mk_img();
                            
                           $cImg->create("pfe/uploads/reponse_devoir/file-".$this->matricule."-".$this->iddv);
                        }
                         
                        return   $fileName; 
                    
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
                echo "there is an error uploading the file";
                header("Location: ../templates/etudiants/etudiant_devoir_comment.php?id=".addslashes(urlencode(serialize($this->iddv)))."&error=error_format(must pdf)");
                exit();
            }
        }else{
            $img_status=0;
            return $img_status;
        }

    }

}