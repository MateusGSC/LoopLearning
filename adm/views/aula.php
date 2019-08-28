<div class="content-wrapper">
  <section class="content-header">
    <h1>Aula<small>Cadastro</small></h1>
  </section>

  <section class="content">
    <form method="POST" action="<?php echo BASE; ?>aula/salvar">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Insira o título da Aula" autofocus required><br>

      <label for="nome">URL</label>
      <input type="text" name="url" class="form-control" placeholder="Insira a URL do vídeo" required><br>

      <div class="row"> 
        <div class="col-md-2">
          <label for="id_curso">Curso</label>
            <select name="id_curso" id="id_curso" class="form-control" onchange="exibirModulos(this)" required style="width:160px;">
              <option value="">Selecione...</option>
              <?php foreach($cursos as $curso): ?>
                <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
          <label for="id_curso">Módulo</label>
            <select name="id_modulo" id="id_modulo" class="form-control" required style="width:400px;">
              <option value="">Selecione...</option>
            </select>
        </div>
      </div><br>

      <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
    </form>
  </section>
</div>

