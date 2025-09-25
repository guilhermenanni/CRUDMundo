<?php include("conn.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>CRUDMundo</title>
</head>
<?php require 'header.php' ?>

<body>
    <main>
        <div class="pre-form">
            <h1>CRUDMundo</h1>
        </div>
        <div class="tabela-pais">
            <div class="row-table-elements">
                <p>paises</p>
                <form action="index.php" method="post">
                <input type="text" name="nm_pais">
                <input type="text" name="lingua_pais">
                <input type="text" name="continente_pais">
                <input type="submit" name="enviar">
                </form>
            </div>
        </div>

    </main>

</body>

</html>