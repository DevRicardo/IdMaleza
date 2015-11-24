@extends("templates.base")


@section("section")




    <!-- Simple Textfield -->

    <h4 style="text-align:center;">Resultado</h4>

    <div class="mdl-grid">


    @foreach($parametros['porcentajes'] AS $index => $valor)

        <div class="mdl-cell mdl-cell--6-col">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%;">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{!! $parametros['nombres'][$index]['comun'] ." ".ceil($parametros['porcentajes'][$index])."%"!!} </h2>


        </div>
        <div class="mdl-card__supporting-text" style="text-align: center;">
            {!! Html::image($parametros['imagenes'][$index][0],'Imagen no encontrada',array("width"=>"100"))!!}
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a href="/busqueda/detalle/{!! $index !!}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                VER MÁS INFORMACIÓN
            </a>
        </div>

    </div>

        </div>

   @endforeach

    </div>

<hr>



            <a href="/busqueda?tipo=invitado" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                REGRESAR
            </button>
        </a>





@endsection



@section('script')

@endsection
