<?php

$server = 'remotehost.es';
$user = 'dwess1234';
$password = 'test1234.';
$db_name = 'dwesdatabase';

//connect to databas
$conn = mysqli_connect($server, $user, $password, $db_name );

//check connection
if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
};
?>