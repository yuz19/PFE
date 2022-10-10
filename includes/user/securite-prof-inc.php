<?php
session_start();
if(!isset($_SESSION['user']) or !isset($_SESSION['role']) or ($_SESSION['role']!="prof")){
    require('../../classes/logout2-inc.php');
    header('Location: ../../templates/login.php');
    
} 
