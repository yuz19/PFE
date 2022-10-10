<?php

try
{
    if(!session_id()){
    
        session_start();
        session_regenerate_id(true);
    }
    
}
catch(PDOException $e)
{
    echo'ERREUR : '.$e->getMessage();//die('Une erreur a été trouve :'.getMessage());
}