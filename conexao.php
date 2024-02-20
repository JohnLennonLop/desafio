<?php

$servername = "localhost";
$username = "root";
$password = "John@123!";
$dbname = "projeto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo("Conexão falhou: " . $conn->connect_error);
}

function mensagem($texto, $tipo){
 echo "<div class='alert alert-$tipo' role='alert'>
        $texto
</div>";
}
function calcularStatusAnuidade($dataFiliacao, $pgFeito) {
   
    if ($pgFeito) {
        return 'Anuidade paga';
    }

    $anoAtual = date('Y');
    $anoFiliacao = date('Y', strtotime($dataFiliacao));

    $diferencaAnos = $anoAtual - $anoFiliacao;

    if ($diferencaAnos === 0) {
        return 'Anuidade Atual';
    } elseif ($diferencaAnos === -1) {
        return 'Anuidade do ano seguinte';
    } elseif ($diferencaAnos > 0) {
        return 'Anuidade em atraso';
    } else {
        return 'Anuidade futura';
    }
}
function obterValorAnuidadeDoBanco($ano, $conn)
{
    // Consulta SQL para obter o valor da anuidade do banco de dados
    $sql = "SELECT valor FROM anuidades WHERE ano = '$ano'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Se a consulta for bem-sucedida, retorna o valor da anuidade
        $row = mysqli_fetch_assoc($result);
        return $row['valor'];
    } else {
        // Se houver um erro na consulta, trate de acordo (por exemplo, log, mostrar mensagem de erro)
        return 0; // ou outro valor padrão
    }
}
?>
