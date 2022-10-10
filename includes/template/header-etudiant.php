<?php 
 function nav_affiche($main){
     
    echo "<header>
            <nav>
               <h3> &ensp;Tele-Ens</h3><br>
                <ul class='lis'> 
                    <li "; if($main=='acceuil'){echo("id='main'");} 
                     echo"><a href='acceuil.php'><img src='../../assets/ICON/home.png' height='28' width='28' alt='home_img'> &ensp;Acceuil</a></li>
                     
                    <li ".($main =="cours"  ? "id='main'" : "")."><a href='etudiant_cours_prof.php'><img src='../../assets/ICON/book.png'  height='28' width='28' alt='cour_img'> &ensp;Cours</a></li>
                    <li ".($main =="devoir"  ? "id='main'" : "")."><a href='etudiant_devoir_prof.php'><img src='../../assets/ICON/homework.png'  height='28' width='28' alt='Devoir_img'> &ensp;Devoir</a></li>
                    <li ".($main =="travaux"  ? "id='main'" : "")."><a href='travaux_prof.php'><img src='../../assets/ICON/travaux.png'  height='28' width='28' alt='Devoir_img'> &ensp;travaux</a></li>
                    
        
                </ul> 
            <ul class='list2'> 
                 <li ".($main =="acceuil"  ? "id='main2'" : "")."><a href='acceuil.php'><img src='../../assets/ICON/home.png' height='28' width='28' alt='home_img'></a></li>
                 <li ".($main =="cours"  ? "id='main2'" : "")."><a href='etudiant_cours_prof.php'><img src='../../assets/ICON/book.png'  height='28' width='28' alt='cour_img'></a></li>
                 <li ".($main =="devoir"  ? "id='main2'" : "")."><a href='etudiant_devoir_prof.php'><img src='../../assets/ICON/homework.png'  height='28' width='28' alt='Devoir_img'></a></li>
                 <li ".($main =="travaux"  ? "id='main2'" : "")."><a href='travaux_prof.php'><img src='../../assets/ICON/travaux.png' height='28' width='28' alt='live_img'></a></li>
                
                 <li class='deconnecter2'><a href='../../classes/logout-inc.php''>X</a></li>
            </ul>
           
        </nav>
        <div class='entete'>
            <div class='top'><img  id='usthb'  src='../../assets/ICON/logo.png' height='100'><br>
                 <a href='profil.php'>
                ".($_SESSION['img']==0 ?"<img  id='profil'  src='../../assets/ICON/user.png' height='60'>":
                "<img  id='profil'  src='../../uploads/etudiants/profile-".$_SESSION['id'].".png?<?=mt_rand()?>'  height='100' width='40'>")."
               </a>
                </div>
            <div class='matricule'> ";
                
                echo "Nom: ". $_SESSION['nom'];
               echo " <br>Prenom: ".$_SESSION['prenom'];
               echo " <br>Matricule:".$_SESSION['id']."</div>
             </div>
             
        <div class='form_deconnecter'>
        <a href='../../classes/logout-inc.php'><button class='deconnecter'>X</button></a>
        </div>
</header>   
";
 } 
 