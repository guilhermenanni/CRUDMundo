<?php
require("../includes/general/conn.php");

$nm_cidade = $_POST['nm_cidade'];
$fk_pais = $_POST['fk_pais']; 

    switch ($_REQUEST['acao']){
        case 'create':
            $sql = "INSERT INTO tb_cidade(nm_cidade, fk_pais) VALUES ('$nm_cidade', '$fk_pais)";
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
            $sql = "DELETE FROM tb_cidade WHERE nm_cidade = '$fk_cidade'";
            $ans = $conex->query(query: $sql);

            if ($ans==true){
                print"<script>alert('cidade deletada com sucesso')</script>";
                print"<script>location.href='../cadastrar_cidade.php'</script>";
            }else{
                print"<script>alert('erro ao deletar')</script>".mysqli_error($conex);
            }
            break;
    }

?>