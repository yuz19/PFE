<?php
include ('../classes/mk_img.classes.php');
class ajouter_cour extends poster_cour{
    private $nom;
    private $date;
    private $section;
    private $uplaod_file;
    private $NSS;
    private $id;
   public function __construct($nom,$date,$section,$uplaod_file,$NSS)
   {   
        $this->date=$date;
        $this->nom=$nom;
        $this->section=$section;
        $this->uplaod_file=$uplaod_file;
        $this->NSS=$NSS;
   }
   public function ajoute(){
    if($this->InputVide()==false){
        header("Location: ../templates/Prof/prof_cours_open.php?error=emptyinput");
        exit();
   }
   $this->id=$this->count();
   $this->id++;
    $this->ajt_cour($this->nom, $this->date, $this->section,$this->file_Upload(),$this->NSS);
   }
  
   private function InputVide(){
 
        if(empty($this->nom) or empty($this->NSS) or empty($this->section) or empty($this->uplaod_file['name']) )
        {
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    private function file_Upload(){
        $file=$this->uplaod_file; 
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
                        
                        $fileNameNew="file-".$this->NSS."-".$this->id.".".$fileActualExt;
                        $fileDestination='../uploads/cours/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        if(file_exists("../uploads/cours/file-".$this->NSS."-".$this->id.".pdf"))
                        {  $cImg=new mk_img();
                            
                           $cImg->create("pfe/uploads/cours/file-".$this->NSS."-".$this->id);
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
                header("Location: ../templates/Prof/prof_cours_open.php?error=error_format(must pdf)");
                exit();
            }
        }else{
            $img_status=0;
            return $img_status;
        }

    }

}