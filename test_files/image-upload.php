<?php
	include_once('../common.php');
	
	
	require_once('../_php/connect.php');

    $name = $_FILES["file"]["name"];
    $type = $_FILES["file"]["type"];
    $size = $_FILES["file"]["size"];
    $temp = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];
    
    if ($error > 0 ){
        die("Error uploading file! Code $error.");
    } else {
        
        if($type=="video/avi"){
            die "that file is not alow";
            } else {
            move_uploaded_file($temp,"media/".$name);
            echo "Upload Complete!";
        }
    }

?>