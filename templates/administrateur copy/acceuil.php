<?php
include '../../includes/list_publication-inc.php';
 
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

            <div class="top-acceuil ">
                <div class="back2"><div class="arrow2"></div></div> 
                    <form  action="../../includes/pub_admin-inc.php" method="post" enctype='multipart/form-data'>
                 
                        <input type="text" name="titre" maxlength="50" placeholder="Titre de la publication......."> 
                        <textarea type="text"name="contenu" placeholder="contenu......."></textarea><br><br>

                        <input type="file" class="file" id="file1" name="bg_img">
                        <label for="file1">
                            <span id="plus_devoir">&#43;</span> Ajouter une arriere plan
                        </label><br>

                        <input type="hidden" name="nss"  value="1962"  >

                        <input type="file" class="file" id="file2" name="upload_file">
                        <label for="file2">
                            <span id="plus_devoir">&#43;</span> Ajouter une fichier
                        </label><br><br>
                     
                        <button type="submit" name="submit" >Publier</button>
                        
                    </form>  
            </div>
         
          <div class="back3"><div class="arrow3"></div></div> 
            <div class="slider">    
                <div class="slides">
                    <?php if(count($lPublications)>0) { ?>
                    <?php foreach($lPublications as $key=>$value){?>
                
                    <?php if($key==0){?>
                     <a href="publication.php?id=<?=$value['id']?>">
                     <div class="slide active ">

                            <div class="imga">   
                            <?php if($value['bg_status']==0){ ?>
                                <img src="../../uploads/publications/bgs/publication.png" >
                            <?php }else{?>
                                <img src="../../uploads/publications/bgs/profile-<?=$value['NSS']?>-<?=$value["id"]?>.png" >
                                
                            <?php }?>
                            </div>  

                            <div class="aa">
                                <div class="up">
                                    <img src="../../assets/ICON/user.png" width="40" >administartion<?=$value["id"]?>
                                </div>      
                                <hr>
                                <div class="bod">
                                    <h1><?=$value["titre"]?></h1>
                                    <p>
                                     <?=$value["contenu"]?>
                                    </p>
                                </div>
                        
                            </div>    
                     </div>
                    </a>
                    <?php }?>
            
                    <a href="publication.php?id=<?=$value['id']?>">
                     <div class="slide  ">

                          <div class="imga">   
                            <?php if($value['bg_status']==0){ ?>
                                <img src="../../uploads/publications/bgs/publication.png" >
                            <?php }else{?>
                                <img src="../../uploads/publications/bgs/profile-<?= $value['NSS']?>-<?=$value["id"]?>.png" >
                                
                            <?php }?>
                            </div>    

                            <div class="aa">
                                <div class="up">
                                    <img src="../../assets/ICON/user.png" width="40" >administartion<?=$value["id"]?>
                                </div>      
                                <hr>
                                <div class="bod">
                                    <h1><?=$value["titre"]?></h1>
                                    <p>
                                    <?php echo($value["contenu"]);?>
                                    </p>
                                </div>
                        
                            </div>    
                     </div>
                    </a>
                    <?php }  ?>
                
                    <?php }else{?>
                        <p>pas de publication</p>
                    <?php }  ?>
                    
                    <div class="suivant">
                        <i class="fas fa-chevron-circle-right"></i>
                    </div>
                        <div class="precedent">
                        <i class="fas fa-chevron-circle-left"></i>
                    </div>
                 </div>
            </div>
         
    </div>


   


 </div>
 <script src="app.js"></script> 
 <script src="../script.js"></script>
</body>
</html>