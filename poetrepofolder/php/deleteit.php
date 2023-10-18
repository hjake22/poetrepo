<?php
session_start();

$username = $_SESSION['username'];
$filename = $_POST['file'];
$full_path = sprintf("/home/hjake22/userinfo/%s/%s", $username, $filename);



unlink(sprintf('/home/hjake22/userinfo/%s/%s', $username, $filename));
    

if( file_exists($filename)){
    
    echo ("$filename cannot be deleted due to an error");
} else {
    echo ("$filename has been deleted");
    

}






?>