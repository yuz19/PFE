<?php
#require ('../../includes/user/securite-inc.php');
#require ('../../classes/session.classes.php');

class Dbh{

    protected function connect(){
        try {
            $username="root";
            $password="";
            $dbh=new PDO('mysql:host=localhost;dbname=pfe',$username,$password);
            return $dbh;
        } 
        catch (PDOException $e) {
            print "Error : ".$e->getMessage()."<br/>";
            die();
        }
    }
}
