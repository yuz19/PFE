<?php
$max=4;
$file = 'save.txt';
$current = file_get_contents($file);

if($current<$max){
    file_put_contents($file, $max);
}else{
    file_put_contents($file, $current);
}

echo file_get_contents($file);