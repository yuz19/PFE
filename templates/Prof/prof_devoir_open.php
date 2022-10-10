<?php 
require ('../../includes/user/securite-prof-inc.php');
require ('../../classes/dbh.classes.php');
include ('../../includes/list_specialite_devoir-inc.php');

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
     <div class="pub" >
         <div>
         <img src="../../assets/IMAGE/devoir_wild.png" ></div>
         <div class="cont">
             <form method="POST" action="../../includes/poster_devoir-inc.php" enctype='multipart/form-data'>
             <span class="error"><?php
                if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                        echo '*'.$_GET['error'].'<br/>';
                }
                ?></span>
                    <input name="nom" type="text" placeholder="nom du cour ou td">
                    
                    <input name="deadline" type="datetime-local" placeholder="deadline">
                  

                        
                    <select name="section"  >
                        <?php foreach($lisection as $sec){?>
                            <option value="<?= $sec['Codemodule'].'-'.$sec['Codesection'].'-'. $sec['type']?>"><?=explode('_',$sec['Codemodule'])[0]."--". $sec['Codesection']."--". $sec['type']?></option>
                            
                        <?php }?>
                        </select><br>
                    
                    <div class="poster" >
                        <input type="file" class="file" id="file1" name="devoir" > 
                        <label for="file1">
                            <span id="plus_devoir">&#43;</span> Poser le devoir
                        </label>
                    </div> 
                  
                    <!--<input type="hidden" name="NSS" value="20">-->
                    
                    <button value="submit" name="submit">confirmer</button>
                    </form>
         </div>
     </div>
    </div>
 </div>
</body>
</html>
 