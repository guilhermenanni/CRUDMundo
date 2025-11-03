<?php
require("../includes/general/conn.php");

$id_pais = $_POST['id_pais'];
$nm_pais = $_POST['nm_pais'];
$lingua_pais = $_POST['lingua_pais'];
$continente_pais = $_POST['continente_pais'];


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
                print "<script>location.href='../editar_pais.php'</script>";
                
            break;
        case 'delete':
                // First remove cities that reference this country (by id_pais)
                if (!empty($id_pais)){
                    $sql1 = "DELETE FROM tb_cidade WHERE id_pais = '$id_pais'";
                    $ans1 =  $conex->query($sql1);
                    if ($ans1 === false){
                        print "<script>alert('erro ao excluir cidades vinculadas: " . addslashes($conex->error) . "');location.href='../cadastrar_pais.php'</script>";
                        exit;
                    }

                    $sql2 = "DELETE FROM tb_pais WHERE id_pais = '$id_pais'";
                    $ans2 =  $conex->query($sql2);
                    if ($ans2){
                        print "<script>alert('pais excluido com sucesso');location.href='../cadastrar_pais.php'</script>";
                    }else{
                        print "<script>alert('erro ao excluir pais: " . addslashes($conex->error) . "');location.href='../cadastrar_pais.php'</script>";
                    }
                }else{
                    print "<script>alert('ID do país não informado');location.href='../cadastrar_pais.php'</script>";
                }
            break;
    }

?>