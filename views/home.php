<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-4 text-center" style="font-size:40px;">Aprenda mais com os cursos da <br> <b>Loop</b>Learning!</h3><br>

      <div class="text-center">
        <a href="#" class="btn btn-dark btn-icon rounded-circle">
          <i class="fa fa-facebook-square"></i>
        </a>
        <a href="#" class="btn btn-dark btn-icon rounded-circle">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="#" class="btn btn-dark btn-icon rounded-circle">
          <i class="fa fa-github"></i>
        </a>
      </div>
  </div>
</div>

<div class="container">
    <p class="lead text-center">Aprenda com <b>cursos online</b>, gratuitos!</p><br>

    <div class="row">
      <?php foreach($cursos as $curso): ?>
        <div class="col-sm-4">
          <div class="card">
            <img class="card-img-top" src="<?= BASE; ?>assets/img/cursos/<?php echo $curso['imagem']; ?>" alt="Card image cap">
              <div class="card-body">
                  <a href="<?php echo BASE; ?>curso/dados/<?php echo $curso['id']; ?>" id="id_curso" class="card-title" style="text-decoration:none;"><?= $curso['nome']; ?></a>
                  <p class="card-text"><?= $curso['descricao']; ?></p>
              </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div><br>
</div>