<?php
session_start();
?>
<!DOCTYPE html>
<html lang="PT-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="folha-b.css">
    <title>Início - Dispensador</title>
</head>

<body>
    <div class="div-nav">
        <header>
            <nav>
                <?php
                if (!empty($_SESSION["nome"]) && $_SESSION["admin"] == 1) {
                    // logado e é admin
                ?><p style="color: white; margin: 0px;">
                        <a href="index.php?opcao=02_dispensador.php">Dispensador</a>
                        <a href="index.php?opcao=03_dispensador.php">Em Teste</a>
                        <a href="index.php?opcao=04_upload.php">Fotos</a>
                        <a href="index.php?opcao=05_galeria.php">Galeria</a>
                        <a href="index.php?opcao=logout.php">Sair &nbsp; &nbsp;</a>
                    <?php
                    echo "| &nbsp; &nbsp; Bem vindo(a) " . $_SESSION["nome"] . "</p>";
                } else if (!empty($_SESSION["nome"])) {
                    // logado mas não é admin
                    ?>
                        <a href="index.php?opcao=05_galeria.php">Galeria</a>
                        <a href="index.php?opcao=logout.php">Sair &nbsp; &nbsp;</a>
                    <?php
                } else {
                    // não está logado!
                    ?>
                        <a href="index.php?opcao=login.php">Login</a>
                        <a href="index.php?opcao=registo.php">Registo</a>
                    <?php
                }
                    ?>
            </nav>
        </header>
    </div>
    <div class="div-main">
        <hr>
        <main>
            <?php
            if (!empty($_GET["opcao"]) && $_GET["opcao"] != "index.php") {
                include($_GET["opcao"]);
            }
            ?>
        </main>
    </div>
</body>

</html>