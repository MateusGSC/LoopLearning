<div class="container"><br>
  <h5 class="display-4" style="font-size:25px;">Meus Cursos</h5><br>

  <div class="row">
    <?php foreach($cursos as $curso): ?>
      <div class="col-sm-4">
        <div class="card">
          <img class="card-img-top" src="<?= BASE; ?>assets/img/cursos/<?php echo $curso['imagem']; ?>">
          <div class="card-body">
            <a href="<?php echo BASE; ?>curso/conteudo/<?php echo $curso['id']; ?>" id="id_curso" class="card-title" style="text-decoration:none;color:#000;font-size:18px;"><?= $curso['nome']; ?></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </div><br>
    
  <div class="text-center">
    <a href="<?=BASE;?>home" class="btn btn-success">Conheça mais cursos</a>
  </div><br>

</div>