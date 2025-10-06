<?php
require("../includes/general/conn.php");


    switch ($_REQUEST['acao']){
        case 'create':
            $sql = "INSERT INTO tb_pais(nm_pais, lingua_pais, continente_pais) VALUES('".$_POST['nm_pais']."', '".$_POST['lingua_pais']."', '".$_POST['continente_pais']."')";
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

            break;
    }

?>