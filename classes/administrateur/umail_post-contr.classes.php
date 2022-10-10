<?php
 include ('../classes/mk_img.classes.php');
class umail_to extends umail{
    private $user_from;
    private $user_to;
    private $subject;
    private $mail;
 
    private $upload_file;
    private $date;
    private $nom_file;
   public function __construct($user_from,$user_to,$subject,$mail,$upload_file,$date)
   {    $this->user_from=$user_from;
        $this->user_to=$user_to;
        $this->subject=$subject;
        $this->mail=$mail;
       
        $this->upload_file=$upload_file;
        $this->date=$date;

   }
   public function send(){
    if($this->InputVide()==false){
        header("Location: ../templates/administrateur/UMAIL-envoy.php?error=empty_input");
        exit(); 
    }
    if(!empty($this->upload_file['name'])){
        $this->nom_file=$this->upload_file['name']; 
        echo  "----".$this->nom_file;
    }else{
        
        $this->nom_file=0;
    }
    $this->id=$this->count();
    $this->id++;
    $this->envoyer_mail($this->user_from,$this->user_to,$this->subject,$this->mail,$this->file_Upload(),$this->nom_file,$this->date);
   }
   private function InputVide(){
   
    if(empty($this->user_to) || empty($this->subject) || empty($this->mail))
    {  
       $result=false;
    }else{
        $result=true;
    }
       return $result;
   }
   
   
   
   private function file_Upload(){
    $file=$this->upload_file; 
     
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
                    
                    $fileNameNew="file-".$this->user_from."-".$this->id."-".$this->date.".".$fileActualExt;
                    $fileDestination='../uploads/umail/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    if(file_exists("../uploads/umail/file-".$this->user_from."-".$this->id."-".$this->date.".pdf"))
                    {  $cImg=new mk_img();
                       $cImg->create("pfe/uploads/umail/file-".$this->user_from."-".$this->id."-".$this->date);
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