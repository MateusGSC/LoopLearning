<div class="content-wrapper">
  <section class="content-header">
    <h1>Módulo<small>Cadastro</small></h1>
 </section>

  <section class="content">
    <form method="POST" action="<?php echo BASE; ?>modulo/salvar">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Insira o nome do Módulo" autofocus required><br>

      <label for="id_curso">Curso</label>
        <select name="id_curso" id="id_curso" class="form-control" required style="width:300px;">
          <option value="">Selecione...</option>
          <?php foreach($cursos as $curso): ?>
            <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
          <?php endforeach; ?>
        </select><br>

      <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
    </form>
  </section>
</div>