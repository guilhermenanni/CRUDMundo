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
    <?php require("includes/general/header.php"); ?>
    <main>
        <div class="pre-form">
            <h1>CRUDMundo</h1>
        </div>
        <div class="tabela-pais">
            <div class="row-table-elements">
                <h1>Cidades</h1>
                <form action="actions/crud_cidade.php" method="POST" class="pais-create">
                        <input type="text" name="nm_cidade" placeholder="nome" required>
                        <input type="text" name="id_pais" placeholder="pais ao qual pertence" required>
                    <button type="submit" name="acao" value="create">cadastrar</button>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>
<?php require("includes/general/footer.php"); ?>

</html>