<?php
if(isset($_POST['submit']))
{session_start();
     
$user_to=$_POST['recepteur'];
$subject=$_POST['subject'];
$mail=$_POST['msg'];
$file=$_FILES['myFile'];
#$user_from=$_SESSION['id'];			 
$user_from="1962";	
echo('<pre>')	;	
 /*
if(!empty($file['name'])){
    foreach($file['name'] as $key=>$fil){
       $fileName[]=$fil;
    }
}
foreach($fileName as $key=>$fil){
    echo $fil;
}
print_r($fileName);*//*
$filea=[];
$filea[]=$file;
print_r($filea);
for($i=0;$i<count($file['name']);$i++){
 $files[]=[
        $i=>[
         'name'=> $file['name'][$i],
         'type'=>$file['type'][$i],
         'tmp_name'=>$file['tmp_name'][$i],
         'error'=>$file['error'][$i],
         'size'=>$file['size'][$i],
     ],

 ];
}
 print_r($file);
foreach($files as $file){
    foreach($file as $file_value){
        echo $file_value['name'];
    }
}
*/

 
$date=date("Y-m-d_H-i-s"); 
include ('../classes/dbh.classes.php');
include ("../classes/administrateur/umail.classes.php");
include ("../classes/administrateur/umail_post-contr.classes.php");		
 				 
$mail=new  umail_to($user_from,$user_to,$subject,$mail,$file,$date);
$mail->send();
header('Location: ../templates/administrateur/UMail-envoy.php?error=none');
}   