@extends("templates.base")


@section("section")




    <!-- Simple Textfield -->
    {!! Form::open(array('url' => 'maleza/addfoto', 'method' => 'post', "enctype"=>"multipart/form-data")) !!}
    <h4 style="text-align:center;">Cargador de imagenes</h4>

    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-color--amber" style="width: 100%; min-height: 40px;">

        <div class="mdl-card__supporting-text">
            Cargue las imágenes para la comparación o para mostrar,
            esto lo puede definir
            seleccionando de la lista tipo del formulario
        </div>


    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <select class="mdl-textfield__input" id="maleza" name="maleza">
            <option value="">Seleccione la maleza</option>
            @foreach($parametros['malezas'] AS $maleza)
                <option value="{!! $maleza->id !!}">{!! $maleza->nombre_comun !!}</option>
            @endforeach
        </select>

    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <select class="mdl-textfield__input" id="tipo" name="tipo">
            <option value="">Seleccione el tipo de imagen</option>
            <option value="COMPARABLES">COMPARABLES</option>
            <option value="PARA MOSTRAR">PARA MOSTRAR</option>
        </select>

    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen1" name="imagen1" />

    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen2" name="imagen2" />

    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen3" name="imagen3" />

    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen4" name="imagen4" />

    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen5" name="imagen5" />

    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen6" name="imagen6" />

    </div>


    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                AGREGAR
            </button>
        </div>
        <div class="mdl-cell mdl-cell--2-col">
            <a href="/" class="mdl-button mdl-js-button mdl-button--primary">
                REGRESAR
            </a>
        </div>
    </div>

    {!! Form::close() !!}


@endsection



@section('script')

@endsection
