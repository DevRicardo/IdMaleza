@extends("templates.base")


@section("section")




    <!-- Simple Textfield -->
    {!! Form::open(array('url' => 'busqueda/all', 'method' => 'post',"enctype"=>"multipart/form-data")) !!}
    <h4 style="text-align:center;">Busqueda de Malezas</h4>

    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-color--amber" style="width: 100%; min-height: 40px;">

        <div class="mdl-card__supporting-text">
            Puede identificar por medio de una imagen el tipo de maleza,
            si quiere obtener el mejor resultado siga estas indicaciones
            <a href="/busqueda/guiaInvitado" style="color: #004d40;">Guía para optimizar busqueda</a>
        </div>


    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="file" id="imagen" name="imagen" />

    </div>


    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                BUSCAR
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
