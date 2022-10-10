
<?php 
 
 require ('../../includes/user/securite-etudiant-inc.php');
 include('../../includes/list_cour_etudiant-inc.php');
 include('../../includes/get_prof-inc.php');
 $info=unserialize(urldecode(stripslashes($_GET['id'])));
 $lcours=$liscours->list_cour($_SESSION['Codesection'],$info['NSS'],$info['Codemodule']);
 ?>  
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("cours");?>
    
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



        <div class="cont_cour ">
 
 
            <?php if(!empty($lcours)) { ?>
                    <?php foreach($lcours as $key=>$value){?>
                    
                       
                    
                                <div class="cour">
                                
                                        <div class="left_cour"> 
                                        <?php if($value['nom_file']==0 or !file_exists("../../uploads/cours/file-".$value['NSS']."-".$value['idcours'].".pdf")){?>
                                            <img src="../../assets/IMAGE/img_graduation.jpg" height="80">
                                        <?php }else{?>
                                            
                                        <img src="../../uploads/cours/file-<?=$value['NSS']?>-<?=$value['idcours']?>.jpg" height="80" width="82">
                                        <?php } ?>
                            
                                        </div>
                                
                                        <div class="info_cour">
                                        <a href="etudiant_cour_comment.php?id=<?=addslashes(urlencode(serialize($value['idcours'])))?>">
                                                <?=$value['nom'].' par '.$prof->getprof($value['NSS']);?><br>
                                                <div class="desc"><?=$value['date']?></div>
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
                    <p class="vide">pas de cours</p>
                <?php }?>
     
     
   
    </div>
    </div>
 </div>
 <script src="../option.js"></script>
 <script src="app.js"> </script>
</body>
</html>