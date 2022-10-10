<?php
 
require ('../../includes/user/securite-prof-inc.php');
include('../../includes/list_travaux_prof-inc.php');
?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("travaux");?>
     
     
      
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

           
          <div id="add" class="back"> <a href="prof_travaux_open.php"><div id="plus">&#43;</div></a></div>
        </div>
            <div class="cont_cour">
            <?php if(!empty($ltravaux)) { ?>
                    <?php foreach($ltravaux as $key=>$value){?>
                    
                       
                    
                                <div class="cour">
                                
                                        <div class="left_cour"> 
                                        <?php if($value['nom_file']==0 or !file_exists("../../uploads/travaux/file-".$value['NSS']."-".$value['idtd_tp'].".pdf")){?>
                                            <img src="../../assets/IMAGE/devoir.jpg" height="80">
                                        <?php }else{?>
                                            
                                        <img src="../../uploads/travaux/file-<?=$value['NSS']?>-<?=$value['idtd_tp']?>.jpg" height="80" width="82">
                                        <?php } ?>
                            
                                        </div>
                                
                                        <div class="info_cour">
                                        <a href="prof_travaux_comment.php?id=<?=addslashes(urlencode(serialize($value['idtd_tp'])))?>">
                                                <?=$value['nom']?><br>
                                                <div class="desc"><?=str_replace('T',',',$value['date'])?></div>
                                        </a>     
                                        </div>
                                 
                                        <div class="upl"> 

                                        <a href="read.php?id=$id" download="<?=$value['nom_file']?>" >
                                              <img src="../../assets/IMAGE/download.png" height="30"  >
                                        </a>
                                        </div>
                                </div>
                         
                    <?php }?>
                    
                <?php }else{ ?>
                    <p class="vide">pas de travaux</p>
                <?php }?>
         </div>
         <script src="../option.js"></script>
</body>
</html>