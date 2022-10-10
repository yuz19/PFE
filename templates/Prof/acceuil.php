<?php 
 
require ('../../includes/user/securite-prof-inc.php');
 
include '../../includes/list_publication-inc.php';
 
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("acceuil");?>
    <div class="cont_acceuil">

           


            <div class="slider">
                <div class="slides">
                <?php if(!is_null($lPublications)) { ?>
                    <?php foreach($lPublications as $key=>$value){?>
                
                    <?php if($key==0){?>
                     <a href="publication.php?id=<?=$value['id']?>">
                     <div class="slide active ">

                            <div class="imga">   
                            <?php if($value['bg_status']==0){ ?>
                                <img src="../../uploads/publications/bgs/publication.png" >
                            <?php }else{?>
                                <img src="../../uploads/publications/bgs/profile-<?= $value['NSS']?>-<?=$value["id"]?>.png" >
                                
                            <?php }?>
                            </div>  

                            <div class="aa">
                                <div class="up">
                                    <img src="../../assets/ICON/user.png" width="40" >administartion 
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
                                    <img src="../../assets/ICON/user.png" width="40" >administartion 
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
                        <p class="vide">pas de publication</p>
                    <?php }  ?>
                    <div class="suivant">
                        <i class="fas fa-chevron-circle-right"></i>
                    </div>
                        <div class="precedent">
                        <i class="fas fa-chevron-circle-left"></i>
                    </div>
                 </div>
            </div>
            <div class="bot-acceuil">
                    
            </div>
    </div>


   


 </div>
 <script src="../script.js"></script>
</body>
</html>