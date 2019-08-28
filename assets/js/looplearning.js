let BASE = "http://localhost/LoopLearning/";

function marcarAssistido(obj) {
    var id = $(obj).attr('data-id');

    $(obj).remove();

    $.ajax({
        url:'/LoopLearning/ajax/marcarAssistido/'+id,
        type:'GET'
    });
}

function Proximo(id) {

    $.ajax({
        url: BASE+"Aula/proximaAula",
        type:'POST',
        data:{id:id},
        dataType:'json',
        success:function(json) {
            
            var result = json;
            
            if(result == "ERRO1") {
                alert("Ocorreu um erro ao avançar para a próxima aula");
            } else if (result == "ERRO2") {
                alert("Curso finalizado");
            } 
            else {     
                window.location.assign(BASE+"aula/assistir/"+result);

            }
        }
    });
}

function Voltar(id) {

    $.ajax({
        url: BASE+"Aula/aulaAnterior",
        type:'POST',
        data:{id:id},
        dataType:'json',
        success:function(json) {
            
            var result = json;

                if(result == "ERRO1") {
                    alert("Ocorreu um erro ao avançar para a próxima aula");
                } else if (result == "ERRO2") {
                    alert("Curso finalizado");
                } 
                else {     
                    window.location.assign(BASE+"aula/assistir/"+result);

                }
        }
    });

}