<?php include("includes/conn.php"); ?>

<?php

$sql = "SELECT nm_pais FROM tb_pais ORDER BY nm_pais";
$sql_ans = mysqli_query($conex, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>CRUDMundo</title>
</head>
<?php require ("includes/header.php") ?>

<body>
    <main>
        <div class="pre-form">
            <h1>CRUDMundo</h1>
        </div>
        <div class="tabela-pais">
            <div class="row-table-elements">
                <h2>paises</h2>
                <form action="index.php" method="post">
                    //NECESSITA REVISAO
                </form>
            </div>
        </div>
    
    </main>
</body>
<?php require ("includes/footer.php") ?>

</html>