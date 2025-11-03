<?php
include("includes/general/conn.php");

// Verifica se o id do país foi enviado
if (!isset($_GET['id_pais'])) {
    header('Location: cadastrar_pais.php');
    exit;
}

$id_pais = intval($_GET['id_pais']);

$sql = "SELECT * FROM tb_pais WHERE id_pais = $id_pais";
$res = $conex->query($sql);

if (!$res || $res->num_rows === 0) {
    print "<script>alert('País não encontrado');location.href='cadastrar_pais.php'</script>";
    exit;
}

$pais = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Editar País - CRUDMundo</title>
    <style>
        /* Pequeno ajuste local para o formulário */
        .edit-form { max-width:600px; margin:24px auto; display:flex; flex-direction:column; gap:12px; }
        .edit-form input, .edit-form select { padding:8px; font-size:1rem; }
        .form-actions { display:flex; gap:8px; }
    </style>
</head>

<body>
    <?php require("includes/general/header.php"); ?>
    <main>
        <div class="pre-form">
            <h1>Editar País</h1>
        </div>

        <div class="tabela-pais">
            <div class="row-table-elements">
                <form action="actions/crud_pais.php" method="POST" class="pais-create edit-form">
                    <input type="hidden" name="acao" value="update">
                    <input type="hidden" name="id_pais" value="<?php echo $pais['id_pais']; ?>">

                    <label for="nm_pais">Nome</label>
                    <input type="text" id="nm_pais" name="nm_pais" placeholder="nome" required value="<?php echo htmlspecialchars($pais['nm_pais']); ?>">

                    <label for="lingua_pais">Língua</label>
                    <input type="text" id="lingua_pais" name="lingua_pais" placeholder="lingua falada" required value="<?php echo htmlspecialchars($pais['lingua_pais']); ?>">

                    <label for="continente_pais">Continente</label>
                    <select id="continente_pais" name="continente_pais" required>
                        <?php
                        $continentes = [
                            'NORTE-AMERICA' => 'America do norte',
                            'SUL-AMERICA' => 'America do sul',
                            'Europa' => 'Europa',
                            'Asia' => 'Asia',
                            'Africa' => 'Africa',
                            'Oceania' => 'Oceania',
                        ];
                        foreach ($continentes as $val => $label) {
                            $sel = ($pais['continente_pais'] === $val) ? 'selected' : '';
                            echo "<option value='$val' $sel>$label</option>";
                        }
                        ?>
                    </select>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">Salvar</button>
                        <a href="cadastrar_pais.php" class="btn-cancel" style="align-self:center;padding:8px 12px;display:inline-block;text-decoration:none;background:#ccc;color:#000;border-radius:4px;">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require("includes/general/footer.php"); ?>

</body>

</html>