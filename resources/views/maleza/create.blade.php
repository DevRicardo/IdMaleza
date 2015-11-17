@extends("templates.administrador")


@section("section")




    <!-- Simple Textfield -->
    {!! Form::open(array('url' => 'maleza/store', 'method' => 'post', "enctype"=>"multipart/form-data")) !!}
    <h4 style="text-align:center;" xmlns="http://www.w3.org/1999/html">Nueva maleza</h4>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="text-align: right;">
            <a href="/admin" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                Lista de malezas
            </a>
        </div>

    </div>

    @include("partial.mensaje")

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="text" id="nombre_comun" name="nombre_comun" required="required"/>
        <label class="mdl-textfield__label" for="tamano">Nombre común</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="text" id="nombre_cientifico" name="nombre_cientifico" required="required"/>
        <label class="mdl-textfield__label" for="tamano">Nombre cientifico</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <input class="mdl-textfield__input" type="text" id="familia" name="familia"  required="required"/>
        <label class="mdl-textfield__label" for="tamano">Familia</label>
    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
        <textarea class="mdl-textfield__input"  id="detalle" name="detalle"  required="required"/></textarea>
        <label class="mdl-textfield__label" for="detalle">Detalle</label>
    </div>



    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                AGREGAR
            </button>
        </div>
        <div class="mdl-cell mdl-cell--2-col">
            <a href="/admin" class="mdl-button mdl-js-button mdl-button--primary">
                REGRESAR
            </a>
        </div>
    </div>

    {!! Form::close() !!}


@endsection



@section('script')

@endsection
