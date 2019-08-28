<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard</h1><br>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><img src="<?= BASE; ?>assets/img/curso.png" alt="Cursos" style="margin-top:-0.5em;"></span>
          <div class="info-box-content">
            <span class="info-box-text">CURSOS</span>
            <span class="info-box-number" style="font-size:35px;"><?= $totalCursos; ?></span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><img src="<?= BASE; ?>assets/img/usercinza.png" alt="Cursos" style="margin-top:-0.5em;width:85px;"></span>
          <div class="info-box-content">
            <span class="info-box-text">INSTRUTORES</span>
            <span class="info-box-number" style="font-size:35px;"><?= $totalInstrutores; ?></span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><img src="<?= BASE; ?>assets/img/usercinza2.png" alt="Cursos" style="margin-top:-0.5em;width:85px;"></span>
          <div class="info-box-content">
            <span class="info-box-text">ALUNOS</span>
            <span class="info-box-number" style="font-size:35px;"><?= $totalAlunos; ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>