<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" href="<?= BASE; ?>assets/img/icon.png"/>
  <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/AdminLTE.css">
  <link rel="stylesheet" href="assets/css/looplearning.css">
  <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  
  <title>Loop Learning - Plataforma EAD</title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h5 style="font-size:20px;"><b style="color:#28a745;">LOOP</b>LEARNING</h5>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Entre com o <b>E-mail</b> e <b>Senha</b></p>

    <?php
      if(!empty($msg)) {
          echo $msg;
      }
    ?>

    <form method="POST" action="<?= BASE; ?>login/verificar">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="E-mail" autofocus required>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-successs btn-block"><b>Entrar</b></button>
        </div>
      </div>
    </form><br>

    <a style="color:#007bff;" href="<?php echo BASE; ?>">Esqueceu a senha?</a>

  </div>
</div>

<div class="login-box">

</div>

</body>
</html>
