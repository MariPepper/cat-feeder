<?php

if (!empty($_GET["id"])){

    $id = $_GET["id"];
    $sql = "delete from galeria where idimagem = '$id'";
    include("config.php");
    $conn->query($sql);
    header("location: index.php?opcao=05_galeria.php");
}
else {
    echo "<p>Erro fatal!</p>";
}

?>