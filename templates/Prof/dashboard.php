<?php 
 
require ('../../includes/user/securite-prof-inc.php');
include('../../includes/stat_simp-inc.php');
 
 
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
 
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("dashboard");?>
    
    <div class="cont_dashboard">


        <div class="stat_general">
                <div class="stat_info">
                    &ensp;<div><img src="../../assets/IMAGE/stat/test.png" width="80" height="80" alt=""></div>
                    <div class="num"><h2><?=$stats[1]['devoir']?> </h2><p>Devoir poster</p></div>
                </div>
                <div class="stat_info">
                    <div><img src="../../assets/IMAGE/stat/eye.png" width="80" height="80" alt=""></div>
                    <div class="num"><h2><?=$stats[0]['cours']?></h2> <p>Cour poster</p></div>
                </div>
                <div class="stat_info">
                    <div><img src="../../assets/IMAGE/stat/team.png" width="80" height="80" alt=""></div>
                    <div class="num"><h2><?php if(!empty($etudiant_online)){ echo count($etudiant_online);}else{echo 0;}?></h2> <p>Eleves online </p>
                    </div>
                </div>
                 
                <button id="desc"><a href="dashboard_more.php">Voir Plus</a></button>
        </div>


        <div class="extra">
            <div class="list_eleve">
                <div class="opt">
                <div class="search_box">
                    <form method="GET">
                    <input class="shearch" id="search-items" type="text" placeholder="Search..."  onkeyup="searchd()" >
                     
                    </form> 
                </div>
              
                </div>
               
              
                <div class="eleve">
                <?php if(!empty($etudiants)){?>
                    <?php foreach($etudiants as $value){?> 
                    <div class="eleve_info">
                        <div>
                        <?php 
                            if($value['img_status']==0){
                                echo ("<img  id='profil'  src='../../assets/ICON/user.png' height='60'>");
                            }else{
                                echo("<img  id='profil'  src='../../uploads/etudiants/profile-".$value['matricule'].".png'  height='55' width='55' style='border-radius:50%;'>");
                            }
                            ?>
                        </div>
                        <div class="info_elev">
                            <h3><?=$value['nom'].' '.$value['prenom']?> </h3>  
                            matricule:<?=$value['matricule'].' | '.str_replace('_',' ',$value['Codesection'])?>
                        </div>
                 
                    </div>
                    <?php }?>
                <?php }else{ ?>
                    <p class="vide">pas d'etudiant </p>
                <?php } ?>
              
                </div>
            </div>

        <div class="list_online"> 
        <?php if(!empty($etudiant_online)){?>
                    <?php foreach($etudiant_online as $value){?> 
            <div class="online">
                 <?php 
                            if($value['img_status']==0){
                                echo ("<img  id='profil'  src='../../assets/ICON/user.png' height='50'>");
                            }else{
                                echo("<img  id='profil'  src='../../uploads/etudiants/profile-".$value['matricule'].".png'  height='55' width='55' style='border-radius:50%;'>");
                            }
                            ?>
                <div class="nom_online"><?=$value['nom'].' '.$value['prenom'].' | '.str_replace('_',' ',$value['Codesection'])?>  </div>  
                
                  <span></span>
            </div>
            <?php }?>
                <?php }else{ ?>
                    <p class="vide" style="width: 100%; margin-left:20px;">0 etudiant online</p>
                <?php } ?>
           
       
        
        </div>
      
        </div>
    </div>
 </div>
 <script src="../app.js"> </script>
</body>
</html>