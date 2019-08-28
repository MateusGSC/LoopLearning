<script>
  function editarAluno(id,nome,email,situacao) {
    $("#id_aluno").val(id);
    $("#nome_aluno").val(nome);
    $("#email_aluno").val(email);
    $("#situacao_aluno").val(situacao);
}
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Aluno<small>Cadastro</small></h1><br>

    <button type="button" class="btn btn-primaryyy" data-toggle="modal" data-target="#modalAddAluno"><i class="fa fa-plus" aria-hidden="true"></i> Novo Aluno</button>

      <div class="modal fade" id="modalAddAluno">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Cadastrar Aluno</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>aluno/salvar">
                <input type="hidden" name="id" class="form-control" readonly style="width: 40px;">

                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Insira o nome do Aluno" autofocus required><br>

                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="Insira o E-mail" required><br>

                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Crie uma senha"required><br>

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

      <div class="modal fade" id="modalEditAluno">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Editar Aluno</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>aluno/editar" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id_aluno" readonly style="width: 40px;">

                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome_aluno" placeholder="Insira o nome do Aluno" required ><br>

                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email_aluno" placeholder="Insira o E-mail" required ><br>

                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha_aluno"  placeholder="*****"><br>

                <label for="situacao">Situação:</label>
                  <select name="situacao" id="situacao_aluno" class="form-control" required style="width:130px;">
                    <option >ATIVO</option>
                    <option >INATIVO</option>
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
  </section>

  <section class="content">
    <div class="box box-widget ">
      <div class="box-header with-border">
        <h3 class="box-title">Alunos cadastrados</h3>
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
          <?php foreach($alunos as $aluno): ?>
            <tr>
              <td><?php echo $aluno['id']; ?></td>
              <td><?php echo $aluno['nome']; ?></td>
              <td><?php echo $aluno['email']; ?></td>
              <?php if($aluno['situacao'] == 'ATIVO'): ?>
                <td class="text-center"><span class="label label-successs"><?php echo $aluno['situacao']; ?></span></td>
              <?php else: ?>
                <td class="text-center"><span class="label label-dangerr"><?php echo $aluno['situacao']; ?></span></td>
              <?php endif; ?>
              <td>
                <div class='text-center'>
                  <a type="button" class="btn btn-primaryyy btn-xs" onclick="editarAluno('<?php echo $aluno['id']; ?>','<?php echo $aluno['nome']; ?>','<?php echo $aluno['email']; ?>','<?php echo $aluno['situacao']; ?>')"  data-toggle="modal" data-target="#modalEditAluno" data-toggle="tooltip"  data-placement="left" title="Editar">
                    <i class='fa fa-pencil'></i>
                  </a>
                  <a type="button" href="<?php echo BASE; ?>aluno/excluir/<?php echo $aluno['id']; ?>" class="btn btn-dangerrr btn-xs" data-confirm="Deseja excluir o Aluno selecionado?" data-toggle="tooltip" data-placement="right" title="Excluir">
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
		$("#situacao_aluno").val('#situacao_aluno option:selected');
  });
  </script>