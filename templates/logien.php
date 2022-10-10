<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 
    <link rel="stylesheet" href="../assets/style.css">
    <title>USTHB-login</title>
</head>
<body>
<div class="container_log">
 <div class="login">
  <div id="ICON"><img  src="../assets/ICON/USTHB-logo.png" height="70"><p>USTHB</p></div>

<form class="form1" action="../includes/user/login-inc.php" method="POST">
    <div class="form">
    <input type="text" name="uid" size="20" maxlength="30" placeholder="Login">
    <input type="text" name="pwd" size="20" maxlength="30" placeholder="mot de passe">

    <button type="submit" name="submit">Se connecter</button>
     </div>
</form>

<a href="sign.html"><p>Cree un compte</p></a>
 </div>
 <div class="info">
 <h3>A travers cet espace les étudiants peuvent entre autres :</h3><br>
 <ul>
    <li>Deposer les devoirs </li>
    <li>Consulter les cours</li>
    <li>Assister a des conference online</li>
 </ul>
 </div>
</div>
</body>
</html>