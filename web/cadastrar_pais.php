<?php include("includes/general/conn.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
                        <select id="continente_pais" name="continente_pais" required>
                            <option value="NORTE-AMERICA">America do norte</option>
                            <option value="SUL-AMERICA">America do sul</option>
                            <option value="EUROPA">Europa</option>
                            <option value="ASIA">Asia</option>
                            <option value="AFRICA">Africa</option>
                            <option value="OCEANIA">Oceania</option>
                        </select>
                    <button type="submit" value="create" name="acao">cadastrar</button>
                </form>
            </div>
        </div>
        <div class="table table-border table-striped d-flex justify-content-center">
<?php
$sql_rows = "SELECT * FROM tb_pais";
$ans_rows = $conex->query($sql_rows);

if(!$ans_rows){
    die("Erro: " . $conex->error);
}

$qt_rows = $ans_rows->num_rows;

$continente_labels = [
    'NORTE-AMERICA' => 'America do norte',
    'SUL-AMERICA' => 'America do sul',
    'EUROPA' => 'Europa',
    'ASIA' => 'Asia',
    'AFRICA' => 'Africa',
    'OCEANIA' => 'Oceania',
];

if ($qt_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Continente</th>";
    echo "<th>Língua</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    while ($row = $ans_rows->fetch_object()) {
        $id = htmlspecialchars($row->id_pais);
        $nome = htmlspecialchars($row->nm_pais);
        $lingua = htmlspecialchars($row->lingua_pais);
        $continente = $continente_labels[$row->continente_pais] ?? htmlspecialchars($row->continente_pais);

        echo "<tr>";
        echo "<td>".$id."</td>";
        echo "<td>".$nome."</td>";
        echo "<td>".$continente."</td>";
        echo "<td>".$lingua."</td>";
        echo "<td>
                <form action='actions/crud_pais.php' method='POST' style='display:inline-block;'>
                    <input type='hidden' name='id_pais' value='".$id."'>
                    <button type='submit' name='acao' value='delete'>Excluir</button>
                </form>
                <form action='editar_pais.php' method='GET' style='display:inline-block;'>
                    <input type='hidden' name='id_pais' value='".$id."'>
                    <button type='submit'>Editar</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum país encontrado.";
}
?>
  
    </main>
</body>
<?php require("includes/general/footer.php"); ?>

</html>