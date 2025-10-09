<?php
require("../includes/general/conn.php");


    switch ($_REQUEST['acao']){
        case 'create':
            $sql = "INSERT INTO tb_cidade(nm_cidade, fk_pais) VALUES('".$_POST['nm_cidade']."', '".$_POST['fk_pais']."')";
            $ans = $conex->query($sql);
            if ($ans==true){
                print "<script>alert('cidade cadastrada com sucesso');</script>";
                print "<script>location.href='../cadastrar_cidade.php'</script>";
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