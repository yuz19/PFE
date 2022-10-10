<?php 
require ('../../includes/user/securite-administrateur-inc.php');
include ('../../includes/list_prof-inc.php');
include ('../../includes/list_gestion-inc.php');
include ('../../includes/list_specialite-inc.php');
include ('../../includes/list_module-inc.php');
$id=$_GET['id'];
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
    
    <div class="cont_acceuil cont_modifier_module">
        <a href="gestion.php"><div class="back_return"><div class="arrow"></div></div> </a>
        <div class="form_etude  form_module"   style="display: block;height:600px; top:8%; "  >

        <p id="message" style="position:absolute;top:20px;"></p>

        <form action="../../includes/modifier_gestion-inc.php" id="myform"  method="POST"  >
        <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
         ?></span>
                <select name="Codemodule" onchange="etat();">

                    <?php foreach($lmod as $mod){?>
                            <option value="<?= $mod['Codemodule']?>" <?php if($lgest[$id]['Codemodule']==$mod['Codemodule']){echo ("selected='selected'");}?>> <?= $mod['Codemodule']?></option>
                            
                        <?php }?>
                </select><br>
       
            <select name="NSS" onchange="etat();">
                <?php foreach($lprof as $prof){?>
                        <option value="<?= $prof['NSS']?>"  <?php if($lgest[$id]['NSS']==$prof['NSS']){echo ("selected='selected'");}?> > <?= $prof['NSS']?></option>
                        
                    <?php }?>
                </select><br>
            <select name="Codesection" onchange="etat();">
                <?php foreach($lisection as $sec){?>
                        <option value="<?= $sec['Codesection']?>" <?php if($lgest[$id]['Codesection']==$sec['Codesection']){echo ("selected='selected'");}?> > <?= $sec['Codesection']?></option>
                        
                    <?php }?>
                </select><br>
                <select name="Gp" onchange="etat();">
                <option value="0" <?php if($lgest[$id]['Gp']=='0'){echo ("selected='selected'");}?>>0</option>
                 <option value="1" <?php if($lgest[$id]['Gp']=='1'){echo ("selected='selected'");}?>>1</option>
                 <option value="2" <?php if($lgest[$id]['Gp']=='2'){echo ("selected='selected'");}?>>2</option>
                 <option value="3" <?php if($lgest[$id]['Gp']=='3'){echo ("selected='selected'");}?>>3</option>
                 <option value="4" <?php if($lgest[$id]['Gp']=='4'){echo ("selected='selected'");}?>>4</option>
      
             </select><br>  
             <select name="type" onchange="etat();">
                 <option value="cour" <?php if(strtolower($lgest[$id]['type'])=="cour"){echo ("selected='selected'");}?>>cour</option>
                 <option value="td" <?php  if(strtolower($lgest[$id]['type'])=='travaux'){echo ("selected='selected'");}?>>travaux(td ou tp)</option>
              
        
      
             </select><br> 
             <input type="hidden" id="save" name="verification" value=" ">
            <input type=" text" style="visibility: hidden; "><br>

                    <input type="hidden" name="Codesection_save" value="<?= $lgest[$id]['Codesection']?>">
                    <input type="hidden"  name="Codemodule_save"  value="<?= $lgest[$id]['Codemodule']?>" >
                    <input type="hidden" name="nss_save"  value="<?= $lgest[$id]['NSS']?>">
                    <input type="hidden" name="Gp_save"  value="<?= $lgest[$id]['Gp']?>">
                    <input type="hidden" name="type_save"  value="<?= $lgest[$id]['type']?>">
        
                    <input type="hidden"  name="bt_submit">
            <input type="button" id="bt_submit"    value="Modifier"  onclick="envoyer();">

        </form>
        <form method="POST" action="../../includes/modifier_gestion-inc.php" >
                    <input type="hidden" name="Codesection_save" value="<?= $lgest[$id]['Codesection']?>">
                    <input type="hidden" name="nss_save"  value="<?= $lgest[$id]['NSS']?>">
                    <input type="hidden" name="Gp_save"  value="<?= $lgest[$id]['Gp']?>">
                    <input type="hidden" name="type_save"  value="<?= $lgest[$id]['type']?>">
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
                    