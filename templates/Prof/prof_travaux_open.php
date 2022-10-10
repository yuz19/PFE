
<?php 
require ('../../includes/user/securite-prof-inc.php');
require ('../../classes/dbh.classes.php');
include ('../../includes/list_specialite_travaux-inc.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("travaux");?>
     
     
    
    <div class="cont">
     <div class="pub pub3">
        
         <img src="../../assets/IMAGE/img_graduation_wild.jpg">
     
         <div class="cont" >
             <form method="POST" action="../../includes/poster_travaux-inc.php" enctype='multipart/form-data'>
             <span class="error"><?php
                if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                        echo '*'.$_GET['error'].'<br/>';
                }
                ?></span>
             <input type="text" name="nom" placeholder="nom du cour ou td"><br>
     
             <select name="section"  id='section'  onfocusout="getgroup()" >
                        <?php foreach($lisection as $sec){?>
                            <option value="<?= $sec['Codesection']?>"><?=explode('_',$sec['Codemodule'])[0]." ". $sec['Codesection']?></option>
                            
                        <?php }?>
            </select><br>
            <select id="group" name="group">
            <option value="null">-------</option>
            <?php foreach($liallinfosection as $sec){?>
               
                            <option value="<?= $sec['Codesection'].'-'.$sec['Gp'] ?>"><?=$sec['Gp'] ?></option>
                            
                        <?php }?>
            </select><br>

             <div class="poster">
                <input type="file" id="file" name="travaux" > 
                <label for="file">
                    <span id="plus_devoir">&#43;</span> Poser le travaux
                </label>
             </div> 
  
             <button name="submit" value="submit">Poster</button>
             </form>
         </div>
     </div>
    </div>
 </div>
 <script>
const container2=document.querySelector("#group")
const e=document.getElementById('section')
const listv=document.querySelectorAll('#group option')
 
function getgroup(){
 
    var valeur1 = e.options[e.selectedIndex].textContent.toString().split(' ').at(1);

    for(i=0;i<listv.length;i++){
     
        valeur2=listv[i].value.toString().split('-').at(0)

        if(valeur1.localeCompare(valeur2)!=0){
            listv[i].style.display="none"   
           
        }else{
            listv[i].style.display="block"
            
        }
    }

};
 
 </script>
</body>
</html>