<?php 
require ('../../includes/user/securite-prof-inc.php');
include('../../includes/list_devoir-inc.php');
include ('../../includes/list_commentaire-inc.php');
include('../../includes/list_reponse_devoir-inc.php');
include('../../includes/get_user-inc.php');
$id=unserialize(urldecode(stripslashes($_GET['id'])));

#get devoir from id  devoir
$devoir=$lisdevoir->getDevoir($id);
if(!isset($devoir)){
    header('Location: prof_devoir.php');
}
#prendre le type pdf from le nom
$tmp=explode('.',$devoir[0]['nom_file']);
$type=end($tmp);

#get commentaire from id devoir
$commentaires=$listcommentaire->list_commentaire($id,"devoir");
$nbr=$listcommentaire->count($id,"devoir");
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
 <div class="container">
    <?php   include ('../../includes/template/header-prof.php'); nav_affiche("devoir");?>
     
    
    <div class="container_comment_cour">
        <div class="top_container_comment">
            <h1>Devoir:<?=$devoir[0]['nom']?></h1>
            <p>Deadline : <?=str_replace('T',',',$devoir[0]['deadline'])?> <a class="supprimer" href="../../includes/supp_CDT_devoir-inc.php?id=<?=addslashes(urlencode(serialize($id)))?>">supprimer</a></p>
            <hr>
            <br>
            <div class="ligne">
                <div class="comment_info">
                    <div>
                    <a href='read_devoir.php?id=<?=$id?>' >
                        <?php if($devoir[0]['nom_file']==0 or !file_exists("../../uploads/devoir/file-".$devoir[0]['NSS']."-".$devoir[0]['iddev'].".pdf")  ){?>
                            <img src="../../assets/IMAGE/img_graduation.jpg" height="80">
                        <?php }else{?>
                            
                        <img src="../../uploads/devoir/file-<?=$devoir[0]['NSS']?>-<?=$devoir[0]['iddev']?>.jpg"  width="100px"  >
                        <?php } ?>
                        </a>
                    </div>
                    <div class="desc"><h3><?=$devoir[0]['nom']?></h3><br><p><?php echo($tmp[1]);?></p></div>
                    
                    <div class="upl"  > 

                        <a href="read.php?id=$id" download="<?=$devoir[0]['nom_file']?>" >
                            <img src="../../assets/IMAGE/download.png" height="30"  >
                        </a>
                    </div>
                </div>
                <div class="poster" style="display:flex; justify-content: center; ">
                  
                  
                
                  <a href="prof_devoir_reponse.php?id=<?=$id?>" ><button style="width:200px;height:50px" name="submit">Afficher Les Reponses</button></a>
                   
                  </div>
            </div>
       
        </div>
   
        <div class="comment" style="margin-bottom: 10px;">
            <div class="appel_input_commentaire"><h3>Ajouter un commentaire</h3>il ya <?=$nbr?> commentaire</div>
            
            <div class="form_comment" >
            <form  method="POST" action="../../includes/ajouter_commentaire-inc.php">
                <input type="text" name="Commentaire" placeholder="Comment.......................">
                <input type="hidden" name="type" value="devoir">
                <input type="hidden" name="page" value="prof">
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
            <div class="img">           <?php 
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
                    <p><?=  $user->get_use($value['id_user'])?> </p>
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