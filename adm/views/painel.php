<script>
  function editarModulo(id,id_curso,nome) {
    $("#id_modulo").val(id);
    $("#id_curso").val(id_curso);
    $("#nome_modulo").val(nome);
  }

  function editarAula(id,id_modulo,id_curso,nome,url) {
    $("#id_aula").val(id);
    $("#id_moduloo").val(id_modulo);
    $("#id_cursoo").val(id_curso);
    $("#nome_aula").val(nome);
    $("#url_aula").val(url);
  }
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Cursos<small>Painel</small></h1>

      <div class="modal fade" id="modalEditModulo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Editar Modulo</h3>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>modulo/editar" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id_modulo" readonly style="width: 35px;">
                
                <input type="hidden" name="id_curso" class="form-control" id="id_curso">
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome_modulo" placeholder="Insira o nome do Modulo" required ><br>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
              <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalEditAula">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Editar Modulo</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>aula/editar" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id_aula" readonly style="width:35px;">

                <input type="hidden" name="id_moduloo" class="form-control" id="id_moduloo">
                <input type="hidden" name="id_cursoo" class="form-control" id="id_cursoo">
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome_aula" placeholder="Insira o nome da Aula" required ><br>

                <label for="url">URL</label>
                <input type="text" name="url" class="form-control" id="url_aula" placeholder="Insira a URL do video" required ><br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
              <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="content">

  <h1><?php echo $cursos->getNome(); ?></h1>

  <?php $x = 0; foreach($modulos as $modulo): ?>
    <div class="panel-group">
      <div class="panel" style="background:#2c2c2c;border-color:#FFF;">
        <div class="panel-heading" >
          <h4 class="panel-title">
            <a style="color:#FFF;" href="#collapse1<?php echo $x; ?>" data-toggle="collapse"><?php echo $modulo['nome']; ?></a>
            <a type="button" href="<?php echo BASE; ?>modulo/excluir/<?php echo $modulo['id']; ?>" class="btn btn-primaryyy btn-xs pull-right" data-confirm="Deseja excluir o Modulo selecionado?" data-toggle="tooltip" data-placement="top" title="Excluir">
              <i class='fa fa-trash' style="color:#FFF;"></i>
            </a> 
            <a type="button" class="btn btn-primaryyy btn-xs pull-right" onclick="editarModulo('<?php echo $modulo['id']; ?>','<?php echo $modulo['id_curso']; ?>','<?php echo $modulo['nome']; ?>')"  data-toggle="modal" data-target="#modalEditModulo" data-toggle="tooltip"  data-placement="left" title="Editar" style="margin-right:2px;">
              <i class='fa fa-pencil' style="color:#FFF;"></i>
            </a>
          </h4>
        </div>
        <div class="panel-collapse collapse" id="collapse1<?php echo $x; ?>">
          <ul class="list-group">
          <?php foreach($modulo['aulas'] as $aula): ?>
            <li class="list-group-item" style="background:#fff;border-radius:0;"><a href="#" style="color:#000;"><?php echo $aula['nome']; ?></a>
              <a type="button" href="<?php echo BASE; ?>aula/excluir/<?php echo $aula['id']; ?>" class="btn btn-primaryyy btn-xs pull-right" data-confirm="Deseja excluir a Aula selecionada?" data-toggle="tooltip" data-placement="top" title="Excluir">
                <i class='fa fa-trash'></i>
              </a> 
              <a type="button" class="btn btn-primaryyy btn-xs pull-right" onclick="editarAula('<?php echo $aula['id']; ?>','<?php echo $aula['id_modulo']; ?>','<?php echo $aula['id_curso']; ?>','<?php echo $aula['nome']; ?>','<?php echo $aula['url']; ?>')"  data-toggle="modal" data-target="#modalEditAula" data-toggle="tooltip"  data-placement="left" title="Editar" style="margin-right:2px;">
                <i class='fa fa-pencil'></i>
              </a>
            </li>
          <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  <?php $x++; endforeach; ?>
  </section>
