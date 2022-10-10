<?php
include ('../classes/mk_img.classes.php');
class ajouter_travaux extends poster_travaux{
    private $nom;
    private $date;
    private $section;
    private $uplaod_file;
    private $NSS;
    private $id;
    private $group;
   public function __construct($nom,$date,$section,$file,$NSS,$group)
   {   

        $this->nom=$nom;
        $this->date =$date;
        $this->section=$section;
        $this->uplaod_file=$file;
        $this->NSS=$NSS;
        $this->group=$group;
   }
   public function ajoute(){
    if($this->InputVide()==false){
        header("Location: ../templates/Prof/prof_travaux_open.php?error=emptyinput");
        exit();
   }
   $this->id=$this->count();
   $this->id++;
    $this->ajt_travaux($this->nom, $this->date, $this->section,$this->file_Upload(),$this->NSS ,$this->group);
   }
  
   private function InputVide(){
 
        if(empty($this->nom) or empty($this->NSS) or empty($this->section) or empty($this->uplaod_file['name']) or empty($this->group))
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
    
       
                        
                        $fileNameNew="file-".$this->NSS."-".$this->id.".".$fileActualExt;
                        $fileDestination='../uploads/travaux/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        if(file_exists("../uploads/travaux/file-".$this->NSS."-".$this->id.".pdf"))
                        {  $cImg=new mk_img();
                            
                           $cImg->create("pfe/uploads/travaux/file-".$this->NSS."-".$this->id);
                        }
                         
                        return   $fileName; 
                    
                
    
                }else{
                    echo "there is an error uploading the file";
                    $img_status=0;
                    return $img_status;
                }
            }else{
                echo "there is an error uploading the file";
                header("Location: ../templates/Prof/prof_travaux_open.php?error=error_format(must pdf)");
                exit();
            }
        }else{
            $img_status=0;
            return $img_status;
        }

    }

}