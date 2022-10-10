<?php 
require ('../../includes/user/securite-administrateur-inc.php');
include ('../../includes/list_module-inc.php');
include ('../../includes/list_specialite-inc.php');
#print_r($lisection);
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
    <link rel="stylesheet" href="../../assets/style_admin.css">
 
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("module");?>
 
    <div class="list"   >
        <div class="back4"><div class="arrow2"></div></div> 
            <div class="list_eleve">
                <div class="opt">
                <div class="search_box">
                    <form method="GET">
                    <input class="shearch" id="search-items" type="text" placeholder="Search..."  onkeyup="searchd()" >
                    
                    </form> 
                </div>
              
          
                </div>
                <div class="eleve"  >
                    <?php if(!empty($lmod)) {?>
                    <?php foreach ($lmod as  $key=>$value) {?>
                            
                        <div class="eleve_info">
                            <div>
                             
                            
                            <img  class='profil'  src=' ' height='70' width="70"  style="visibility:hidden;">  
                            
                            
                            </div>
                    
                            <div class="info_elev">
                                <h3><?= 'Code Module :'.$value['Codemodule']?></h3>  
                                Module :<?= $value['Titre'].'-Coeficient:'.$value['Coeficient'].'-Unite :'.$value['Unite'] ?>
                            </div>
                            
                         <a href=" module-modifier.php?id=<?= $key?>  "><button  class="modifier"  >modifier</button></a>
                            
                        </div>  
                    <?php }?>
           
                    <?php }else{?>
                        <p class="vide">0 module</p>
                    <?php }?>
                </div>
           </div>
    </div>
    <div class="form_etude form_module"  style="  display: none;">
        <form action="../../includes/ajouter_module-inc.php" method="POST"  enctype='multipart/form-data'>
        <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
         ?></span>
            <input type="text"  name="module" placeholder="Module...."><br>
            <select name="Codesection">
            <?php foreach($lisection as $sec){?>
                    <option value="<?= $sec['Codesection']?>"> <?= $sec['Codesection']?></option>
                    
                <?php }?>
                </select><br>
            <input type="text" name="titre" placeholder="titre...."><br>
            <input type="number" min="1" max="8" name="coeficient" placeholder="coeficient...."><br>
            <input type="number"  name="unite" placeholder="unite...."><br>


            <button type="submit" name="submit">Ajouter Module</button>
        </form>
        <div class="back5"><div class="arrow3"></div></div> 
    </div>
 </div>
 
 <script src="app2.js"> </script>
 <script src="../app.js"> </script>
</body>
</html>
 