@extends("templates.admin")

@section("section")


            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col">

                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <input type="hidden" id="numero_semanas" value="{!! $semana[0] !!}">
                            <h2 class="mdl-card__title-text">INFORMACION GENERAL</h2>
                        </div>
                        <div class="mdl-card__supporting-text">


                            <ul>
                                <li><strong>Inicio del cultivo:</strong> {!! $cultivo->fecha_inicio !!}</li>
                                <li><strong>Semana Actual:</strong> {!! $semana[0] !!}</li>


                            </ul>


                            <ul >
                                <li><strong> Tipo de cultivo:</strong> {!! $cultivo->tipo !!}</li>
                                <li><strong>Ubicación:</strong> {!! $cultivo->ubicacion !!}</li>
                                <li><strong>Tamaño:</strong> {!! $cultivo->tamano !!} Hectárea</li>
                                <li><strong>Tipo de suelo:</strong> {!! $cultivo->suelo !!} </li>
                                <li><strong>Origen de semilla:</strong> {!! $cultivo->origen !!} </li>
                                <li><strong>Cultivo anterior:</strong> {!! $cultivo->anterior !!} </li>

                            </ul>


                            <ul >
                                <li><strong> Maleza predominante:</strong> {!! $cultivo->maleza !!}</li>
                                <li><strong>Activo:</strong> {!! $cultivo->activo !!}</li>
                                <li><strong>Aplicado:</strong> {!! $cultivo->fecha_activo !!}</li>

                            </ul>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">

                            @if($cultivo->fecha_activo == "NO" )

                            <a href="/cultivo/aplicar/{!! $cultivo->id !!}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                APLICAR ACTIVO
                            </a>
                            @endif


                            @if($cultivo->fecha_inicio == "" || $cultivo->estado_cultivo == 0 )
                            <a href="/cultivo/iniciar/{!! $cultivo->id !!}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                INICIAR
                            </a>
                            @endif

                            @if($cultivo->fecha_inicio != "" && $cultivo->estado_cultivo == 1 )
                            <a href="/cultivo/terminar/{!! $cultivo->id !!}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                TERMINAR
                            </a>
                            @endif



                        </div>
                        <div class="mdl-card__menu">

                        </div>
                    </div>
                </div>




                <div class="mdl-cell mdl-cell--4-col">

                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">MALEZAS</h2>
                        </div>
                        <div class="mdl-card__supporting-text">


                            <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                                <thead>
                                <tr>
                                    <th>Maleza</th>
                                    <th>Registro</th>
                                    <th>Opción</th>

                                </tr>
                                </thead>
                                <tbody>

                                @if(!empty($semana[2]))

                                    @foreach($semana[2]  AS $index => $valor)
                                        <?php $fecha_array = explode(' ',$valor->created_at) ?>
                                        <tr id="{!! $index !!}_maleza" >
                                            <td>{!! $valor->nombre_comun !!}</td>
                                            <td>{!! $fecha_array[0] !!}</td>
                                            <td><a style="color: #00796b; text-decoration: none;" href="/medida?cultivo={!! $cultivo->id !!}&maleza={!! $valor->id !!}">Ver</a> </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>

                        <div style="display: none; padding: 10px;background-color: rgb(76, 175, 80); color: #fff;" id="n_maleza">
                            <h5 style="text-align: center;"> Nueva Maleza</h5>

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <select class="mdl-textfield__input" id="maleza" name="maleza" onchange="cultivo.maleza(this.value,'{!! $cultivo->id !!}')">
                                    <option style="color: #000;" value="">Seleccione Maleza</option>
                                    <option style="color: #000;" value="1">Coquito</option>

                                </select>

                            </div>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href="#" onclick="$('#n_maleza').css('display','block')" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                AGREGAR NUEVA MALEZA
                            </a>
                        </div>
                        <div class="mdl-card__menu">

                            <button id="demo-menu-lower-left"
                                    class="mdl-button mdl-js-button mdl-button--icon">
                                <i class="material-icons">more_vert</i>
                            </button>

                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                for="demo-menu-lower-left">
                                <li class="mdl-menu__item">Mostrar informe detallado</li>

                            </ul>

                        </div>
                    </div>
                </div>







                <div class="mdl-cell mdl-cell--4-col">

                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">SEMANAS</h2>
                        </div>
                        <div class="mdl-card__supporting-text">

                            <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                                <thead>
                                <tr>
                                    <th>Semana</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(!empty($semana[1]))

                                @foreach($semana[1] AS $index =>$lista)
                                <tr id="{!! $index !!}" >
                                    <td>{!! $index !!}</td>
                                    <td>{!! $lista['inicio'] !!}</td>
                                    <td>{!! $lista['fin'] !!}</td>
                                </tr>
                                @endforeach
                                @endif

                                </tbody>
                            </table>


                        </div>

                        <div class="mdl-card__menu">

                        </div>
                    </div>
                </div>





            </div>






@endsection

{!! Html::script('js/clases/Cultivo.js') !!}
@section("script")

    cultivo = new Cultivo();
    $("#cultivo").css("dispaly","block");
    var n_semanas = $("#numero_semanas").val();

    for(var i = 1; i < n_semanas ;i++){
         $("#"+i).addClass("is-selected");
    }






@endsection