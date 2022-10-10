<?php 
require ('../../includes/user/securite-administrateur-inc.php');
include ('../../includes/list_module-inc.php');#deja inclu dbh ne pas repter dans list_sepcialite includ dbh.php
include ('../../includes/list_specialite-inc.php');
$id=$_GET['id'];/*
print_r($lspecialite);
print_r($lniveaux);
print_r($lisection);*/

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
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("module");?>
    
    <div class="cont_acceuil cont_modifier_module">
        <a href="module.php"><div class="back_return"><div class="arrow"></div></div> </a>
        <div class="form_etude  form_module"   style="display: block; top:8%; "  >

        <p id="message" style="position:absolute;top:20px;"></p>

        <form action="../../includes/modifier_module-inc.php" method="POST" id="myform"  enctype='multipart/form-data'>
        <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
         ?></span>
            <input type="text"  name="module" placeholder="Module...." value="<?=explode('_',$lmod[$id]['Codemodule'])[0]?>" onchange="etat();"><br>
            <select name="Codesection" onchange="etat();">
            <?php foreach($lisection as $sec){?>
                    <option value="<?= $sec['Codesection']?>"  <?php if(explode('_',$lmod[$id]['Codemodule'])[1].'_'.explode('_',$lmod[$id]['Codemodule'])[2].'_'.explode('_',$lmod[$id]['Codemodule'])[3] ==$sec['Codesection']){echo ("selected='selected'");}?>> <?= $sec['Codesection']?></option>
                    
                <?php }?>
                </select><br>
             
                <input type="hidden" id="save" name="verification" value=" ">
            <input type="hidden" name="Codemodule_save" value="<?=$lmod[$id]['Codemodule']?>">
            <input type="text" name="titre" placeholder="titre...."  value="<?= $lmod[$id]['Titre']?>"  onchange="etat();"><br>
            <input type="number" min="1" max="8" name="coeficient" value="<?= $lmod[$id]['Coeficient']?>"  placeholder="coeficient...." onchange="etat();"><br>
            <input type="number"  name="unite" placeholder="unite...."value="<?= $lmod[$id]['Unite']?>" onchange="etat();"><br>
        
            <input type="hidden"  name="bt_submit">

            <input type="button" id="bt_submit"    value="Modifier Module"  onclick="envoyer();">

        </form>
        <form method="POST" action="../../includes/modifier_module-inc.php" >
        <input type="hidden" name="Codemodule_save" value="<?=$lmod[$id]['Codemodule']?>">
                <button type="submit" class="delete" name="delete">supprimer</button>
            </form>
        </div>
     </div>
 </div>

 <script>

function envoyer()
{
    if(document.getElementById ("save").value=="ok" )
    {
        
        document.getElementById("myform").submit(); 
    }else
    {
        document.getElementById("message").innerText="Le formulaire n'a pas change";
    }
    
}
    //document.getElementById ("message").innerText += "-"+bcivilite++bnom+"-"+bprenom+"-"+bdate
function etat ()
{
    document.getElementById ("save").value="ok";
  
} 
</script>

 <script src="app2.js"> </script>
</body>
</html>
                    