<!DOCTYPE html>
<?php
session_start();
//print_r($_SESSION);
if (!empty($_SESSION['usuario']) && !empty($_SESSION['senha'])) {
    header("Location:admin.php");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Projeto Resgate</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="singin.css">
</head>
<body>
  <div class="container">
    <form class="form-signin" action="seguranca/autenticausu_seguranca.php" method="POST" name="formlogin">
      <h2 class="form-signin-heading">Login</h2>
      <label for="usuario" class="sr-only">Usuário</label>
      <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Digite o usuário" required="" autofocus="">
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a senha" required="">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>    
</body>
</html>