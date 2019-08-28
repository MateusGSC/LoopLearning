<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-4 text-center" style="font-size:40px;"><?php echo $cursos->getNome(); ?></h3>
    <p class="display-5 text-center"><?php echo $cursos->getDescricao(); ?></p></h2><br>

    <?php if(isset($_SESSION['LoginAln']) && !empty($_SESSION['LoginAln'])): ?>
      <form action="<?= BASE; ?>curso/adicionar" method="POST" class="text-center">
        <button type="submit" class="btn btn-success" name="id_curso" value="<?php echo $cursos->getId(); ?>">Me Inscrever Agora</button>
      </form>
    <?php else: ?>
      <form action="<?= BASE; ?>login" method="POST" class="text-center">
        <button type="submit" class="btn btn-success" name="id_curso" value="<?php echo $cursos->getId(); ?>">Me Inscrever Agora</button>
      </form>
    <?php endif; ?>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h4 class="display-4 text-center" style="font-size:27px;">Conteúdo Programático</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ol>
        <?php foreach($modulos as $modulo): ?>
            <li>
                <h5 class="display-4" style="font-size:18px;"><b><?php echo $modulo['nome']; ?></b></h5>
                <ol>
                    <?php foreach($modulo['aulas'] as $aula): ?>
                    <li>
                        <h5 class="display-4" style="font-size:15px;"><?php echo $aula['nome']; ?></h5>
                    </li>
                    <?php endforeach; ?>
                </ol><br>
            </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
  <h4 class="display-4 text-center" style="font-size:27px;">Instrutor</h4><br>
  <div class="row">
    <div class="col-md-2 offset-1">
      <img src="<?=BASE;?>assets/img/user.png" alt="Instrutor" style="width:170px;height:170px;background:#ccc;">
    </div>
    <div class="col-md-8">
      <h5><?php echo $instrutor['nome']; ?></h5>
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi et veniam error nostrum, nobis soluta culpa beatae vel suscipit est blanditiis, ex laboriosam molestiae officiis dolorum. Ea fugit deleniti illum.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nobis ab omnis at? Accusamus aperiam modi facilis temporibus fuga ea excepturi autem quidem pariatur ex perspiciatis blanditiis, dolorem impedit exercitationem.
    </div>
  </div><br>
</div>