<!DOCTYPE html>
<html lang="PT-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensador - Galeria</title>
</head>

<body>

    <?php
    include("conexao.php");
    $result = $conn->query("select * from galeria");

    while ($row = $result->fetch_assoc()) {
        $id = $row['idimagem'];
        echo "<div class='exibir'>";
        echo "<p style='color: black; display: flex; justify-content: space-between; margin-left: 40px;'>Imagem: ";
        echo "<a href='editar_galeria.php?id=$id'><img src='img/trash.svg' class='apagar' /></a>";
        echo "</p>";       
        echo "<a href='index.php?opcao=05_galeria.php&id={$row['idimagem']}'>";
        echo "<img src='" . $row["imagem"] . "' />";
        echo "</a>";
        echo "</div>";
        echo "<br>";        
    }

    ?>

</body>

</html>