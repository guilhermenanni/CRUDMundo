<?php
require("../includes/general/conn.php");

$acao = $_REQUEST['acao'] ?? '';

$nm_cidade = isset($_POST['nm_cidade']) ? $conex->real_escape_string($_POST['nm_cidade']) : '';
$id_pais = isset($_POST['id_pais']) ? $conex->real_escape_string($_POST['id_pais']) : '';
$id_cidade = isset($_POST['id_cidade']) ? $conex->real_escape_string($_POST['id_cidade']) : '';

switch ($acao){
    case 'create':
        if (empty($nm_cidade) || empty($id_pais)){
            print "<script>alert('Dados incompletos');location.href='../cadastrar_cidade.php'</script>";
            exit;
        }

        $sql = "INSERT INTO tb_cidade (nm_cidade, id_pais) VALUES ('$nm_cidade', '$id_pais')";
        $ans = $conex->query($sql);
        if ($ans){
            print "<script>alert('cidade cadastrada com sucesso');location.href='../cadastrar_cidade.php'</script>";
        }else{
            print "<script>alert('erro ao cadastrar: " . addslashes($conex->error) . "');location.href='../cadastrar_cidade.php'</script>";
        }
        break;

    case 'update':
        if (empty($id_cidade)){
            print "<script>alert('ID da cidade não informado');location.href='../cadastrar_cidade.php'</script>";
            exit;
        }

        $sql = "UPDATE tb_cidade SET nm_cidade = '$nm_cidade', id_pais = '$id_pais' WHERE id_cidade = '$id_cidade'";
        $ans = $conex->query($sql);

        if ($ans){
            print "<script>alert('cidade alterada com sucesso');location.href='../cadastrar_cidade.php'</script>";
        }else{
            print "<script>alert('erro ao alterar: " . addslashes($conex->error) . "');location.href='../cadastrar_cidade.php'</script>";
        }
        break;

    case 'delete':
        if (empty($id_cidade)){
            print "<script>alert('ID da cidade não informado');location.href='../cadastrar_cidade.php'</script>";
            exit;
        }

        $sql = "DELETE FROM tb_cidade WHERE id_cidade = '$id_cidade'";
        $ans = $conex->query($sql);

        if ($ans){
            print "<script>alert('cidade deletada com sucesso');location.href='../cadastrar_cidade.php'</script>";
        }else{
            print "<script>alert('erro ao deletar: " . addslashes($conex->error) . "');location.href='../cadastrar_cidade.php'</script>";
        }
        break;

    default:
        print "<script>alert('Ação inválida');location.href='../cadastrar_cidade.php'</script>";
}

?>