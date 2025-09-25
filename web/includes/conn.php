<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_mundo";

$conex = mysqli_connect($servername, $username, $password, $database);

if (!$conex){
    die ("falha na conexao, " .mysqli_connect_error());
}

mysqli_select_db($conex, $database);

?>