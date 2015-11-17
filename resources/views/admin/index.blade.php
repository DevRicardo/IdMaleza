@extends("templates.administrador")



@section("section")

    <style>
        #paginado{
          width: 100%;
          text-align: center;
        }

        ul li{
           display: inline;
            margin: 7px;
        }
    </style>


    <h3>Listado de malezas</h3>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="text-align: right;">
            <a href="/admin/nueva" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                Nueva malezas
            </a>
        </div>

    </div>
    @include("partial.mensaje")
    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%;">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Nombre común</th>
            <th>Nombre científico</th>
            <th>Familia</th>
            <th>Detalle</th>
            <th>Opciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($malezas AS $maleza)
        <tr>
            <td class="mdl-data-table__cell--non-numeric">{!! $maleza->nombre_comun !!}</td>
            <td>{!! $maleza->nombre_cientifico !!}</td>
            <td>{!! $maleza->familia !!}</td>
            <td>{!! $maleza->detalle !!}</td>
            <td>
                <div style="cursor: pointer;" onclick="redireccionar('admin/fotos/{!! $maleza->id !!}')" id="op_{!! $maleza->id !!}_uno" class="icon material-icons">wallpaper</div>
                <div class="mdl-tooltip" for="op_{!! $maleza->id !!}_uno">
                    Imagenes
                </div>

                <div style="cursor: pointer;"  onclick="redireccionar('admin/activos/{!! $maleza->id !!}')" id="op_{!! $maleza->id !!}_dos" class="icon material-icons">format_color_fill</div>
                <div class="mdl-tooltip" for="op_{!! $maleza->id !!}_dos">
                    Activos
                </div>

                <div style="cursor: pointer;"  onclick="redireccionar('admin/editar/{!! $maleza->id !!}')" id="op_{!! $maleza->id !!}_tres" class="icon material-icons">create</div>
                <div class="mdl-tooltip" for="op_{!! $maleza->id !!}_tres">
                    Editar
                </div>

                <div style="cursor: pointer;"  onclick="enviarForm('admin/destroy/{!! $maleza->id !!}')" id="op_{!! $maleza->id !!}_cuatro" class="icon material-icons">delete</div>
                <div class="mdl-tooltip" for="op_{!! $maleza->id !!}_cuatro">
                    Eliminar
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
<div id="paginado">
    {!! $malezas->render() !!}

</div>





@endsection

@section("script")

    function redireccionar(url){
        window.location=url;
    }


    function enviarForm(url){
       var confirmar = confirm("Esta seguro de eliminar la maleza");

       if(confirmar){
           redireccionar(url);
       }


    }
@endsection



