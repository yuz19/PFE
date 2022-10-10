<?php /*
$id=2;
$cpt=0;
 $reponse_devoirs=glob("uploads/reponse_devoir/*");
 
 foreach($reponse_devoirs as $file){
    if(preg_match("/$id\.jpg$/",$file) ){
      unlink($file);
 }   
 if(preg_match("/$id\.pdf$/",$file) ){
    unlink($file);
}

}
echo $cpt;

$prenom="faouzi ahed";
if(preg_match("#^\b([a-zA-Z]*[\s]{0,1})*[a-zA-Z]+$#",$prenom)){
    $result=1;
}else{

$result=0;
}
echo $result."-";*/
$reponse_devoirs=glob("uploads/devoir/*");
 $id=206;
foreach($reponse_devoirs as $file){
   if(preg_match("/$id/",$file) ){
    echo $file;
}       
 

}