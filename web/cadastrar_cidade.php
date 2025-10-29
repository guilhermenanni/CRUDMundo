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

        <div class="table table-border table-striped d-flex justify-content-center">
        <?php
        $sql_rows = "SELECT tb_cidade.id_cidade, tb_cidade.nm_cidade, tb_pais.nm_pais FROM tb_cidade JOIN tb_pais ON tb_cidade.id_pais = tb_pais.id_pais";
        $ans_rows = $conex->query($sql_rows);

        if(!$ans_rows){
            die("Erro: " . $conex->error);
        }

        $qt_rows = $ans_rows->num_rows;

        if ($qt_rows > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Pais</th>";
            echo "<th>Ações</th>";
            echo "</tr>";

            while ($row = $ans_rows->fetch_object()) {
                echo "<tr>";
                echo "<td>".$row->id_cidade."</td>";
                echo "<td>".$row->nm_cidade."</td>";
                echo "<td>".$row->nm_pais."</td>";
                echo "<td>
                        <form action='actions/crud_cidade.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id_cidade' value='".$row->id_cidade."'>
                            <button type='submit' name='acao' value='delete'>Excluir</button>
                        </form>
                        <form action='editar_cidade.php' method='GET' style='display:inline-block;'>
                            <input type='hidden' name='id_cidade' value='".$row->id_cidade."'>
                            <button type='submit'>Editar</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhuma cidade encontrada.";
        }
        ?>
        </div>
    </main>
</body>
<?php require("includes/general/footer.php"); ?>

</html>