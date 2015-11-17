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


    <h3>Listado de actvos disponibles</h3>


    @include("partial.mensaje")

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="text-align: right;">
            <a href="/admin" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                listado de malezas
            </a>
        </div>

    </div>

    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%;">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Nombre</th>
            <th>Detalle</th>

            <th>Opciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($disponibles AS $valor)
            <tr>
                <td class="mdl-data-table__cell--non-numeric">{!! $valor->nombre_activo !!}</td>
                <td>{!! $valor->detalle_activo !!}</td>

                <td>
                    <div style="cursor: pointer;" onclick="redireccionar('/admin/asociar/{!! $valor->id !!}/{!! Session::get('id_maleza') !!}')" id="op_{!! $valor->id !!}_uno" class="icon material-icons">done</div>
                    <div class="mdl-tooltip" for="op_{!! $valor->id !!}_uno">
                        Asociar
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="paginado">
        {!! $disponibles->render() !!}

    </div>



    <h3>Listado de actvos asociados a la maleza</h3>

    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%;">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Nombre</th>
            <th>Detalle</th>

            <th>Opciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($asociado AS $valor)
            <tr>
                <td class="mdl-data-table__cell--non-numeric">{!! $valor->nombre_activo !!}</td>
                <td>{!! $valor->detalle_activo !!}</td>

                <td>
                    <div style="cursor: pointer;" onclick="redireccionar('admin/fotos/{!! $valor->id !!}')" id="op_{!! $valor->id !!}_uno" class="icon material-icons">done</div>
                    <div class="mdl-tooltip" for="op_{!! $valor->id !!}_uno">
                        Asociar
                    </div>

                    <div style="cursor: pointer;" onclick="redireccionar('/admin/desasociar/{!! $valor->id !!}/{!! Session::get('id_maleza') !!}')" id="op_{!! $valor->id !!}_uno" class="icon material-icons">close</div>
                    <div class="mdl-tooltip" for="op_{!! $valor->id !!}_uno">
                        Desasociar
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="paginado">
        {!! $asociado->render() !!}

    </div>





@endsection

@section("script")

    function redireccionar(url){
    window.location=url;
    }
@endsection



