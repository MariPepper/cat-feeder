<!DOCTYPE html>
<html lang="PT-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensador - Entrar</title>
</head>

<body>

<div class="direito">
<form form action="" method="post" enctype="multipart/form-data">
<p>Utilizador: &nbsp; &nbsp;<input style="margin-left: 5px;" type="text" name="username" required></p>
<p>Senha: &nbsp; &nbsp;<input style="margin-left: 32px;" type="password" name="password" required></p>
<p><button>Entrar</button></p>
</form>
</div>

<?php
if (!empty($_POST["username"])) {

    include("conexao.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM utilizador where username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_array()) {
        // login válido
        // session_start();  começar ou continuar a sessão
        $_SESSION["idutilizador"] = $row["idutilizador"];
        $_SESSION["admin"] = $row["admin"];
        $_SESSION["nome"] = $row["nome"];
        header("location: index.php");
    } else {
        echo "<p>Credenciais incorretas!</p>";
    }
}

?>

</body>
</html>