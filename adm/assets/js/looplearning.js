function exibirModulos(obj) {
        let item = obj.value;
    
        $.ajax({
            url:BASE+"aula/exibir_modulos",
            type:'POST',
            data:{id_curso:item},
            dataType:'json',
            success:function(json) {
                let html = '';
    
                for(let i in json) {
                    html += '<option value="'+json[i].id+'">'+json[i].nome+'</option>';
                }
    
                $("#id_modulo").html(html);
            }
        });
    }
