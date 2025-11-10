<?php
include("../includes/general/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    
    switch($acao) {
        case 'create':
            $nome = $conex->real_escape_string($_POST['nm_cidade']);
            $id_pais = intval($_POST['id_pais']);
            
            $sql = "INSERT INTO tb_cidade (nm_cidade, id_pais) VALUES ('$nome', $id_pais)";
            break;
            
        case 'update':
            $id = intval($_POST['id_cidade']);
            $nome = $conex->real_escape_string($_POST['nm_cidade']);
            $id_pais = intval($_POST['id_pais']);
            
            $sql = "UPDATE tb_cidade SET nm_cidade='$nome', id_pais=$id_pais WHERE id_cidade=$id";
            break;
            
        case 'delete':
            $id = intval($_POST['id_cidade']);
            $sql = "DELETE FROM tb_cidade WHERE id_cidade=$id";
            break;
            
        default:
            header('Location: ../cadastrar_cidade.php');
            exit;
    }
    
    if ($conex->query($sql)) {
        print "<script>alert('Operação realizada com sucesso!');location.href='../cadastrar_cidade.php';</script>";
    } else {
        print "<script>alert('Erro ao realizar operação: " . $conex->error . "');location.href='../cadastrar_cidade.php';</script>";
    }
} else {
    header('Location: ../cadastrar_cidade.php');
}