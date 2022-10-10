<?php
 
require ('../../includes/user/securite-etudiant-inc.php');
include('../../includes/list_devoir_etudiant-inc.php');
include('../../includes/get_prof-inc.php');
$info=unserialize(urldecode(stripslashes($_GET['id'])));
 
$ldevoirs=$lisdevoir->list_devoir_prof($_SESSION['Codesection'],$info['NSS'],$info['Codemodule'],$info['type']);
?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("devoir");?>
     
     
      
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
            <?php if(!empty($ldevoirs)) { ?>
                    <?php foreach($ldevoirs as $key=>$value){?>
                    
                       
                    
                                <div class="cour">
                                
                                        <div class="left_cour"> 
                                        <?php if($value['nom_file']==0 or !file_exists("../../uploads/devoir/file-".$value['NSS']."-".$value['iddev'].".pdf")){?>
                                            <img src="../../assets/IMAGE/devoir.jpg" height="80">
                                        <?php }else{?>
                                            
                                        <img src="../../uploads/devoir/file-<?=$value['NSS']?>-<?=$value['iddev']?>.jpg" height="80" width="82">
                                        <?php } ?>
                            
                                        </div>
                                
                                        <div class="info_cour">
                                        <a href="etudiant_devoir_comment.php?id=<?=addslashes(urlencode(serialize($value['iddev'])))?>">
                                             <?=$value['nom'].' par '.$prof->getprof($value['NSS']);?><br>
                                                <div class="desc" style="color:red;"><?=str_replace('T',',',$value['deadline'])?></div>
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