<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" href="<?= BASE; ?>assets/img/icon.png"/>
  <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  
  <title>Loop Learning</title>
</head>
<body style="background:#f2f2f2;">
  <nav class="navbar" style="background:#FFF;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:#000;" href="<?= BASE; ?>home" class="navbar-brand"><b>Loop</b>Learning</a>
      </div>
    </div>
  </nav>

  <div class="modal fade" id="modalPerfilNome">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Nome</h4>
        </div>
      <div class="modal-body">
        <form method="POST" action="<?= BASE; ?>perfil/editar">
          <input type="hidden" name="id" class="form-control" readonly style="width:40px;" value="<?php echo $_SESSION['LoginAdm']['id']; ?>"><br>

          <label for="nome">Novo Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Insira o novo nome" autofocus required value="<?php echo $_SESSION['LoginAdm']['nome']; ?>"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dangerr pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
        <button type="submit" class="btn btn-successs"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="modalPerfilSenha">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar Senha</h4>
        </div>
      <div class="modal-body">
        <form method="POST" action="<?= BASE; ?>perfil/editarSenha">
          <input type="hidden" name="id" class="form-control" readonly style="width:40px;" value="<?php echo $_SESSION['LoginAdm']['id']; ?>"><br>

          <label for="senha">Nova Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Insira a nova senha" autofocus required><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dangerr pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
        <button type="submit" class="btn btn-successs"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <div class="content">
    <section class="container">
      <header class="content-header container-fluid">
        <div class="row">
          <div class="col-md-8">
            <h1 style="color:#000;font-size:35px;" class="content-max-width"><b>Suas Informações</b></h1><br><br>
          </div>
        </div>
      </header>

      <div class="content container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <section class="content-max-width">
              <section id="installation">
              </section>
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <img src="<?= BASE; ?>assets/img/userverde.png" style="width:220px;">
          </div>
          <div class="col-md-6">
            <h1 style="color:#000;font-size:36px;"><b><?php echo $_SESSION['LoginAdm']['nome']; ?></b></h1>
            <a style="color:#007239;margin:0;cursor:pointer;" data-toggle="modal" data-target="#modalPerfilNome"><p>Editar nome</p></a><br>
            <img src="<?= BASE; ?>assets/img/userpreto.png" class="user-image" style="width:140px;margin-left:-4.3em;">
            <span style="margin-left:-2em;font-size:16px;"><?php echo $_SESSION['LoginAdm']['email']; ?></span><br>
            <img src="<?= BASE; ?>assets/img/senha.png" class="user-image" alt="User Image" style="width:33px;margin-top:-1em;margin-left:-0.4em;">
            <a style="color:#007239;margin-left: 1em;cursor:pointer;" data-toggle="modal" data-target="#modalPerfilSenha">Editar Senha</a>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>

