<?php
class supp_publication extends Dbh{

    public function supp($id){
        session_start();
        $stmt=$this->connect()->prepare('DELETE FROM publication WHERE id=?');

        if(!$stmt->execute(array($id))){
            $stmt=null;
            header("Location: ../../templates/login.php?error=stmtfailed");
            exit();
        }else{
            unlink("../uploads/publications/bgs/profile-".$_SESSION['id']."-".$id.".png");
            unlink("../uploads/publications/files/file-".$_SESSION['id']."-".$id.".pdf");
            unlink("../uploads/publications/files/file-".$_SESSION['id']."-".$id.".jpg");
        }

    }
}