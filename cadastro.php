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
        <!-- inicio formulario  topo menu -->
        <form action="cadastro_form.php" method="post" enctype="multipart/form-data">


          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">


                  <div class="card-header">
                    <h4>Cadastro Associados</h4><br>

                  </div>
                  <div class="card-body">

                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="text" class="form-control" name="nome"required placeholder="Nome Completo">
                      </div>

                    </div>

                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="email" class="form-control" name="email" placeholder="e-mail" required>
                      </div>

                    </div>

                    <div class="form-group row mb-4">
                    <p>Data Filiação</p>
                      <div class="col-md-12">
                        <input type="date" class="form-control" name="data" required>
                      </div>

                    </div>
                    <div class="form-group row mb-4">

                      <div class="col-md-12">
                        <input type="text" class="form-control" name="cpf" placeholder="CPF" required>
                      </div>

                    </div>


                    <div class="form-group row mb-4">

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
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

</html>

<?php ?>