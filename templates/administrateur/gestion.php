<?php 
require ('../../includes/user/securite-administrateur-inc.php');
include ('../../includes/list_prof-inc.php');
include ('../../includes/list_gestion-inc.php');
include ('../../includes/list_specialite-inc.php');
include ('../../includes/list_module-inc.php');


#print_r($lisection);
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
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("gestion");?>
 
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
                    <?php if(!empty($lgest)) {?>
                    <?php foreach ($lgest as  $key=>$value) {?>
                            
                        <div class="eleve_info">
                            <div>
                             
                            
                            <img  class='profil'  src=' ' height='70' width="70"  style="visibility:hidden;">  
                            
                            
                            </div>
                    
                            <div class="info_elev">
                                <h3><?= 'Codemodule : '.$value['Codemodule']."  | PROF : ".$value['NSS'] ?></h3>  
                                type:<?=$value['type'].'-Group :'.$value['Gp'].'-Code section :'.$value['Codesection']?>
                            </div>
                            
                         <a href=" gestion-modifier.php?id=<?= $key?>  "><button  class="modifier"  >modifier</button></a>
                            
                        </div>  
                    <?php }?>
           
                    <?php }else{?>
                        <p class="vide">0 gestion</p>
                    <?php }?>
                </div>
           </div>
    </div>
    <div class="form_etude form_module"  style="  display: none;">
        <form action="../../includes/ajouter_gestion-inc.php" method="POST"  enctype='multipart/form-data'>
        <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
         ?></span>
        <select name="Codemodule">
            <?php foreach($lmod as $mod){?>
                    <option value="<?= $mod['Codemodule']?>"> <?= $mod['Codemodule']?></option>
                    
                <?php }?>
                </select><br>
       
            <select name="NSS">
            <?php foreach($lprof as $prof){?>
                    <option value="<?= $prof['NSS']?>"> <?= $prof['NSS']?></option>
                    
                <?php }?>
                </select><br>
            <select name="Codesection">
            <?php foreach($lisection as $sec){?>
                    <option value="<?= $sec['Codesection']?>"> <?= $sec['Codesection']?></option>
                    
                <?php }?>
                </select><br>
                <select name="Gp">
                <option value="0">0</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
      
             </select><br>  
             <select name="type">
                 <option value="cour">cour</option>
                 <option value="travaux">travaux(td ou tp)</option>
 
        
      
             </select><br> 

            <input style="visibility: hidden; "><br>


            <button type="submit" name="submit">Ajouter </button>
        </form>
        <div class="back5"><div class="arrow3"></div></div> 
    </div>
 </div>
 
 <script src="app2.js"> </script>
 <script src="../app.js"> </script>
</body>
</html>
 