<div class="pull-right">
<a onclick="Proximo(<?php echo $aulas['id']; ?>)" style="cursor:pointer;">
  <img src="<?= BASE; ?>assets/img/right-arrow.png" id="avancar" alt="Avançar" height="50px">
</a>
</div>

<div class="pull-left">
<a onclick="Voltar(<?php echo $aulas['id']; ?>)" style="cursor:pointer;">
  <img src="<?= BASE; ?>assets/img/left-arrow.png" id="voltar" alt="Voltar" height="52px">
</a>
</div>

<div class="container"><br><br>
<h5 class="display-4" style="font-size:30px;"><?php echo $aulas['nome']; ?></h5><br>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=BASE;?>curso/conteudo/<?php echo $cursos['id']; ?>"><?php echo $cursos['nome']; ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $modulos['nome']; ?></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $aulas['nome']; ?></li>
    </ol>
  </nav>

  <div class="container">
    <div class="row">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="//player.vimeo.com/video/<?php echo $aulas['url']; ?>" frameborder="0"></iframe>
      </div>
    </div>
    <div class="text-center">
      <?php if($aulas['assistido'] == '1'): ?>
        <br><button class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Aula concluída em <?php echo $historico['dataView']; ?></button>
      <?php else: ?>
        <div>
          <br><button onclick="marcarAssistido(this)+document.location.reload(true)" data-id="<?= $aulas['id']; ?>" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Marcar como assistido</button>
        </div>
      <?php endif; ?>
    </div><br>
  </div>
</div>