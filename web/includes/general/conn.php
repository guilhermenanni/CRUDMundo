<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_mundo";

$conex = mysqli_connect($hostname, $username, $password, $database);

if (!$conex){
    die ("falha na conexao, " .mysqli_connect_error());
}

mysqli_select_db($conex, $database);

?>