<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensador - Upload</title>
</head>

<body>
    <?php

    //Verificar se o formulário foi submetido
    if ($_FILES) {
        if ($_FILES["imagem"]["error"] == 0) {
            move_uploaded_file($_FILES["imagem"]["tmp_name"], "img/" . $_FILES["imagem"]["name"]);
            $imagem = "'img/" . $_FILES["imagem"]["name"] . "'";
        } else {
            // sem imagem
            $imagem = "null"; // não temos!
        }

        $sql = "INSERT INTO galeria(imagem) values($imagem)";
        echo $sql;
        include("conexao.php");
        $conn->query($sql);
        header("location: index.php?opcao=05_galeria.php");
    } else
        echo " ";
    ?>
    <div class="direito">
        <form action="" method="post" enctype="multipart/form-data">
            <br>
            <input type="file" name="imagem">
            <br>
            <p>Insira uma imagem. </p>
            <p><button>Enviar</button></p>
        </form>
    </div>
</body>

</html>