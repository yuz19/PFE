<?php 
require ('../../includes/user/securite-administrateur-inc.php');
require ('../../classes/dbh.classes.php');
  include ('../../includes/list_specialite-inc.php');
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
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("section");?>
    
    <div class="cont_acceuil cont_modifier">
        <a href="section.php"><div class="back_return"><div class="arrow"></div></div> </a>
        <div class="form_etude  form_module" style="   display: block; top:10%;">
            <p id="message" style="position:absolute;top:20px;"></p>
            <form action="../../includes/modifier_section-inc.php" id="myform" method="POST" >
            <span class="error"><?php
            if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                    echo '*'.$_GET['error'].'<br/>';
            }
            ?></span>
     
            <input type="text"  name="specialite" placeholder="Code specialite...." value="<?=explode('_', $allsection[$id]['Codesection'])[0]?>" ><br>
            <input type="text"  name="section" placeholder="section...."  value="<?= explode('_',$allsection[$id]['Codesection'])[1]?>"><br>
             <select name="numero" onchange="etat();">
                 <option value="L1" <?php if(explode('_',$allsection[$id]['Codesection'])[2]=='L1'){echo ("selected='selected'");}?> >L1</option>
                 <option value="L2" <?php if(explode('_',$allsection[$id]['Codesection'])[2]=='L2'){echo ("selected='selected'");}?> >L2</option>
                 <option value="L3" <?php if(explode('_',$allsection[$id]['Codesection'])[2]=='L3'){echo ("selected='selected'");}?> >L3</option>
                 <option value="M1" <?php if(explode('_',$allsection[$id]['Codesection'])[2]=='M1'){echo ("selected='selected'");}?> >M1</option>
                <option value="M2" <?php if(explode('_',$allsection[$id]['Codesection'])[2]=='M2'){echo ("selected='selected'");}?> >M2</option>
             </select><br>
                <input type="hidden" name="codesection_save" value="<?=$allsection[$id]['Codesection']?>">
                <input type="hidden" name="group_save" value="<?=$allsection[$id]['Gp']?>">

             <select name="Gp" onchange="etat();">
                 <option value="1" <?php if($allsection[$id]['Gp']=='1'){echo ("selected='selected'");}?>  >1</option>
                 <option value="2" <?php if($allsection[$id]['Gp']=='2'){echo ("selected='selected'");}?> >2</option>
                 <option value="3" <?php if($allsection[$id]['Gp']=='3'){echo ("selected='selected'");}?> >3</option>
                 <option value="4" <?php if($allsection[$id]['Gp']=='4'){echo ("selected='selected'");}?> >4</option>
      
             </select><br>           
           
             <input type="hidden" id="save" name="verification" value=" ">
             <input type="hidden"  name="bt_submit">
             <input type="button" id="bt_submit"  value="Modifier Section"  onclick="envoyer();">
        </form>
        <form method="POST" action="../../includes/modifier_section-inc.php" >
              <input type="hidden"  name="Codesection_save" value="<?=$allsection[$id]['Codesection']?>" style="display:none">
              <input type="hidden"  name="Gp_save" value="<?=$allsection[$id]['Gp']?>" style="display:none">

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

</body>
</html>