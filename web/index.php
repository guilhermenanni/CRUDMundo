<?php include("includes/general/conn.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
    <title>CRUDMundo</title>
</head>

<body>
    <?php require("includes/general/header.php"); ?>
    <main>
        <div class="pre-form">
            <h1>CRUDMundo</h1>
        </div>
        <div class="tabela-pais" style="text-align:center;padding:24px;">
            <h2>Escolha uma opção</h2>
            <div style="display:flex;gap:12px;justify-content:center;margin-top:16px;">
                <a href="cadastrar_pais.php" class="btn btn-primary">Paises</a>
                <a href="cadastrar_cidade.php" class="btn btn-secondary">Cidades</a>
            </div>
        </div>

    </main>
</body>
<?php require("includes/general/footer.php"); ?>

</html>