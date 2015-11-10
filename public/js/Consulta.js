/**
 * Created by GrupoItem on 25/10/2015.
 */
var Consulta = function(){

    var resultado = null;

    this.consulta = function(data, url, tipo){
          var request = $.ajax({
                url: url,
                type: tipo,
                data: data


              });

          return  request;
    }



    this.consultaFile = function(data, url, tipo){
        var request = $.ajax({
            url: url,
            type: tipo,
            data: data,
            contentType:false,
            processData:false,
            cache:false


        });

        return  request;
    }

}