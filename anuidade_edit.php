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
$cod_anuidade = $_GET['id']  ?? '';
$sql = "SELECT * FROM anuidade WHERE cod_anuidade = $cod_anuidade";
$dados = mysqli_query($conn, $sql);

$linha = mysqli_fetch_assoc($dados);
?>
<h1> DEV RN</h1>

  <!-- Main Content -->
  <div align="center" style="padding:20px; margin-top:50px;">

    <div class="col-md-10">
      <section class="section">

        <form action="edit_script_anuidade.php" method="post" enctype="multipart/form-data">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Editar anuidade selecionada</h4><br>
                  </div>
                  <div class="card-body">

                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="number" class="form-control" name="data"  placeholder="data" required value="<?php echo $linha['ano']; ?>">
                      </div>

                    </div>

                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="number" class="form-control" name="valor" placeholder="valor" required value="<?php echo $linha['valor']; ?>">
                      </div>


                    <div class="form-group row mb-4">

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" class="btn btn-success" value = "Salvar Alterações">
                        <input type="hidden" name="cod_anuidade" value="<?php echo isset($linha['cod_anuidade']) ? $linha['cod_anuidade'] : '' ?>">
                        
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <a href="index.php" class="btn btn-danger"> Inicio </a>
        <!-- fim formulario  topo menu -->
       
      </section>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>




</body>

</html>

<?php ?>