<?php
 
require ('../../includes/user/securite-etudiant-inc.php');
include('../../includes/list_cour_etudiant-inc.php');
include ('../../includes/list_commentaire-inc.php');
include('../../includes/get_user-inc.php');
$id=unserialize(urldecode(stripslashes($_GET['id'])));
$cour=$liscours->getcour($id);
if(!isset($cour)){
    header('Location: etudiant_cours_prof.php');
}
$tmp=explode('.',$cour[0]['nom_file']);
$commentaires=$listcommentaire->list_commentaire($id,"cour");
$nbr=$listcommentaire->count($id,"cour");
?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
<body>
 <div class="container">

 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("cours");?>
     
     
    
    <div class="container_comment_cour">
    <div class="top_container_comment">
            <h1>Cours:<?=$cour[0]['nom']?></h1>
            <p>Date de publication : <?=str_replace('T',',',$cour[0]['date'])?></p>
            <hr>
            <br>
  
                <div class="comment_info">
                    <div>  
                     <a href='read_cour.php?id=<?=$id?>' >
                        <?php if($cour[0]['nom_file']==0 or !file_exists("../../uploads/cours/file-".$cour[0]['NSS']."-".$cour[0]['idcours'].".pdf")){?>
                            <img src="../../assets/IMAGE/img_graduation.jpg" height="80">
                        <?php }else{?>
                            
                        <img src="../../uploads/cours/file-<?=$cour[0]['NSS']?>-<?=$cour[0]['idcours']?>.jpg"  width="100px"  >
                        <?php } ?>
                        </a>
                    </div>
                    <div class="desc"><h3><?=$cour[0]['nom']?></h3><br><p><?php echo($tmp[1]);?></p></div>
                    
                    <div class="upl"  > 

                        <a href="read.php?id=$id" download="<?=$cour[0]['nom_file']?>" >
                            <img src="../../assets/IMAGE/download.png" height="30"  >
                        </a>
                    </div>
                </div>
                

       
        </div>
        <div class="comment">
            <div class="appel_input_commentaire"><h3>ajouter un commentaire</h3>il ya <?=$nbr?> commentaire</div>
            
            <div class="form_comment" >
            <form  method="POST" action="../../includes/ajouter_commentaire-inc.php">
                <input type="text" name="Commentaire" placeholder="Comment.......................">
                <input type="hidden" name="type" value="cour">
                <input type="hidden" name="page" value="etudiant">
                <input type="hidden" name="id_file" value="<?=$id?>" >

                <button type="submit" name="submit" >Envoyer</button>
            </form>
            </div>
          
        </div>
        <br>
        <div class="commentaire">
            <?php if(!empty($commentaires)){?>
            <?php foreach($commentaires as $value){ ?>
            <div class="MSG">
                <div class="img">
                   <?php 
                $temp=$user->if_photo_profil_existe($value['id_user']);
                if(!empty($temp['etudiant']) ){
                    if($temp['etudiant']==1){
                        echo " <img  id='profil'  src='../../uploads/etudiants/profile-".$value['id_user'].".png'  height='50' width='50' style='border-radius:50%;'>";
                    }
                    
                }elseif(!empty($temp['enseignant']) ){
                    if($temp['enseignant']==1){
                        echo " <img  id='profil'  src='../../uploads/profs/profile-".$value['id_user'].".png'  height='50' width='50'  style='border-radius:50%;'>";
                    }

                }else{
                    echo " <img src='../../assets/ICON/user.png' height='50'>";
                }
                ?>
                </div>
                <div>
                    <p><?= $user->get_use($value['id_user'])?> </p>
                    <div class="msg"><?=$value['commentaire']?></div>
                </div>
               
            </div>
           <?php }?> 
            <?php }else{?>
                
                <p class="vide">0 commmentaire</p>
                <?php }?> 
        </div> 
        
    </div>
 </div>
<script >/*comment*/
    let activation=document.querySelector('.appel_input_commentaire');
    let comment=document.querySelector('.form_comment');
    
    activation.onclick=function()
    {       
        comment.style.display="block";
    }
    </script>
</body>
</html>