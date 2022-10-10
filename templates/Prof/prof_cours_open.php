
<?php 
require ('../../includes/user/securite-prof-inc.php');
require ('../../classes/dbh.classes.php');
include ('../../includes/list_specialite_cour-inc.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("cours");?>
     
     
    
    <div class="container_pub">
     <div class="pub">
        
         <img src="../../assets/IMAGE/img_graduation_wild.jpg">
     
         <div class="cont">
             <form method="POST" action="../../includes/poster_cour-inc.php" enctype='multipart/form-data'>
             <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
         ?></span>
             <input type="text" name="nom" placeholder="nom du cour "><br>
              
             <select name="section"  onchange="etat();">
                        <?php foreach($lisection as $sec){?>
                            <option value="<?= $sec['Codesection']?>"><?=explode('_',$sec['Codemodule'])[0]."--". $sec['Codesection']?></option>
                            
                        <?php }?>
            </select><br>

             <div class="poster">
                <input type="file" id="file" name="cour" > 
                <label for="file">
                    <span id="plus_devoir">&#43;</span> Poser le cour
                </label>
             </div> 
  
             <button name="submit" value="submit">Poster</button>
             </form>
         </div>
     </div>
    </div>
 </div>
</body>
</html>