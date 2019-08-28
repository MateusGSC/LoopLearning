<script>
  function editarAdministrador(id,nome,email,situacao) {
    $("#id_administrador").val(id);
    $("#nome_administrador").val(nome);
    $("#email_administrador").val(email);
    $("#situacao_administrador").val(situacao);
}
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrador<small>Cadastro</small></h1><br>
    
    <button type="button" class="btn btn-primaryyy" data-toggle="modal" data-target="#modalAddAdministrador"><i class="fa fa-plus" aria-hidden="true"></i> Novo Administrador</button>

      <div class="modal fade" id="modalAddAdministrador">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Cadastrar Administrador</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?= BASE; ?>administrador/salvar">
                <input type="hidden" name="id" class="form-control" readonly style="width:40px;">

                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Insira o nome do Administrador" autofocus required><br>

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

      <div class="modal fade" id="modalEditAdministrador">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Editar Administrador</b></h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo BASE; ?>administrador/editar" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" id="id_administrador" readonly style="width: 40px;">
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome_administrador" placeholder="Insira o nome do Administrador" required ><br>

                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email_administrador" placeholder="Insira o E-mail" required ><br>

                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha_administrador" placeholder="*****"><br>

              <?php if($_SESSION['LoginAdm']['id'] == 'ATIVO'): ?>
                <label for="situacao">Situação:</label>
                  <select name="situacao" id="situacao_administrador" class="form-control" disabled required style="width:130px;">
                    <option >ATIVO</option>
                    <option >INATIVO</option>
                  </select>
              <?php else: ?>
              <label for="situacao">Situação:</label>
                  <select name="situacao" id="situacao_administrador" class="form-control" required style="width:130px;">
                    <option >ATIVO</option>
                    <option >INATIVO</option>
                  </select>
              <?php endif; ?>
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
        <h3 class="box-title">Administradores cadastrados</h3>
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
          <?php foreach($administradores as $administrador): ?>
            <tr>
              <td><?php echo $administrador['id']; ?></td>
              <td><?php echo $administrador['nome']; ?></td>
              <td><?php echo $administrador['email']; ?></td>
              <?php if($administrador['situacao'] == 'ATIVO'): ?>
                <td class="text-center"><span class="label label-successs"><?php echo $administrador['situacao']; ?></span></td>
              <?php else: ?>
                <td class="text-center"><span class="label label-dangerr"><?php echo $administrador['situacao']; ?></span></td>
              <?php endif; ?>
              <td>
                <div class='text-center'>
                  <a type="button" class="btn btn-primaryyy btn-xs" onclick="editarAdministrador('<?php echo $administrador['id']; ?>','<?php echo $administrador['nome']; ?>','<?php echo $administrador['email']; ?>','<?php echo $administrador['situacao']; ?>')"  data-toggle="modal" data-target="#modalEditAdministrador" data-toggle="tooltip" data-placement="left" title="Editar">
                    <i class='fa fa-pencil'></i>
                  </a>
                  <a type="button" href="<?php echo BASE; ?>administrador/excluir/<?php echo $administrador['id']; ?>" class="btn btn-dangerrr btn-xs" data-confirm="Deseja excluir o Administrador selecionado?" data-toggle="tooltip" data-placement="right" title="Excluir">
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
		$("#situacao_administrador").val('#situacao_administrador option:selected');
  });
  </script>
