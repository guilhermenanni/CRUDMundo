<?php
require("../includes/general/conn.php");

$nm_cidade = $_POST['nm_cidade'];
$id_pais = $_POST['id_pais']; 

    switch ($_REQUEST['acao']){
        case 'create':
            $sql = "INSERT INTO tb_cidade(nm_cidade, id_pais) VALUES ('$nm_cidade', '$id_pais)";
            $ans = $conex->query($sql);
            if ($ans==true){
                print "<script>alert('cidade cadastrada com sucesso');</script>";
                print "<script>location.href='../cadastrar_cidade.php'</script>";
            }else{
                print "<script>alert('erro ao cadastrar');</script>".mysqli_error($conex);
            }
            break;

        case 'update':
            $sql_change_name = "UPDATE tb_cidades SET nm_cidade = '$nm_cidade' WHERE id_cidade = '$id_cidade'";
            $sql_change_fk = '';
            $ans_chage_name = $conex->query($sql_change_name);
            $ans_chage_fk = $conex->query($sql_change_fk);

            if ($ans_chage_name==true && $ans_chage_fk==true) {
                print"<script>alert('cidade alterada com sucesso')</script>";
                }else{
                    print "<script>location.href=../update_cidade.php</script>";
                }
            

            break;
        
        case 'delete':
            $sql = "DELETE FROM tb_cidade WHERE nm_cidade = '$nm_cidade'";
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