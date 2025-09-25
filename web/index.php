<?php include("conn.php"); ?>

<?php

$sql = "SELECT nm_pais FROM tb_pais;"

?>

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
                <h2>paises</h2>
                <form action="index.php" method="post">
                <p>nome do pais</p>
                <input type="text" name="nm_pais">
                <input class="btn-submit" type="submit" name="consultar">
                </form>
            </div>
        </div>

    </main>
</body>
<?php require 'footer.php' ?>

</html>