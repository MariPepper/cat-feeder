<!DOCTYPE html>
<html lang="PT-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensador - Registar</title>
</head>

<body>

<div class="direito">
<form form action="" method="post" enctype="multipart/form-data">
    <h3>Novo utilizador: </h3>
    <p>Nome: &nbsp; &nbsp;<input style="margin-left: 68px;" type="text" name="nome" required></p>
    <p>Utilizador: &nbsp; &nbsp;<input style="margin-left: 42px;" type="text" name="username" required></p>
    <p>Senha: &nbsp; &nbsp;<input style="margin-left: 68px;" type="password" name="password" required></p>
    <p>Confirmar senha: &nbsp; &nbsp;<input type="password" name="confirmarPassword" required></p>
    <p>Morada:</p>
    <textarea name="morada" id="morada"></textarea>
    <p><button>Enviar</button></p>
</form>
</div>

<?php

// inserir registo se formulário for submetido
if (!empty($_POST["nome"])) {
    // ligar ao servidor MYSQL
    require("conexao.php");
    $nome = $_POST["nome"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmarPassword = $_POST["confirmarPassword"];
    $morada = $_POST["morada"];

    if ($password != $confirmarPassword) {
        echo "<p class='error'>Password e confirmar password não coincidem!</p>";
        exit;
    } else {
        // verificar se já existe aquele username!
        $conn->query("select * from utilizador where username='$username'");
        if ($conn->affected_rows == 1) {
            // já existe!
            echo "<p class='error'> Já existe esse username! Tente outro!</p>";
            exit;
        }

        $sql = "insert into utilizador(nome, username, password, morada)
            values('$nome', '$username', '$password', '$morada')";
        $conn->query($sql);
        if ($conn->affected_rows == 1) {
            echo "<p>Utilizador registado com sucesso! Por favor efetue o login. </p>";
        } else
            echo "<p>Erro: Tente novamente!</p>";
    }
}
?>

</body>
</html>