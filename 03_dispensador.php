<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted
    $angle = $_POST["angle"];
    $arduinoIP = '192.168.12.11'; // Replace with the actual IP address of your Arduino

    $url = "http://$arduinoIP/?command=$angle";
    file_get_contents($url);
}
?>

<!DOCTYPE html>
<html lang="PT-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="folha-b.css">
    <title>Dispensador - Teste</title>
</head>

<body>
<div class="direito">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <h3>Controlar o ângulo da borboleta: </h3>
        <label for=" angle">Escolher Ângulo:</label>
        <br><br>
        <input type="radio" name="angle" value="0"> 0 graus (Não)
        <br>
        <input type="radio" name="angle" value="180"> 180 graus (Sim)
        <br><br>
        <input type="submit" value="Submeter">
    </form>
</div>
</body>

</html>