
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>USTHB-prof</title>
<body>
 <div class="container">

 <header>
        <nav  class="locked">
           <h3> &ensp;Tele-Ens</h3><br>
            <ul class="lis"> 
                <li  ><img src="../assets/ICON/home.png" height="28" width="28" alt="home_img"> &ensp;Acceuil</li>
                <li ><img src="../assets/ICON/book.png"  height="28" width="28" alt="cour_img"> &ensp;Cours</li>
                <li ><img src="../assets/ICON/homework.png"  height="28" width="28" alt="Devoir_img"> &ensp;Devoir</li>
                <li ><img src="../assets/ICON/dashboard.png" height="28" width="28" alt="dashboard_img">&ensp;&ensp;Dashboard</li>
                <li><img src="../assets/ICON/live.png" height="28" width="28" alt="live_img">&ensp;Live</li>
    
            </ul> 
            <ul class="list2"> 
                <li  id="main2"><img src="../assets/ICON/home.png" height="28" width="28" alt="home_img"></li>
                <li ><img src="../assets/ICON/book.png"  height="28" width="28" alt="cour_img"></li>
                <li ><img src="../assets/ICON/homework.png"  height="28" width="28" alt="Devoir_img"></li>
                <li ><img src="../assets/ICON/dashboard.png" height="28" width="28" alt="dashboard_img"></li>
                <li><img src="../assets/ICON/live.png" height="28" width="28" alt="live_img"></li>
    
            </ul>
          
        </nav>
        <div class="cont_prv"><p> Contenu prive</p></div>
        <div class="entete locked">
            <div class="top"><img   src="../assets/ICON/logo.png" height="100"><br>
                 
                <img  id="profil"  src="../assets/ICON/user.png" height="60">
                </div>
            <div class="matricule">
                Nom:
                <br>Prenom
                <br>Matricule:199999999999999</div>
        </div>
         </header>
     
 
    <div class="cont_acceuil">

    <div class="login">
  <div id="ICON"><img  src="../assets/ICON/USTHB-logo.png" height="70"><p>USTHB</p></div>

<form class="form1" action="../includes/user/login-inc.php" method="POST">
    <div class="form">
    <input type="text" name="matricule_nss" size="20" maxlength="30" placeholder="Login">
    <input type="password" name="pwd" size="20" maxlength="30" placeholder="mot de passe">

    <button type="submit" name="submit">Se connecter</button>
     </div>
</form>

 
 </div>

 
    </div>


   


 </div>
 <script src="../script.js"></script>
</body>
</html>