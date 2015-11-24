@extends("templates.base")


@section("section")




    <!-- Simple Textfield -->

    <h4 style="text-align:center;">Detalles</h4>

    <div class="mdl-grid">

        <ul>
            <li><strong>Nombre cientifico:</strong>{!! $parametros["maleza"]->nombre_cientifico !!}</li>
            <li><strong>Nombre comun:</strong>{!! $parametros["maleza"]->nombre_comun !!}</li>
            <li><strong>Familia:</strong>{!! $parametros["maleza"]->familia !!}</li>
            <li><strong>Descripción:</strong>{!! $parametros["maleza"]->detalle !!}</li>

            <li><strong>Activos aplicables</strong>
            <ul>
            @foreach($parametros["activos"] AS $activo)

                <li>{!! $activo->nombre_activo !!}</li>

            @endforeach
                </ul>
            </li>

        </ul>


        @foreach($parametros['maleza']->fotos()->get() AS $valor)

            <div class="mdl-cell mdl-cell--12-col">
                <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%;">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text"></h2>


                    </div>
                    <div class="mdl-card__supporting-text" style="text-align: center;">
                        {!! Html::image($valor->ruta,'Imagen no encontrada',array("width"=>"100"))!!}
                    </div>

                </div>

            </div>

        @endforeach

    </div>

    <hr>









@endsection



@section('script')

@endsection
