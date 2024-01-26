<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<link rel="stylesheet" href="css/style.css">
</head>
<h1> DEV RN</h1>
<div align="center" style="padding:20px; margin-top:30px;">

  <?php
include "conexao.php";

$sql = "SELECT * FROM usuarios";
$dados = mysqli_query($conn, $sql);
$sqlAnuidades = "SELECT * FROM anuidade";
$resultadoAnuidades = mysqli_query($conn, $sqlAnuidades);

?>

  <body>
    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Associados</h5>
            <p class="card-text">Clique no botão para cadastrar os Associados.</p>
            <a href="cadastro.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Anuidade</h5>
            <p class="card-text">Cadastre aqui suas anuidades.</p>
            <a href="anuidade.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>

    </div>
    <h1 class="card-text">Associados</h1>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">CPF</th>
          <th scope="col"> Data Filiação</th>
          <th scope="col"> Anuidade</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            while ($linha = mysqli_fetch_assoc($dados)){
              $id = $linha ['id'];
              $nome = $linha ['nome'];
              $email = $linha ['email'];
              $cpf = $linha ['cpf'];
              $dataFiliacao = $linha['dt_filiacao'];  
              $data = new DateTime($linha['dt_filiacao']);  
              $dataFormatada = $data->format('d/m/Y');
              $totalDevido = 0;
              //$statusAnuidade = calcularStatusAnuidade($linha['dt_filiacao']);
              $statusAnuidade = calcularStatusAnuidade($dataFiliacao, $linha['pg_feito']);

              
              mysqli_data_seek($resultadoAnuidades, 0);

                while ($rowAnuidade = mysqli_fetch_assoc($resultadoAnuidades)) {
                    $anoAnuidade = $rowAnuidade['ano'];
                    $valorAnuidade = $rowAnuidade['valor'];

                    if ($anoAnuidade >= date('Y', strtotime($dataFiliacao)) && $anoAnuidade <= date('Y')) {
                        $totalDevido += $valorAnuidade;
                    }
                }

              echo "<tr>
              <th scope='row'>$nome</th>
              <td>$email</td>
              <td>$cpf</td>
              <td>$dataFormatada</td>
              <td width=150px>
              <a href='#' class='btn btn-success btn-sm'>R$ $totalDevido</a>
              <a href='cadastro_edit.php?id=$id' class='btn btn-danger btn-sm'> Editar </a>
              <a href='#' class='btn btn-warning btn-sm'>$statusAnuidade</a>
              </td>
              </tr>";
            }
        ?>
     
      </tbody>
    </table>
  </body>


</html>