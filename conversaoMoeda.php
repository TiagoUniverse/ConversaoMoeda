<?php
// Especificação do programa: Realizar conversão de moeda
// Este programa calcula a conversão de moedas (real, dólar, euro). O usuário entra com o nome da moeda e o valor, o programa exibirá as opções de conversão e então o valor convertido. 

// Entradas: moeda (string), valor (decimal)
// Saídas: valor convertido (decimal), nome da moeda convertida (string)
// Data: 11/09/23

$valor = 0;
$valorConvertido = 0;
$tipo1_moeda = null;
$tipo2_moeda = null;

// Tratamento dos dados
if (isset($_POST['status_calculo']) && $_POST['status_calculo'] == "calculando") {
    $valor = $_POST['valor'];
    $tipo1_moeda = $_POST['tipo1_moeda'];
    $tipo2_moeda = $_POST['tipo2_moeda'];

    switch ($tipo1_moeda) {
        case "REAL":
            if ($tipo2_moeda == "DOLAR") {
                $valorConvertido = $valor * 0.19;
                echo "(Resultado: " . $valorConvertido . ", " . $tipo2_moeda . ")";
            } else if ($tipo2_moeda == "EURO") {
                $valorConvertido = $valor * 0.18;
                echo "(Resultado: " . $valorConvertido . ", " . $tipo2_moeda . ")";
            } else {
                echo "1Tipo inválido!";
            }
            break;
        case "DOLAR":
            if ($tipo2_moeda == "REAL") {
                $valorConvertido = $valor * 5.17;
                echo "(Resultado: " . $valorConvertido . ", " . $tipo2_moeda . ")";
            } else if ($tipo2_moeda == "EURO") {
                $valorConvertido = $valor * 0.93;
                echo "(Resultado: " . $valorConvertido . ", " . $tipo2_moeda . ")";
            } else {
                echo "Tipo inválido!";
            }
            break;
        case "EURO":
            if ($tipo2_moeda == "REAL") {
                $valorConvertido = $valor * 5.16;
                echo "(Resultado: " . $valorConvertido . ", " . $tipo2_moeda . ")";
            } else if ($tipo2_moeda == "DOLAR") {
                $valorConvertido = $valor * 1.07;
                echo "(Resultado: " . $valorConvertido . ", " . $tipo2_moeda . ")";
            } else {
                echo "Tipo inválido!";
            }
            break;
        default:
            echo "Tipo inválido!";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de moedas</title>
</head>

<body>
    <form action="conversaoMoeda.php" method="POST">
        <input type="hidden" name="status_calculo" value="calculando">
        <label>Insira o tipo da moeda:</label>
        <input type="text" name="tipo1_moeda" required><br><br>
        <label>Insira o valor da moeda:</label>
        <input type="number" name="valor" required><br><br>
        <label>Escolha a opção de conversão: REAL, DOLAR, EURO</label>
        <input type="text" name="tipo2_moeda" required><br><br>
        <button type="submit">Calcular</button>
    </form>
</body>

</html>