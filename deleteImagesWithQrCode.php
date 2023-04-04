<?php
$folder_path = "images/withQrCode";

$files = glob($folder_path.'/*'); 

foreach($files as $file) {
    if(is_file($file)) 
        unlink($file); 
}
?>