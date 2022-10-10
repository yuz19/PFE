<?php
 
require ('../../includes/user/securite-etudiant-inc.php');
include('../../includes/list_travaux_etudiant-inc.php');
include('../../includes/get_prof-inc.php');
$info=unserialize(urldecode(stripslashes($_GET['id'])));
$ltravaux=$listravaux->list_travaux($_SESSION['Codesection'],$_SESSION['gp'],$info['NSS'],$info['Codemodule']);
?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("travaux");?>
     
     
      
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

              <div class="search_box">
                    <form method="GET">
                    <input class="shearch" id="search-items" type="text" placeholder="Search..."  onkeyup="searchd()" >
                    
                    </form> 
            </div>
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
                                        <a href="etudiant_travaux_comment.php?id=<?= addslashes(urlencode(serialize($value['idtd_tp'])))?>">
                                        <?=$value['nom'].' par '.$prof->getprof($value['NSS']);?><br>
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
                    <p class="vide">pas de devoir</p>
                <?php }?>
         </div>
         <script src="../option.js"></script>
         <script src="app.js"> </script>
</body>
</html>