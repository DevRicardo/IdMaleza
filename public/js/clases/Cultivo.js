/**
 * Created by GrupoItem on 28/10/2015.
 */
var Cultivo = function(){


    this.crear = function(){
        var data = $("#form_cultivo").serialize();
        var controlador = "/cultivo";
        var url = controlador;
        var tipo = "POST";
        var resultado = consulta.consulta(data, url, tipo);

        resultado.done(function(msj){
           var array = eval(msj);
            var contenido = "";
            var titulo = "";

            if(array[0].error != "null"){
                contenido = mensaje.contenidoResultado(array[0].error,"error");
                titulo = "Error de formulario";

            }else{
                contenido = mensaje.contenidoResultado(array[0].datos,"correcto");
                titulo = "Correcto";
            }
            mensaje.alerta(titulo,contenido);



        });
    }

    ///cultivo/nuevamaleza/{maleza}/{cultivo}

    this.maleza = function(maleza,cultivo){
        var data = "";
        var controlador = "/cultivo/nuevamaleza/"+maleza+"/"+cultivo;
        var url = controlador;
        var tipo = "GET";
        var resultado = consulta.consulta(data, url, tipo);

        resultado.done(function(msj){

            location.reload();


        });
    }


    this.activosXmaleza = function(nombremaleza){
        var data = "";
        var controlador = "/activo/activosmaleza/"+nombremaleza;
        var url = controlador;
        var tipo = "GET";
        var resultado = consulta.consulta(data, url, tipo);

        resultado.done(function(msj){
             var data = eval(msj);

             var contenido = '<option value="">Seleccionar maleza predominante</option>';
            for(var i = 0; i < data.length; i++){
                var activo = data[i];
                contenido += '<option value="'+activo.nombre_activo+'">'+activo.nombre_activo+'</option>';
            }


            $("#activo").html(contenido);


        });
    }

}