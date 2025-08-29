<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "db_mundo";

$conn = new mysqli($host, $user, $password, $db)

if ($conn->connect_error) {
    die("erro de conexão: " .$conn->connect_error);
}

?>