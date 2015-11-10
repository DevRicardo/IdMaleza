@extends("templates.admin")

@section("section")

<?php $contador =1; ?>



@foreach($parametros["semanas"] AS $semana)

    <?php

    $medidas = \App\Medida::where("semana_id",$semana->id)->get();
    $visible = "display: none;";
    $solo_lectura = "";
    $imagen = "";
    $activo = "";
    $observacion = "";
    $disabled = "";

    $cantidad = count($medidas);
    if($cantidad > 0){
        $visible = "display: block;";
        $imagen = $medidas[0]->foto_muestra;
        $activo = $medidas[0]->activo_aplicado;
        $observacion = $medidas[0]->comentario;
        $solo_lectura = "readonly";
        $disabled = "disabled='disabled'";
    }


    ?>

    <div class="mdl-grid">
        {!! Form::open(array('url' => 'medida', "name"=>"form_".$semana->id, "id"=>"form_".$semana->id, 'method' => 'POST',"enctype"=>"multipart/form-data")) !!}
        <div class="mdl-cell mdl-cell--12-col">

            <div class="demo-card-wide mdl-card mdl-shadow--2dp" style=" min-height: 100px; min-width: 100px; ">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Semana #{!! $contador !!}</h2>
                    <input type="hidden" value="{!! $semana->id !!}" name="semana_id_{!! $semana->id !!}" id="semana_id_{!! $semana->id !!}">
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-grid" >
                        <div id="formulario_{!! $contador !!}" style="{!! $visible !!} width: 100%;" >
                        <div class="mdl-cell mdl-cell--12-col">
                        @if($imagen != "")
                        <div style="text-align: center; width: 100%;"  >
                            {!! Html::image($imagen,'Imagen no encontrada',array("width"=>"100"))!!}
                        </div>
                        @else

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <input class="mdl-textfield__input" {!! $solo_lectura !!} type="file" id="imagen_{!! $semana->id !!}" name="imagen_{!! $semana->id !!}" />
                                
                            </div>

                        @endif
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">

                                @if($activo == "")
                                <select class="mdl-textfield__input"  id="activo_{!! $semana->id !!}" name="activo_{!! $semana->id !!}">

                                    <option value="">Seleccione el activo</option>
                                    @foreach($parametros['activos'] AS $activo)
                                        <option value="{!! $activo->nombre_activo !!}">{!! $activo->nombre_activo !!}</option>
                                    @endforeach

                                </select>
                                @else

                                 <input type="text" class="mdl-textfield__input " {!! $solo_lectura !!} value="{!! $activo !!}">

                                @endif

                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <textarea class="mdl-textfield__input" {!! $solo_lectura !!} name="observacion_{!! $semana->id !!}" id="observacion_{!! $semana->id !!}">{!! $observacion !!}</textarea>
                                <label class="mdl-textfield__label" for="tamano">Observaciones</label>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a id="tomar_{!! $contador !!}" {!! $disabled !!} onclick="mostrarform({!! $contador !!})" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        TOMAR MEDIDA
                    </a>

                    <button type="button" {!! $disabled !!} onclick=" medida.crear({!! $semana->id !!});" id="guardar_{!! $contador !!}" style="display: none;" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        GUARDAR
                    </button>
                </div>

            </div>


        </div>

        {!! Form::close() !!}

    </div>
    <?php $contador++; ?>
@endforeach



@endsection


{!! Html::script('js/clases/Medida.js') !!}
@section("script")
    var medida = new Medida();
    function mostrarform(id){

        $("#tomar_"+id).css("display","none");
        $("#guardar_"+id).css("display","block");
        $("#formulario_"+id).css("display","block");

    }

@endsection