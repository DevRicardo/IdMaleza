/**
 * Created by GrupoItem on 25/10/2015.
 */

var Mensajes = function(){


    /*
    *
    *
    * */
    this.alerta = function(titulo, mensaje, funcion, parametros){

       var obj =  $.alert({
            title: titulo,
            content: mensaje,
            confirmButtonClass: 'mdl-button mdl-js-button mdl-button--raised mdl-button--colored',
            confirmButton: 'Entendido'
        });

        setTimeout(function(){
            obj.close();
            if(typeof (funcion) != "undefined"){
                funcion(parametros);
            }
        },4000);


    }

    /*
     *
     *
     * */
    this.suceso = function(){

    }

    /*
     *
     *
     * */
    this.confirmacion = function(){



    }
    /*
     * parametros:
     * array array que tiene los mensajes generados por la operacion
     * tipo es el tipo de mensaje (error, correcto)
     * */
    this.contenidoResultado = function(array,tipo){
         var color = "#000";
         if(tipo == "error"){
             color = "red";
         }
         if(tipo == "correcto"){
             color = "green";
         }
         var mensaje = "<ul style='color:"+color+";'>";
         for(var i = 0; i < array.length; i++){
             mensaje += "<li>"+array[i]+"</li>";
         }
        mensaje += "</ul>";

        return mensaje;
    }



}