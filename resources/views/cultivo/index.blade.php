@extends("templates.admin")

@section("section")

    @if(count($cultivos) > 0)

    @foreach($cultivos AS $cultivo)
    <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
        <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-card__title mdl-card--expand mdl-color--light-green-300">



                <ul style="list-style:none; padding:0px; margin:0px;">
                    <li><h5 class="mdl-card__title-text" style="font-weight:bold; font-size:17px;">INICIÓ:{!! $cultivo->fecha_inicio !!}</h5></li>
                    <li><span>SEMANA: {!! $semana !!}</span></li>
                </ul>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">

                <ul style="margin:0px 0px 0px 10px; ">
                    <li><strong> Maleza predominante:</strong> {!! $cultivo->maleza !!}</li>
                    <li><strong>Activo aplicado:</strong> {!! $cultivo->activo !!}</li>

                </ul>

            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="/cultivo/{!! $cultivo->id !!}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Detallado</a>

            </div>

        </div>

    </div>
    @endforeach



    @else
        <div class="mdl-grid" style="margin-top: 30px;">
            <div class="mdl-cell mdl-cell--8-col" ><h2>BIENVENIDO A</h2> </div>
            <div class="mdl-cell mdl-cell--4-col">{!! Html::image('img/sistema/logo.png','Imagen no encontrada',array("style"=>"max-width: 300px"))!!}</div>

        </div>



    @endif

@endsection


@section("script")


@endsection