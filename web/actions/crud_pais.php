<?php
include("../includes/general/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    
    switch($acao) {
        case 'create':
            $nome = $conex->real_escape_string($_POST['nm_pais']);
            $lingua = $conex->real_escape_string($_POST['lingua_pais']);
            $continente = $conex->real_escape_string($_POST['continente_pais']);
            
            $sql = "INSERT INTO tb_pais (nm_pais, lingua_pais, continente_pais) VALUES ('$nome', '$lingua', '$continente')";
            break;
            
        case 'update':
            $id = intval($_POST['id_pais']);
            $nome = $conex->real_escape_string($_POST['nm_pais']);
            $lingua = $conex->real_escape_string($_POST['lingua_pais']);
            $continente = $conex->real_escape_string($_POST['continente_pais']);
            
            $sql = "UPDATE tb_pais SET nm_pais='$nome', lingua_pais='$lingua', continente_pais='$continente' WHERE id_pais=$id";
            break;
            
        case 'delete':
            $id = intval($_POST['id_pais']);
            $sql = "DELETE FROM tb_pais WHERE id_pais=$id";
            break;
            
        default:
            header('Location: ../cadastrar_pais.php');
            exit;
    }
    
    if ($conex->query($sql)) {
        print "<script>alert('Operação realizada com sucesso!');location.href='../cadastrar_pais.php';</script>";
    } else {
        print "<script>alert('Erro ao realizar operação: " . $conex->error . "');location.href='../cadastrar_pais.php';</script>";
    }
} else {
    header('Location: ../cadastrar_pais.php');
}