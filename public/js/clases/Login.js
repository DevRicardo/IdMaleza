/**
 * Created by GrupoItem on 26/10/2015.
 */

var Login = function(){

    var ruta = "";

    this.GuardarUsuario = function(){
        var data = $("#form_registro").serialize();
        var controlador = "/login/store";
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

            $(location).attr('href',"/");


        });
    }
}