@extends('templates.base')

@section('section')



    <!-- Simple Textfield -->
    {!! Form::open(array('url' => 'login/autenticar', 'method' => 'post')) !!}
    @include("partial.mensaje")
        <h4 style="text-align:center;">Bienvenido</h4>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="text" id="email" name="email"  required="required"/>
            <label class="mdl-textfield__label" for="sample1">Email</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="password" id="clave" name="clave"  required="required" />
            <label class="mdl-textfield__label" for="sample1">Clave</label>
        </div>

        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-col">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    ACCEDER
                </button>
            </div>
            <div class="mdl-cell mdl-cell--2-col">
                <a href="/login/create" class="mdl-button mdl-js-button mdl-button--primary">
                    REGISTRATE
                </a>
            </div>
        </div>

    {!! Form::close() !!}


@endsection



@section('script')

@endsection

