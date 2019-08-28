<script>
  function editarCurso(id,nome,descricao) {
    $("#id_curso").val(id);
    $("#nome_curso").val(nome);
    $("#descricao_curso").val(descricao);
}
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Curso<small>Cadastro</small></h1><br>

    <button type="button" class="btn btn-primaryyy" data-toggle="modal" data-target="#modalAddCurso"><i class="fa fa-plus" aria-hidden="true"></i> Novo Curso</button><br>

    <div class="modal fade" id="modalAddCurso">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Cadastrar Curso</b></h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo BASE; ?>curso/salvar">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" placeholder="Insira o nome do Curso" autofocus required><br>

              <label for="imagem">Selecione uma foto</label>
              <input type="file" name="imagem" class="form-control"><br>

              <label for="descricao">Descrição</label><br>
              <textarea name="descricao" id="descricao" class="form-control" rows="5" style="resize:none;" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
            <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalEditCurso">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Editar Curso</b></h4>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo BASE; ?>curso/editar">
              <input type="hidden" name="id" class="form-control" id="id_curso" readonly style="width: 40px;">
              
              <label for="nome">Nome</label>
              <input type="text" name="nome" id="nome_curso" class="form-control" placeholder="Insira o nome do Curso" required><br>

              <label for="foto">Selecione uma foto</label>
              <input type="file" accept="image/jpeg" name="foto" class="form-control"><br>

              <label for="descricao">Descrição</label><br>
              <textarea name="descricao" id="descricao_curso" class="form-control" rows="5" style="resize:none;" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
            <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Editar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <?php foreach($cursos as $curso): ?>
        <div class="col-md-4">
          <div class="thumbnail">
          <img class="card-img-top" src="<?= BASE; ?>assets/img/cursos/<?php echo $curso['imagem']; ?>">
              <div class="caption">
                <div class="icons-user pull-right">
                  <a type="button" class="btn btn-primaryyy btn-xs" onclick="editarCurso('<?php echo $curso['id']; ?>','<?php echo $curso['nome']; ?>','<?php echo $curso['descricao']; ?>')"  data-toggle="modal" data-target="#modalEditCurso" data-toggle="tooltip" data-placement="left" title="Editar">
                    <i class='fa fa-pencil'></i>
                  </a>
                  <a type="button" href="<?php echo BASE; ?>curso/excluir/<?php echo $curso['id']; ?>" class="btn btn-dangerrr btn-xs" data-confirm="Deseja excluir o Curso selecionado?" data-toggle="tooltip" data-placement="right" title="Excluir">
                    <i class='fa fa-trash'></i>
                  </a> 
                </div>
                <a href="<?php echo BASE; ?>curso/painel/<?php echo $curso['id']; ?>" id="id_curso" style="color:#000;font-size:20px;"><span class="widget-user-username"><?php echo $curso['nome']; ?></span></a>
                <br><p style="color:#6b6b6b;"><?php echo $curso['descricao']; ?></p>  
              </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  
</div>