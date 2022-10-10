<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../assets/style.css">
 <title>USTHB-sign up</title>
</head>
<body>
<a href="login.html"><div class="back"><div class="arrow"></div></div></a>
<div class="cont_sign">
<form class="form2" method="POST" action="../includes/user/signup-inc.php">
    <span class="error">*champ obligatoire.</span><br>
<input type="text" name="nom" placeholder="Nom">
<span class="error">&ensp;ee</span>
<input type="text" name="prenom" placeholder="Prenom">
<input type="text" name="uid" placeholder="username">
<input type="text" name="email" placeholder="Email">
<input type="password" name="pwd" placeholder="Mot de passe">
<input type="password" name="pwdrepeat" placeholder="Confirmer votre Mot de passe">
<button type="submit" name="submit">register</button>
</form> 
</div>
</body>
</html>