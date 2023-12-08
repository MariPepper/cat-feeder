<!DOCTYPE html>
<html lang="PT-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensador - Painel de Controle</title>
</head>

<body>
    <?php
    include_once('conexao.php');
    if (!empty($_POST)) {
        if (isset($_POST['led1']) and $_POST['led1'] == 'l') {
            $letra1 = 'a';
            $letra2 = 'c';
            $letra3 = 'e';
        } else {
            $letra1 = 'b';
            $letra2 = 'd';
            $letra3 = 'f';
        }
        $sql = 'UPDATE servo1, servo2, leds
        SET servo1.estado = "' . $letra1 . '", servo2.estado = "' . $letra2 . '", leds.estado = "' . $letra3 . '"
        WHERE servo1.idservo = 1 AND servo2.idservo = 1 AND leds.idled = 1';
        mysqli_query($conn, $sql);
        // Descomentar para verificar se funciona
        // print_r($_POST);
    }
    ?>
    <div class="esquerdo">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            $codigo = 561972;
            $valor = $estado = '';
            $sql = 'SELECT * FROM leds WHERE codigo LIKE "' . $codigo . '"';
            $resultado = mysqli_query($conn, $sql);
            if ($resultado) {
                while ($linha = mysqli_fetch_array($resultado)) {
                    $valor = $linha['estado'];
                }
            }
            if ($valor == 'e') {
                $estado = 'checked';
            }
            print '<input type="hidden" name="teste">';
            print '<p>Ativar o dispensador <input type="checkbox" name="led1" value="l" ' . $estado . '></p>';
            print '<p><input type="submit" value="Atualizar"></p>';
            ?>
            <img src="img/71gtbzJu2zL._AC_SL1500_.jpg" />
        </form>
    </div>
    <div class="esquerdo">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            $codigo = 561972;
            $valor = $estado = '';
            $sql = 'SELECT * FROM leds WHERE codigo LIKE "' . $codigo . '"';
            $resultado = mysqli_query($conn, $sql);
            if ($resultado) {
                while ($linha = mysqli_fetch_array($resultado)) {
                    $valor = $linha['estado'];
                }
            }
            if ($valor == 'e') {
                $estado = 'checked';
            }
            print '<input type="hidden" name="teste">';
            print '<p>Ativar o dispensador <input type="checkbox" name="led1" value="l" ' . $estado . '></p>';
            print '<p><input type="submit" value="Atualizar"></p>';
            ?>
            <img src="img/71gtbzJu2zL._AC_SL1500_.jpg" />
        </form>
    </div>
</body>

</html>