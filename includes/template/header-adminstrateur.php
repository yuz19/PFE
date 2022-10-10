<?php 
 
 function nav_affiche($main){
     echo "
<header>
        <nav>
           <h3> &ensp;Tele-Ens</h3><br>
            <ul class='lis'> 
                <li ".($main =="acceuil"  ? "id='main'" : "")."><a href='acceuil.php'><img src='../../assets/ICON/home.png' height='28' width='28' alt='home_img'> &ensp;Acceuil</a></li>
                <li ".($main =="etudiant"  ? "id='main'" : "")."><a href='etudiant.php'><img src='../../assets/ICON/graduated.png'  height='28' width='28' alt='etud-img'> &ensp;Etudiant</a></li>
                <li ".($main =="prof"  ? "id='main'" : "")."><a href='prof.php'><img src='../../assets/ICON/teacher.png'  height='28' width='28' alt='prof-img'> &ensp;Prof</a></li>
                <li ".($main =="module"  ? "id='main'" : "")."><a href='module.php'><img src='../../assets/ICON/material.png' height='28' width='28' alt='live_img'>&ensp;Module</a></li>
                <li ".($main =="section"  ? "id='main'" : "")."><a href='section.php'><img src='../../assets/ICON/section.png' height='28' width='28' alt='live_img'>&ensp;Section</a></li>
                <li ".($main =="gestion"  ? "id='main'" : "")."><a href='gestion.php'><img src='../../assets/ICON/gestion.png' height='28' width='28' alt='live_img'>&ensp;gestion</a></li>
                <li ".($main =="dashboard"  ? "id='main'" : "")."><a href='dashboard_more.php'><img src='../../assets/ICON/dashboard.png' height='28' width='28' alt='dashboard_img'>&ensp;&ensp;Dashboard</a></li>
                

            </ul> 
            <ul class='list2'> 
                <li  ".($main =="acceuil"  ? "id='main2'" : "")."><a href='acceuil.php'><img src='../../assets/ICON/home.png' height='28' width='28' alt='home_img'></a></li>
               
                <li ".($main =="etudiant"  ? "id='main2'" : "")."><a href='etudiant.php'><img src='../../assets/ICON/graduated.png'  height='28' width='28' alt='etud-img'> </a></li>
                <li ".($main =="prof"  ? "id='main2'" : "")."><a href='prof.php'><img src='../../assets/ICON/teacher.png'  height='28' width='28' alt='prof-img'> </a></li>
                <li ".($main =="module"  ? "id='main'" : "")."><a href='module.php'><img src='../../assets/ICON/material.png' height='28' width='28' alt='live_img'></a></li>
                <li ".($main =="section"  ? "id='main'" : "")."><a href='section.php'><img src='../../assets/ICON/section.png' height='28' width='28' alt='live_img'></a></li>
                <li ".($main =="gestion"  ? "id='main'" : "")."><a href='gestion.php'><img src='../../assets/ICON/gestion.png' height='28' width='28' alt='live_img'></a></li>
                <li ".($main =="dashboard"  ? "id='main'" : "")."><a href='dashboard_more.php'><img src='../../assets/ICON/dashboard.png' height='28' width='28' alt='dashboard_img'></a></li>
                
                <li class='deconnecter2'><a href='../../classes/logout-inc.php''>X</a></li>
            </ul>
           
        </nav>
        <div class='entete'>
            <div class='top'><img id='usthb'  src='../../assets/ICON/logo.png' height='100'><br>
            <a href='profil.php'>
                <img   id='logo_admin' src='../../assets/ICON/user.png' width='50'  ></a>
                </div>
            <div class='matricule'  >
               <div> ".$_SESSION['nom']."</div>
            
            </div>
        
        </div>
        <div class='form_deconnecter'>
        <a href='../../classes/logout-inc.php'><button class='deconnecter'>X</button></a>
        </div>
    </header>";
 }