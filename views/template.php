<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>LoopLearning - Plataforma EAD</title>
  
  <link rel="shortcut icon" href="<?= BASE; ?>assets/img/icon.png"/>
  <link rel="stylesheet" href="<?= BASE; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/css/adminlte.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/css/looplearning.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/plugins/bootstrap/css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="<?= BASE; ?>assets/js/looplearning.js"></script>
</head>

<body>
  <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #343a40;">
      <div class="container">
        <?php if(isset($_SESSION['LoginAln']) && !empty($_SESSION['LoginAln'])): ?>
          <a href="<?= BASE; ?>cursos" class="navbar-brand" style="font-size:0.8571em;color:#FFF;"><b style="color:#28a745;">LOOP</b>LEARNING</a>
        <?php else: ?>
          <a href="<?= BASE; ?>home" class="navbar-brand" style="font-size:0.8571em;color:#FFF;"><b style="color:#28a745;">LOOP</b>LEARNING</a>
				<?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['LoginAln']) && !empty($_SESSION['LoginAln'])): ?>
          <li class="nav-item dropdown">
            <a style="color:#FFF;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['LoginAln']['nome']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?=BASE;?>dashboard">Andamento</a>
              <a class="dropdown-item" href="<?=BASE;?>perfil">Minha Conta</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= BASE; ?>login/sair">Sair</a>
            </div>
          </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="btn btn-outline-success" style="font-size:0.8571em;" href="<?= BASE; ?>login"><b>Login</b></a>
            </li>
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  
    <?php $this->loadView($viewName, $viewData); ?>

  </div>

<script src="<?= BASE; ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= BASE; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE; ?>assets/js/adminlte.js"></script>
<script src="<?= BASE; ?>assets/js/demo.js"></script>
<script src="<?= BASE; ?>assets/js/pages/dashboard3.js"></script>
</body>
</html>
