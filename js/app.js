var ajaxPeliculas = function(accion,url,formulario){
    
    var datos = $('#'+formulario).serializeArray();
    datos.push({name:'accion',value:accion});
    
    $.ajax({
        url:url,
        data:datos,
        type:"POST",
        datatype:"JSON",
        success:function(response){
            
            if(response.pasteles !== null){
                $.each(response.pasteles, function(index,pastel){
                    $('#tablaPeliculas tbody').append(
                        "<tr><td>"+pastel.idp+"</td>"+
                        "<td>"+pastel.tipo+"</td>"+
                        "<td>"+pastel.direccion+"</td>"+
                        "<td>"+pastel.telefono+"</td>"+
                        "<td>"+pastel.cantidad+"</td>"+
                        "<td>"+pastel.correo+"</td>"+
                        "<td>"+pastel.fecha+"</td>"+
                        "</tr>"
                    );
                });
            }
        }
    });
} 
                   
                   
                   
                   
                   