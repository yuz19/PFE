<?php 
require ('../../includes/user/securite-etudiant-inc.php');
$id=$_GET['id'];
include '../../includes/get_publication-inc.php';
 
$lPublications=$publications->getPublication($id);
if(!isset($lPublications)){
   header('Location: acceuil.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
<link rel="stylesheet" href="../../assets/style_admin.css">
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("acceuil");?>
    
     
 
    <div class="cont_acceuil">
        <a href="acceuil.php"><div class="back" style="top: 40px;"><div class="arrow"></div></div></a>
         <div class="slide_pub" >
    
            <div class="slide_header">
               <?= $lPublications[0]['titre']    ?>
              
            </div>
            <hr>
            <div class="slide_cont">
            <?= $lPublications[0]['contenu']?> 
            </div>
            <?php  if(file_exists("../../uploads/publications/files/file-".$lPublications[0]['NSS']."-".$id.".pdf"))
            {  
               
               
               echo "
               <a href='read.php?id=$id' >
               <div class='pdf_min'  style='margin-bottom:50px;'>
               <img class='pdf' src='../../uploads/publications/files/file-".$lPublications[0]['NSS']."-".$id.".jpg' height='200' width='140'>
               <a href='read.php?id=$id' download='".$lPublications[0]['nom_file']."' ><img src='../../assets/IMAGE/download.png' height='30' style='position:absolute; top:55%;  margin-left:0.8%;'></a>
               </div>
               </a>
               ";
              } ?> 
             
         </div>  

    </div>


   


 </div>
 
</body>
</html>