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
    <div class ="row">
        <?php
        include "conexao.php";
        $statusPgFeito = isset($_POST['statusPgFeito']) ? 1 : 0;
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data = $_POST['data'];
        $cpf = $_POST['cpf'];

       
  
        
        $sql = "UPDATE `usuarios` set `nome` = ' $nome', `email` = '$email', `dt_filiacao` = '$data', `cpf` = '$cpf',`pg_feito` = '$statusPgFeito' WHERE id = '$id'";

        if(mysqli_query($conn, $sql)){
          mensagem("$nome Alterado com sucesso!!",'success'); 
        } else {
          mensagem("$nome Não foi alterado", 'danger');
        }

        ?>
       <hr> <a href="index.php" class ="btn btn-primary"> Voltar </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>




</body>

</html>

<?php ?>