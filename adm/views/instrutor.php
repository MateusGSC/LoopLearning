<script>
  function editarInstrutor(id,nome,email,biografia,situacao) {
    $("#id_instrutor").val(id);
    $("#nome_instrutor").val(nome);
    $("#email_instrutor").val(email);
    $("#biografia_instrutor").val(biografia);
    $("#situacao_instrutor").val(situacao);
}
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Instrutor<small>Cadastro</small></h1><br>

    <button type="button" class="btn btn-primaryyy" data-toggle="modal" data-target="#modalAddInstrutor"><i class="fa fa-plus" aria-hidden="true"></i> Novo Instrutor</button>

      <div class="modal fade" id="modalAddInstrutor">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Cadastrar Instrutor</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?= BASE; ?>instrutor/salvar">
                <input type="hidden" name="id" class="form-control" readonly style="width:40px;">

                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Insira o nome do Instrutor" autofocus required><br>

                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="Insira o E-mail" required><br>

                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Crie uma senha"required><br>

                <label for="biografia">Biografia</label><br>
                <textarea type="text" name="biografia" id="biografia" class="form-control" rows="5" required style="resize:none;"></textarea><br>

                <label for="situacao">Situação:</label>
                  <select name="situacao" id="situacao" class="form-control" required style="width:130px;">
                    <option value="">Selecione...</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                  </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primaryyy pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
              <button type="submit" class="btn btn-primaryyy"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalEditInstrutor">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Editar Instrutor</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>instrutor/editar" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id_instrutor" readonly style="width: 40px;">
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome_instrutor" placeholder="Insira o nome do Instrutor" required><br>

                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email_instrutor" placeholder="Insira o E-mail" required><br>

                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha_instrutor" placeholder="*****"><br>

                <label for="biografia">Biografia</label><br>
                <textarea name="biografia" class="form-control" rows="5" id="biografia_instrutor" required style="resize:none;"></textarea><br>

                <label for="situacao">Situação:</label>
                  <select name="situacao" id="situacao_instrutor" class="form-control" required style="width:130px;">
                    <option >ATIVO</option>
                    <option >INATIVO</option>
                  </select>
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
    <div class="box box-widget ">
      <div class="box-header with-border">
        <h3 class="box-title">Instrutores cadastrados</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th class="text-center">Situação</th>
              <th class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($instrutores as $instrutor): ?>
            <tr>
              <td><?php echo $instrutor['id']; ?></td>
              <td><?php echo $instrutor['nome']; ?></td>
              <td><?php echo $instrutor['email']; ?></td>
              <?php if($instrutor['situacao'] == 'ATIVO'): ?>
                <td class="text-center"><span class="label label-successs"><?php echo $instrutor['situacao']; ?></span></td>
              <?php else: ?>
                <td class="text-center"><span class="label label-dangerr"><?php echo $instrutor['situacao']; ?></span></td>
              <?php endif; ?>
              <td>
                <div class='text-center'>
                  <a type="button" class="btn btn-primaryyy btn-xs" onclick="editarInstrutor('<?php echo $instrutor['id']; ?>','<?php echo $instrutor['nome']; ?>','<?php echo $instrutor['email']; ?>','<?php echo $instrutor['biografia']; ?>','<?php echo $instrutor['situacao']; ?>')"  data-toggle="modal" data-target="#modalEditInstrutor" data-toggle="tooltip" data-placement="left" title="Editar">
                    <i class='fa fa-pencil'></i>
                  </a>
                  <a type="button" href="<?php echo BASE; ?>instrutor/excluir/<?php echo $instrutor['id']; ?>" class="btn btn-dangerrr btn-xs" data-confirm="Deseja excluir o Instrutor selecionado?" data-toggle="tooltip" data-placement="right" title="Excluir">
                    <i class='fa fa-trash'></i>
                  </a> 
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th class="text-center">Situação</th>
              <th class="text-center">Opções</th>
            </tr>
          </tfoot>
          </table>
        </div>
      </div>
    </section>
</div>

  <script type="text/javascript">
  	$(document).ready(function(){
		$("#situacao_instrutor").val('#situacao_instrutor option:selected');
  });
  </script>
