<?php 
 
require ('../../includes/user/securite-prof-inc.php');
include('../../includes/list_reponse_devoir-inc.php');

?>  
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
<div class="container">
   
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("devoir");?>
      
    <div class="cont">
        <div class="head_cont">
            <div class="top_cont">

              <div class="r btnacti">
                  <img src="../../assets/IMAGE/line1off.png" width="30" height="30">
              </div>
              <div class="l">
              <img src="../../assets/IMAGE/square1off.png" width="30" height="30">
              </div>
          
          
            </div>

          <div id="add" class="back"> <a href="prof_devoir_open.php"><div id="plus">&#43;</div></a></div>
      </div>


        
        
        <div class="cont_cour ">
       
             <?php if(!empty($lreponsedevoir)) { ?>
                    <?php foreach($lreponsedevoir as $key=>$value){?>
                    
                       
                    
                                <div class="cour">
                                
                                        <div class="left_cour"> 
                                        <a href="read_reponse_devoir.php?matricule=<?=$value['matricule']?>&id=<?=$_GET['id']?>">
                                        <?php if($value['nom_file']==0 or !file_exists("../../uploads/reponse_devoir/file-".$value['matricule']."-".$value['iddev'].".pdf")){?>
                                            <img src="../../assets/IMAGE/devoir.jpg" height="80">
                                        <?php }else{?>
                                            
                                        <img src="../../uploads/reponse_devoir/file-<?=$value['matricule']?>-<?=$value['iddev']?>.jpg" height="80" width="82">
                                        <?php } ?>
                                        </a>
                                        </div>
                                
                                        <div class="info_cour" style="cursor: default;"> 
                                               <p><?=$etudiant->get_etudiant($value['matricule'])?></p>
                                                <div class="desc">  <?=$value['matricule']?></div>
                                           
                                        </div>
                                 
                                        <div class="upl"> 

                                        <a href="read.php?id=$id" download="<?=$value['nom_file']?>" >
                                              <img src="../../assets/IMAGE/download.png" height="30"  >
                                        </a>
                                        </div>
                                </div>
                         
                    <?php }?>
                    
                <?php }else{ ?>
                    <p class="vide">pas de reponse</p>
                <?php }?>

           
                
        </div>
    </div>
</div>
  
<script src="../option.js"></script>
</body>
</html>