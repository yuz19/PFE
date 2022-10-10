<?php
class mk_img{
   

    public function create($path){
        $racine=$_SERVER['DOCUMENT_ROOT'];
        $source=$racine.'/'.$path;
         
        $image = new Imagick($source.".pdf[0]");
        $image->setResolution(50, 50);
        $image->writeImage( $source.'.jpg');
    }
}