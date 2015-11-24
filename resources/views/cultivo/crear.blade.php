@extends("templates.admin")

@section("section")

    <div class="demo-cards mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid mdl-grid--no-spacing">
        <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop" style="padding: 5px;">


    <!-- Simple Textfield -->
    <form action="#" id="form_cultivo">
        <h4 style="text-align:center;">NUEVO CULTIVO</h4>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="tipo" name="tipo">
                <option value="">Seleccione el tipo de cultivo</option>
                <option value="Maíz">Maíz</option>
                <option value="Algodón">Algodón</option>
                <option value="Arroz">Arroz</option>
            </select>

        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="text" id="ubicacion"  name="ubicacion"/>
            <label class="mdl-textfield__label" for="ubicacion">Ubicación</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="number" id="tamano" name="tamano" />
            <label class="mdl-textfield__label" for="tamano">Tamaño en ectareas</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="origen" name="origen">
                <option value="">Seleccione el origen de la semilla</option>

                <option value="SYNGENTA SEEDS S.A.">SYNGENTA SEEDS S.A.</option>
                <option value="AGRICOLA DE LA RIVA">AGRICOLA DE LA RIVA</option>
                <option value="AGROQUÍMICOS EL SEMBRADOR">AGROQUÍMICOS EL SEMBRADOR</option>
                <option value="COMERCIALIZADORA AGROFER">COMERCIALIZADORA AGROFER</option>
                <option value="ACOSEMILLAS">ACOSEMILLAS</option>
                <option value="IMPULSEMILLAS">IMPULSEMILLAS</option>
                <option value="ABONOS Y SEMILLAS DEL MAIZ S.A.">ABONOS Y SEMILLAS DEL MAIZ S.A.</option>

            </select>

        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="suelo" name="suelo">
                <option value="">Seleccione el tipo de suelo</option>
                <option value="Arenoso">Arenoso</option>
                <option value="Arcilloso">Arcilloso</option>
                <option value="Limoso">Limoso</option>
            </select>

        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="anterior" name="anterior">
                <option value="">Seleccione el cultivo anterior</option>
                <option value="Maíz">Maíz</option>
                <option value="Algodón">Algodón</option>
                <option value="Arroz">Arroz</option>
            </select>

        </div>



        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="maleza" name="maleza" onchange="cultivo.activosXmaleza(this.value)">
                <option value="">Seleccione Maleza predominante</option>
                @foreach($malezas AS $maleza)
                <option value="{!! $maleza->nombre_comun !!}">{!! $maleza->nombre_comun !!}</option>
                @endforeach
            </select>

        </div>


        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="activo" name="activo">


            </select>

        </div>


        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-col">
                <a href="#" onclick="cultivo.crear()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    REGISTRAR
                </a>
            </div>
            <div class="mdl-cell mdl-cell--2-col">

            </div>
        </div>

    </form>


            </div>
        </div>
@endsection

{!! Html::script('js/clases/Cultivo.js') !!}
@section("script")

    cultivo = new Cultivo();
    $("#cultivo").css("dispaly","block");






@endsection