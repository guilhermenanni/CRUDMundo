<?php include("includes/general/conn.php"); ?>

<?php
// Verifica se o id da cidade foi enviado
if (!isset($_GET['id_cidade'])) {
    header('Location: cadastrar_cidade.php');
    exit;
}

$id_cidade = intval($_GET['id_cidade']);

$sql = "SELECT * FROM tb_cidade WHERE id_cidade = $id_cidade";
$res = $conex->query($sql);

if (!$res || $res->num_rows === 0) {
    print "<script>alert('Cidade não encontrada');location.href='cadastrar_cidade.php'</script>";
    exit;
}

$cidade = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Editar Cidade - CRUDMundo</title>
    <style>
        .edit-form { max-width:600px; margin:24px auto; display:flex; flex-direction:column; gap:12px; }
        .edit-form input, .edit-form select { padding:8px; font-size:1rem; }
        .form-actions { display:flex; gap:8px; }
    </style>
</head>

<body>
    <?php require("includes/general/header.php"); ?>
    <main>
        <div class="pre-form">
            <h1>Editar Cidade</h1>
        </div>
        <div class="tabela-pais">
            <div class="row-table-elements">
                <form action="actions/crud_cidade.php" method="POST" class="pais-create edit-form">
                    <input type="hidden" name="acao" value="update">
                    <input type="hidden" name="id_cidade" value="<?php echo htmlspecialchars($cidade['id_cidade']); ?>">

                    <label for="nm_cidade">Nome</label>
                    <input type="text" id="nm_cidade" name="nm_cidade" placeholder="nome" required value="<?php echo htmlspecialchars($cidade['nm_cidade']); ?>">

                    <label for="id_pais">Pais</label>
                    <select id="id_pais" name="id_pais" required>
                        <?php
                        $sql_p = "SELECT id_pais, nm_pais FROM tb_pais ORDER BY nm_pais";
                        $res_p = $conex->query($sql_p);
                        if ($res_p) {
                            while ($p = $res_p->fetch_assoc()) {
                                $sel = ($p['id_pais'] == $cidade['id_pais']) ? 'selected' : '';
                                echo "<option value='".htmlspecialchars($p['id_pais'])."' $sel>".htmlspecialchars($p['nm_pais'])."</option>";
                            }
                        }
                        ?>
                    </select>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">Salvar</button>
                        <a href="cadastrar_cidade.php" class="btn-cancel" style="align-self:center;padding:8px 12px;display:inline-block;text-decoration:none;background:#ccc;color:#000;border-radius:4px;">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require("includes/general/footer.php"); ?>

</body>

</html>