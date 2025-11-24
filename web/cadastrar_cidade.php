<?php include("includes/general/conn.php"); ?>

<?php
// ============= API REST COUNTRIES (MESMA DO cadastrar_pais) =============
function getCountryFlagByName($countryName) {
    if (!$countryName) return null;

    $url = "https://restcountries.com/v3.1/name/" . urlencode($countryName);

    $response = @file_get_contents($url);
    if (!$response) return null;

    $data = json_decode($response, true);

    if (!is_array($data) || isset($data["status"])) return null;

    return $data[0]["flags"]["png"] ?? null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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

                    <select name="id_pais" required>
                        <option value="">-- selecione um país --</option>
                        <?php
                        $sql_p = "SELECT id_pais, nm_pais FROM tb_pais ORDER BY nm_pais";
                        $res_p = $conex->query($sql_p);

                        if($res_p){
                            while($p = $res_p->fetch_assoc()){
                                echo "<option value='".htmlspecialchars($p['id_pais'])."'>"
                                    .htmlspecialchars($p['nm_pais'])
                                    ."</option>";
                            }
                        }
                        ?>
                    </select>

                    <button type="submit" name="acao" value="create">cadastrar</button>
                </form>
            </div>
        </div>

        <div class="table table-border table-striped d-flex justify-content-center">
        <?php
        $sql_rows = "SELECT 
                        tb_cidade.id_cidade, 
                        tb_cidade.nm_cidade, 
                        tb_pais.nm_pais 
                     FROM tb_cidade 
                     JOIN tb_pais ON tb_cidade.id_pais = tb_pais.id_pais";

        $ans_rows = $conex->query($sql_rows);

        if(!$ans_rows){
            die('Erro: ' . $conex->error);
        }

        if ($ans_rows->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>País</th>";
            echo "<th>Ações</th>";
            echo "</tr>";

            while ($row = $ans_rows->fetch_object()) {
                $id_cidade = htmlspecialchars($row->id_cidade);
                $nm_cidade = htmlspecialchars($row->nm_cidade);
                $nm_pais   = htmlspecialchars($row->nm_pais);

                // pega bandeira via API
                $flag = getCountryFlagByName($nm_pais);

                echo "<tr>";
                echo "<td>$id_cidade</td>";
                echo "<td>$nm_cidade</td>";

                echo "<td>";
                if ($flag) {
                    echo "<img src='$flag' width='40' style='border:1px solid #ddd; margin-right:5px;'>";
                }
                echo $nm_pais;
                echo "</td>";

                echo "<td>
                        <form action='actions/crud_cidade.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id_cidade' value='$id_cidade'>
                            <button type='submit' name='acao' value='delete'>Excluir</button>
                        </form>

                        <form action='editar_cidade.php' method='GET' style='display:inline-block;'>
                            <input type='hidden' name='id_cidade' value='$id_cidade'>
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

    <?php require("includes/general/footer.php"); ?>

</body>
</html>
