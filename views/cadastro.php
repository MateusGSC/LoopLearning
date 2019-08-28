<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>LoopLearning - Plataforma EAD</title>

  <link rel="shortcut icon" href="<?= BASE; ?>assets/img/icon.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=BASE;?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=BASE;?>assets/plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h5 class="display-4" style="font-size:25px;"><b style="color:#28a745;">LOOP</b>LEARNING</h5>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Nova conta na <b>Loop</b>Learning</p>

    <?php
      if(!empty($msg)) {
          echo $msg;
      }
    ?>

      <form action="<?=BASE;?>cadastro/verificar" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nome" placeholder="Nome completo">
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
          </div>
        </div>
      </form><br>
      Já possui uma conta?<a href="<?=BASE;?>login" class="text-center"> Entre aqui!</a>
    </div>
  </div>
</div>

<script src="<?=BASE;?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=BASE;?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=BASE;?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%'
    })
  })
</script>
</body>
</html>
