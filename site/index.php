<?php
    include "conexao.php";

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php require 'header.php' ?>

    <h1>cadastrar usuarios</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="nome" required>
        <input type="text" name="lingua" placeholder="lingua falada" required>

    <?php require 'footer.php' ?>
</body>

</html>