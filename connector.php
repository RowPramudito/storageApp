<?php 

    $host = 'localhost';
    $db_name = 'storageApp';
    $user = 'root';
    $pass = '';

    $connect = new mysqli($host, $user, $pass, $db_name);
    if(mysqli_connect_error()) {
        die('Connection error.');
    }

?>