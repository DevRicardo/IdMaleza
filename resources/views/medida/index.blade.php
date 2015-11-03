@extends("templates.admin")

@section("section")

<?php $contador =1; ?>
@foreach($parametros["semanas"] AS $semana)
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">

            <div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" min-height: 100px; min-width: 100px; ">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Semana #{!! $contador !!}</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-grid" >
                        <div id="formulario_{!! $contador !!}" style="display: none;" >
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <input class="mdl-textfield__input" type="file" id="tamano" name="tamano" />
                                
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <select class="mdl-textfield__input" id="activo" name="activo">

                                    <option value="">Seleccione el activo</option>

                                </select>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <textarea class="mdl-textfield__input"></textarea>
                                <label class="mdl-textfield__label" for="tamano">Observaciones</label>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a id="tomar_{!! $contador !!}" onclick="mostrarform({!! $contador !!})" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        TOMAR MEDIDA
                    </a>

                    <a id="guardar_{!! $contador !!}" style="display: none;" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        GUARDAR
                    </a>
                </div>

            </div>


        </div>

    </div>
    <?php $contador++; ?>
@endforeach



@endsection



@section("script")

    function mostrarform(id){

        $("#tomar_"+id).css("display","none");
        $("#guardar_"+id).css("display","block");
        $("#formulario_"+id).css("display","block");

    }

@endsection