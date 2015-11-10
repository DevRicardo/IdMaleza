/**
 * Created by GrupoItem on 09/11/2015.
 */
var Medida = function(){

    this.crear = function(id){


        var inputFileImage = $("#imagen_"+id);
        var file = inputFileImage[0].files[0];
        var data = new FormData();

        data.append('imagen',file);

        var semana = $("#semana_id_"+id).val();
        var activo = $("#activo_"+id).val();
        var observacion = $("#observacion_"+id).val();
        data.append("semana_id",semana);
        data.append("activo",activo);
        data.append("observacion",observacion);

        var controlador = "/medida";
        var url = controlador;
        var tipo = "POST";
        var resultado = consulta.consultaFile(data, url, tipo);

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
}