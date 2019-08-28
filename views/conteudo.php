<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-4 text-center" style="font-size:40px;"><?php echo $cursos->getNome(); ?></h3>
    <p class="display-5 text-center">Por <?php echo $instrutor['nome']; ?></p></h2><br>
    <div class="justify-content-center align-items-center row">
      <div class="progress" style="width: 70%;background-color:#ccc;">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentagem; ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <section class="content">
      <?php $x = 0; foreach($modulos as $modulo): ?>
        <div class="accordionn">
          <div class="card" style="background:#343a40;border:none;border-radius:2px;">
            <div class="card-header">
              <h4 class="card-title" id="card-title" style="margin-bottom:0px;">
                <a style="color:#FFF;text-decoration:none;font-size:16px;" href="#collapse1<?php echo $x; ?>" data-toggle="collapse"><?php echo $modulo['nome']; ?></a>
              </h4>
            </div>
            <div class="panel-collapse collapse" id="collapse1<?php echo $x; ?>">
              <ol class="list-group">
              <?php foreach($modulo['aulas'] as $aula): ?>
              <?php if($aula['assistido'] == 'SIM'): ?>
              <li class="list-group-item" style="background:#fff;border-radius:0;font-size:15px;"><img src="<?= BASE; ?>assets/img/success.png" alt="success" width="15px" height="15px" style="margin-right:1em;"><a href="<?php echo BASE; ?>aula/assistir/<?php echo $aula['id']; ?>" style="color:#000;text-decoration:none;">   <?php echo $aula['nome']; ?></a></li>
              <?php else: ?>
                <li class="list-group-item" style="background:#fff;border-radius:0;font-size:15px;"><img src="<?= BASE; ?>assets/img/nosuccess.png" alt="nosuccess" width="15px" height="15px" style="margin-right:1em;"><a href="<?php echo BASE; ?>aula/assistir/<?php echo $aula['id']; ?>" style="color:#000;text-decoration:none;">   <?php echo $aula['nome']; ?></a></li>
            <?php endif; ?>
              <?php endforeach; ?>
              </ol>
            </div>
          </div>
        </div>
      <?php $x++; endforeach; ?>
    </section>
</div>