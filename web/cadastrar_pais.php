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
                <h1>paises</h1>
                <form action="actions/crud_pais.php" method="POST" class="pais-create">
                    <input type="text" name="nm_pais" placeholder="nome" required>
                    <input type="text" name="lingua_pais" placeholder="lingua falada" required>
                        <select id="continente_pais" name="continente_pais" placeholder="continente" required >
                            <option value="NORTE-AMERICA4">Ameriaca do norte</option>
                            <option value="SUL-AMERICA">America do sul</option>
                            <option value="Europa">Europa</option>
                            <option value="Asia">Asia</option>
                            <option value="Africa">Africa</option>
                            <option value="Oceania">Oceania</option>
                        </select>
                    <button type="submit" value="create" name="acao">cadastrar</button>
                    <button type="submit" value="delete" name="acao">excluir</button>
                </form>

            </div>
            <form>
            </form>
        </div>

    </main>
</body>
<?php require("includes/general/footer.php"); ?>

</html>