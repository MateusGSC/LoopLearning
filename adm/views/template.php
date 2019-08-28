<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" href="<?= BASE; ?>assets/img/icon.png"/>
  <link rel="stylesheet" href="<?= BASE; ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/css/looplearning.css">
  <link rel="stylesheet" href="<?= BASE; ?>assets/css/AdminLTE.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?= BASE; ?>assets/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?= BASE; ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= BASE; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= BASE; ?>assets/js/looplearning.js"></script>
  <script>
    $(document).ready(function(){
      $('a[data-confirm]').click(function(ev){
        let href = $(this).attr('href');
        if(!$('#confirm-delete').length){
          $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header text-white"><b>Excluir</b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-primaryyy" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Não</button><a class="btn btn-primaryyy text-white" id="dataComfirmOK"><i class="fa fa-check" aria-hidden="true"></i> Sim</a></div></div></div></div>');
        }
        $('#dataComfirmOK').attr('href', href);
            $('#confirm-delete').modal({show: true});
        return false;
        
      });
    });
  </script>
  <title>Loop Learning - Plataforma EAD</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <header class="main-header">
    <a href="<?= BASE; ?>home" class="logo">
      <span class="logo-mini"><b>∞</b></span>
      <span class="logo-lg" style="font-size:0.6571em;color:#FFF;"><b style="color:#28a745;">LOOP</b>LEARNING</a></span>
    </a>

   <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= BASE; ?>assets/img/usuario.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['LoginAdm']['nome']; ?></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><strong><small>MENU DE NAVEGAÇAO</small></strong></li>
          <li>
            <a href="<?= BASE; ?>home">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview active" style="cursor:pointer;">
            <a>
              <i class="fa fa-user-o" aria-hidden="true"></i> <span>Usuários</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?= BASE; ?>administrador"><i class="fa fa-angle-right"></i> Administrador</a></li>
              <li><a href="<?= BASE; ?>instrutor"><i class="fa fa-angle-right"></i> Instrutor</a></li>
              <li><a href="<?= BASE; ?>aluno"><i class="fa fa-angle-right"></i> Aluno</a></li>
            </ul>
          </li>
          <li class="treeview active" style="cursor:pointer;">
            <a>
              <i class="fa fa-pencil-square-o"></i> <span>Cadastros</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= BASE; ?>curso"><i class="fa fa-angle-right"></i> Curso</a></li>
              <li><a href="<?= BASE; ?>modulo"><i class="fa fa-angle-right"></i> Módulo</a></li>
              <li><a href="<?= BASE; ?>aula"><i class="fa fa-angle-right"></i> Aula</a></li>
            </ul>
          </li>
          <li>
            <a href="<?= BASE; ?>login/sair">
              <i class="fa fa-sign-out"></i>
              <span>Sair</span>
            </a>
          </li>
        </li>
      </ul>
    </section>
  </aside>

  <?php $this->loadView($viewName, $viewData); ?>

  <script type="text/javascript">let BASE = '<?= BASE; ?>';</script>
  <script src="<?= BASE; ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= BASE; ?>assets/js/adminlte.min.js"></script>
  <script src="<?= BASE; ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= BASE; ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= BASE; ?>assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable({
        "oLanguage": {
          "sProcessing":"Processando...",
          "sLengthMenu":"Mostrar _MENU_ registros",
          "sZeroRecords":"Não foram encontrados resultados",
          "sInfo":"Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty":"Mostrando de 0 até 0 de 0 registros",
          "sInfoFiltered":"",
          "sInfoPostFix":"",
          "sSearch":"Buscar:",
          "sUrl":"",
          "oPaginate": {
          "sFirst":"Primeiro",
          "sPrevious":"Anterior",
          "sNext":"Seguinte",
          "sLast":"Último"
        }
      }
    });
  });
  </script>
</body>
</html>

