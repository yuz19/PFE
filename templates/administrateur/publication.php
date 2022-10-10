<?php
require ('../../includes/user/securite-administrateur-inc.php');
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../../assets/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>USTHB-admin</title>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("acceuil");?>
    
     
 
    <div class="cont_acceuil">
        <a href="acceuil.php"><div class="back" style="top: 40px;"><div class="arrow"></div></div></a>
         <div class="slide_pub">
    
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
               <div class='pdf_min'>
               <img class='pdf' src='../../uploads/publications/files/file-".$lPublications[0]['NSS']."-".$id.".jpg' height='200' width='140'>
               <a href='read.php?id=$id' download='".$lPublications[0]['nom_file']."' ><img src='../../assets/IMAGE/download.png' height='30' style='position:absolute; top:55%;  margin-left:0.8%;'></a>
               </div>
               </a>
               ";
              } ?> 
            
            <form action="../../includes/supp_publication-inc.php" method="GET">
               <input type="hidden" name="id" value="<?=$id?>">
                <button  type="submit" style="background-color: red;font-size:20px ;font-weight:bolder;border:none; padding:5px;float:right; margin:20px;">supprimer</button>
            </form>
         </div>  

    </div>


   


 </div>
 
</body>
</html>