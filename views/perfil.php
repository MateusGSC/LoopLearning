<div class="container"><br><br>
  <div class="row">
    <div class="col-12">
      <h6>ALTERAÇÃO DE PERFIL</h6>
      <form method="POST" action="<?php echo BASE; ?>perfil/editar" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="id" class="form-control" id="id_aluno" value="<?php echo $alunos['id']; ?>" readonly style="width: 40px;">
        </div>
        <div class="form-group">
          <label for="nome" style="font-size:13px;">Nome</label>
          <input type="text" name="nome" class="form-control" id="nome_aluno" value="<?php echo $alunos['nome']; ?>">
        </div>
        <div class="form-group">
          <label for="email" style="font-size:13px;">E-mail</label>
          <input type="text" name="email" class="form-control" id="email_aluno" readonly value="<?php echo $alunos['email']; ?>">
        </div>
        <div class="form-group">
          <label for="senha" style="font-size:13px;">Senha</label>
          <input type="password" name="senha" class="form-control" id="senha_aluno" placeholder="*****">
        </div>
        <button type="submit" class="btn btn-success">Alterar Dados</button>
      </form><br>
    </div>
  </div>
</div>