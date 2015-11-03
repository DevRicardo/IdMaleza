@extends("templates.admin")

@section("section")


    <div class="mdl-grid">

        <div class="mdl-cell mdl-cell--12-col">

            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                    <h2 class="mdl-card__title-text">ADVERTENCIA</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Existe un cultivo que se encuentra activo, por favor termínelo para poder crear uno nuevo
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="/cultivo" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        RREGRESAR A CULTIVO
                    </a>
                </div>

            </div>


        </div>

    </div>


@endsection



@section("script")

@endsection