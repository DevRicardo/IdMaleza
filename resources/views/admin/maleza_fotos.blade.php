@extends("templates.administrador")



@section("section")
    <!-- Wide card with share menu button -->
    <style>
        .demo-card-wide.mdl-card {
            width: 200px;
        }

        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="text-align: right;">
            <a href="/admin" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                listado de malezas
            </a>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="text-align: right;">
            <a href="/maleza/imagen?id={!! Session::get('id_maleza') !!}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                Nueva foto
            </a>
        </div>

    </div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            @include("partial.mensaje")

            <h3 style="padding: 0px; margin: 0px;">Fotos de {!! $nombre !!}</h3>
        </div>
    </div>
    <div class="mdl-grid">

            @foreach($fotos AS $foto)
            <div class="mdl-cell mdl-cell--3-col">
                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__supporting-text">


                        {!! Html::image($foto->ruta,'Imagen no encontrada',array("width"=>"150"))!!}


                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="/foto/eliminar/{!! $foto->id !!}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Eliminar
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

    </div>





@endsection




@section("script")

@endsection