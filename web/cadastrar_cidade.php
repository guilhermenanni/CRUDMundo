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
        $qt_rows = $ans_rows->num_rows;

        if(!$ans_rows){
            die("eero".$conex->error);
        }

        if ($qt_rows > 0) {
            print "<table>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>pais</th>";
            print "<th>acoes</th>";
            print "</tr>";
            while ($row = $ans_rows->fetch_object()) {
                print "<tr>";
                print "<td>".$row->id_cidade."</td>";
                print "<td>".$row->nm_cidade."</td>";
                print "<td>".$row->nm_pais."</td>";
                print "<td>
                        <button type='submit' name='acao' value='delete' id=".$row->id_cidade."'>excluir</button>
                        </td>";
                print "<td>
                            <button type='button' onclick='window.location.href='editar_cidade.php'>editar</button>
                        </td>";
                print "</tr>";
            }
            print "</table>";
        } else {
            echo "erro ao consultar os dados das cidades";
        }
        ?>
        </div>
    </main>
</body>
<?php require("includes/general/footer.php"); ?>

</html>