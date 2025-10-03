<?php
    switch ($_REQUEST['acao']){
        case 'create':
            if (isset($_POST['nm_pais'], $_POST['continente_pais'], $_POST['lingua_pais'])) {
                $nome_pais = mysqli_real_escape_string($conex, $_POST['nm_pais']);
                $continente_pais = mysqli_real_escape_string($conex, $_POST['continente_pais']);
                $lingua_pais = mysqli_real_escape_string($conex, $_POST['lingua_pais']);

                $sql = "INSERT INTO tb_pais(nm_pais, continente_pais, lingua_pais)
                        VALUES ('$nome_pais', '$continente_pais', '$lingua_pais')";
                if (mysqly_query($conex, $sql)){
                    echo "pais cadastrado com sucesso";
                }else{
                    echo "erro ao inserir o pais: ". mysqli_error($conex);
                }
                }
            
            break;

        case 'update':

            break;
        
        case 'delete':

            break;
    }

?>