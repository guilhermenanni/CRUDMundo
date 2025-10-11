<?php
require("../includes/general/conn.php");

$nm_pais = $_POST['nm_pais'];
$lingua_pais = $_POST['lingua_pais'];
$continente_pais = $_POST['continente_pais'];
$nm_pais = $_POST['nm_pais'];

    switch ($_REQUEST['acao']){
        case 'create':
            $sql = "INSERT INTO tb_pais (nm_pais, lingua_pais, continente_pais) VALUES ('$nm_pais', '$lingua_pais', '$continente_pais')";
            $ans = $conex->query($sql);
            if ($ans==true){
                print "<script>alert('pais cadastrado com sucesso');</script>";
                print "<script>location.href='../cadastrar_pais.php'</script>";
            }else{
                print "<script>alert('erro ao cadastrar');</script>".mysqli_error($conex);
            }
            break;

        case 'update':

            break;
        case 'delete':
            $sql1 = "DELETE FROM tb_cidade WHERE fk_pais = '$nm_pais'";
            $ans1 =  $conex->query($sql1);
            if ($ans1==true){
                print "<script>alert('pais excluido com sucesso');</script>";
                print "<script>location.href='../cadastrar_pais.php'</script>";
            }else{
                print "<script>alert('erro ao excluir ans1');</script>".mysqli_error($conex);
            }
            
            $sql2 = "DELETE FROM tb_pais WHERE nm_pais = '$nm_pais'";
            $ans2 =  $conex->query($sql2);
            if ($ans2==true ){
                print "<script>alert('pais excluido com sucesso');</script>";
                print "<script>location.href='../cadastrar_pais.php'</script>";
            }else{
                print "<script>alert('erro ao excluir ans2');</script>".mysqli_error($conex);
            }
            break;
    }

?>