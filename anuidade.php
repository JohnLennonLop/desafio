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
<?php
include "conexao.php";

$sql = "SELECT * FROM anuidade";
$dados = mysqli_query($conn, $sql);

?>
<body>
  <h1> DEV RN</h1>

  <!-- Main Content -->
  <div align="center" style="padding:20px; margin-top:50px;">

    <div class="col-md-10">
      <section class="section">


        <!-- inicio topo menu -->
        <?php
            
            //require_once('topo.php');

            ?>

        <!-- fim topo menu -->


        <br>
        <form action="anuidade_form.php" method="post" enctype="multipart/form-data">


          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Cadastro de Anuidades</h4><br>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-md-3 col-form-label">Ano</label>
                      <div class="col-md-9">
                        <input type="number" class="form-control" name="ano" required placeholder="Ano">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-md-3 col-form-label">Valor</label>
                      <div class="col-md-9">
                        <input type="number" class="form-control" name="valor" placeholder="Valor" required>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                        <a href="index.php" class="btn btn-danger"> Voltar </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <h1 class="card-text">Anuidades</h1>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">Ano</th>
          <th scope="col">Valor</th>
          <th scope="col"> Opções</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
            while ($linha = mysqli_fetch_assoc($dados)){
              $cod_anuidade = $linha ['cod_anuidade'];
              $ano = $linha ['ano'];
              $valor = $linha ['valor'];
             
              
              echo "<tr>
              <th scope='row'>$ano</th>
              <td>$valor</td>
              <td width=150px>
              <a href='anuidade_edit.php?id=$cod_anuidade' class='btn btn-danger btn-sm'> Editar </a>
              
              </td>
              </tr>";
            }
        ?>
     
      </tbody>
    </table>



      </section>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>




</body>

</html>

<?php ?>