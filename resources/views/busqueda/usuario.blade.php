@extends("templates.admin")

@section("section")

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">


            <!-- Simple Textfield -->
            {!! Form::open(array('url' => 'busqueda/all', 'method' => 'post',"enctype"=>"multipart/form-data")) !!}
            <h4 style="text-align:center;">Busqueda de Malezas</h4>
            <input type="hidden" name="tipo" id="tipo" value="admin">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-color--amber" style="width: 100%; min-height: 40px;">

                <div class="mdl-card__supporting-text">
                    Puede identificar por medio de una imagen el tipo de maleza,
                    si quiere obtener el mejor resultado siga estas indicaciones
                    <a href="#" style="color: #004d40;">Guía para optimizar busqueda</a>
                </div>


            </div>


            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                <input class="mdl-textfield__input" type="file" id="imagen" name="imagen" />

            </div>


            <div class="mdl-grid" style="text-align: center;">
                <div class="mdl-cell mdl-cell--12-col">
                    <button style="width: 180px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        BUSCAR
                    </button>
                </div>
                <div class="mdl-cell mdl-cell--2-col">

                </div>
            </div>

            {!! Form::close() !!}


        </div>

    </div>







@endsection


{!! Html::script('js/clases/Medida.js') !!}
@section("script")


@endsection