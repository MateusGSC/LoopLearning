<div class="container"><br><br>
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-header">
          Progresso Geral
        </div>
        <div class="card-body" style="height:190px;">
          <select name="curso" id="curso" class="form-control" required >
            <option value="t">Selecione o curso</option>
            <?php foreach($cursos as $curso): ?>
              <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
            <?php endforeach; ?>
          </select>
          <div id="dados"></div>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card">
        <div class="card-header">
          Últimas aulas assistidas
        </div>
        <div class="card-body">
          <?php foreach($uas as $ua): ?>
            <!--<p><?php echo $ua['a']; ?></p>-->
            <img src="<?= BASE; ?>assets/img/success.png" alt="success" width="15px" height="15px" style="margin-right:1em;"><a href="<?php echo BASE; ?>aula/assistir/<?php echo $aula['id']; ?>" style="text-decoration:none;">   <?php echo $ua['a']; ?></a><hr style="margin-top:5px;margin-bottom:5px;">
          <?php endforeach; ?>
        </div>
      </div>
    </div> 

  </div>
</div>

<script>
    document.getElementById("curso").onchange = function() {
      id = this.value;
      
      if (id != 't') {
        $.ajax({
            url: BASE+"dashboard/dadosCursos",
            type:'POST',
            data:{id:id},
            dataType:'json',
            success:function(json) {
                  
            var result = json;

            if (result == false) {

              alert("Ocorreu algum erro ao carregar os dados da pagina!");
                          
            } else {

              $.ajax({
              url: BASE+"dashboard/dadosCursos2",
              type:'POST',
              data:{id:id},
              dataType:'json',
              success:function(json) {
                            
              var result2 = json;

              if (result2  == false) {

                alert("Ocorreu algum erro ao carregar os dados da pagina!");
                              
              } else {

                const html = `
                            
                <br><p><b style="color:#28a745;">${result['totalAssistidas']}</b> aulas concluídas</p>
                <p><b style="color:rgb(205, 0, 0);">${result2['totalNaoAssistidas']}</b> não concluídas</p>
                            
                `

                $("#dados").html(html);

              }
            }
          });
        }  
      }
    });

    } else {
        const html = '';

        $("#dados").html(html);
      }              
    }

</script>