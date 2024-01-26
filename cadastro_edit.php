<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projeto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php
include "conexao.php";
$id = $_GET['id']  ?? '';
$sql = "SELECT * FROM usuarios WHERE id = $id";
$dados = mysqli_query($conn, $sql);

$linha = mysqli_fetch_assoc($dados);

$dataFiliacao = $linha['dt_filiacao'];
$anoFiliacao = date('Y', strtotime($dataFiliacao));
$anoAtual = date('Y');

$anuidadesDevidas = range($anoFiliacao, $anoAtual);

$sqlAnuidades = "SELECT ano, valor FROM anuidade WHERE ano IN (" . implode(',', $anuidadesDevidas) . ")";
$resultAnuidades = mysqli_query($conn, $sqlAnuidades);

$valoresAnuidades = [];
$valorTotalDevido = 0;
while ($rowAnuidade = mysqli_fetch_assoc($resultAnuidades)) {
    $valoresAnuidades[$rowAnuidade['ano']] = $rowAnuidade['valor'];
    $valorTotalDevido += $rowAnuidade['valor'];
}

?>
  <h1> DEV RN</h1>

  <!-- Main Content -->
  <div align="center" style="padding:20px; margin-top:50px;">

    <div class="col-md-10">
      <section class="section">

        <form action="edit_script.php" method="post" enctype="multipart/form-data">


          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">


                  <div class="card-header">
                    <h4>Editar Cadastro</h4><br>

                  </div>
                  <div class="card-body">

                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="text" class="form-control" name="nome" required
                          value="<?php echo $linha['nome']; ?>">
                      </div>

                    </div>

                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="email" class="form-control" name="email" placeholder="e-mail" required
                          value="<?php echo $linha['email']; ?>">
                      </div>

                    </div>

                    <div class="form-group row mb-4">
                      <p>Data Filiação</p>
                      <div class="col-md-12">
                        <input type="date" class="form-control" name="data" required
                          value="<?php echo $linha['dt_filiacao']; ?>">
                      </div>

                    </div>
                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="text" class="form-control" name="cpf" placeholder="CPF" required
                          value="<?php echo $linha['cpf']; ?>">
                      </div>

                    </div>
                    <div class="form-check d-flex align-items-center">
                    <div class="form-group row mb-4">
                      <div class="col-md-12">
                        <label for="anuidadesDevidas">Anuidades atreladas ao associado</label>
                        <select id="anuidadesDevidas" name="anuidadesDevidas[]" multiple>
                          <?php foreach ($valoresAnuidades as $ano => $valor): ?>
                          <option value="<?php echo $ano; ?>"><?php echo $ano . ' - R$ ' . $valor; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    </div>
                  
                    <div class="form-check d-flex align-items-center">
    <label class="form-check-label me-5" for="pgFeito">
        Pagamento Feito
    </label>
    <input class="form-check-input" type="checkbox" id="pgFeito" name="statusPgFeito" value="1" <?php echo ($linha['pg_feito'] == 1) ? 'checked' : ''; ?>>
</div>




                    <div class="form-group row mb-4">

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-success" value="Salvar Alterações">
                        <input type="hidden" name="id" value=<?php echo $linha ['id']?>>
                        <input type="hidden" id="valorTotalDevido" name="valorTotalDevido"
                        
                          value="<?php echo $valorTotalDevido; ?>">
                          <input type="hidden" id="statusPgFeito" name="statusPgFeito" value="<?php echo $linha['pg_feito']; ?>">

                          <a href="index.php" class="btn btn-danger"> Voltar </a>


                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
   
        <!-- fim formulario  topo menu -->

      </section>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>




</body>
<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        var hiddenField = document.querySelector('input[name="statusPgFeito"]');
        var checkbox = document.getElementById('pgFeito');

        if (hiddenField && hiddenField.value === '0') {
            checkbox.checked = false;
        }
    });
</script>
</html>

