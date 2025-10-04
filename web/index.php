<?php include("includes/general/conn.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>CRUDMundo</title>
</head>
<body>
    <?php require ("includes/general/header.php"); ?>
    <main>
        <div class="pre-form">
            <h1>CRUDMundo</h1>
                        <?php require("includes/pais/cadastrar_pais.php");?>      
        </div>
        <div class="tabela-pais">
            <div class="row-table-elements">
                <h2>paises</h2>
            </div>
            <form>
             </form>
        </div>
    
    </main>
</body>
<?php require ("includes/general/footer.php"); ?>

</html>