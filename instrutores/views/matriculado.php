<div class="content-wrapper">
  <section class="content-header">
    <h1>Alunos matriculados</h1><br>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="<?= BASE; ?>matriculado/relatorio">
            <select name="id_curso" id="id_curso" class="form-control" required >
                <option value="" selected>Selecione o curso</option>
                    <?php foreach($cursos as $curso): ?>
                    <option value="<?php echo $curso['id']; ?>" ><?php echo $curso['nome']; ?></option>
                    <?php endforeach; ?>
            </select><br>
        <button type="submit" class="btn btn-primaryyy"><i class="fa fa-plus" aria-hidden="true"></i> Gerar</button>
        </form>
      </div>
    </div>
  </section>
</div>