<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>

<body class="selected">
    <nav>
        <ul class="country-city-ul">
            <li class="left"><a href="pais.php">País</a></li>
            <li class="right"><a href="cidade.php" class="active">Cidade</a></li>
        </ul>
    </nav>



    <div class="form-city">
        <form action="cidade.php" method="post">
            <input type="text" name="nome" placeholder="nome">
            <input type="text" name="pais-referente" placeholder="pais">
            <input type="submit" name="enviar" value="enviar">
        </form>
    </div>

    <div class="show-data">
        <!-- tabela mostrando as cidades, paises e etc-->
    </div>
</body>

</html>