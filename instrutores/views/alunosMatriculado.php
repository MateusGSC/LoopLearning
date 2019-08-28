<div class="content-wrapper">
  <section class="content-header">
    <h1>Alunos matriculados</h1><br>
  </section>

  <section class="content">
    <div class="card-body">
      <h4> Total de alunos: <b><?php echo $total->totalAlunos; ?></b></h4>
    </div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ativo</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($dadosAlunos as $list): ?>
            <tr>
                <td><?php echo $list['nome']; ?></td>
                <td><?php echo $list['email']; ?></td>
                <td><?php echo $list['situacao']; ?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </section>
</div>