@extends('templates.base')

@section('section')

<script type="text/javascript">



</script>

    <!-- Simple Textfield -->
    <form action="#" id="form_registro">
        <h4 style="text-align:center;">Registro de nuevo usuario</h4>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="text" id="full_nombre"  name="full_nombre"/>
            <label class="mdl-textfield__label" for="full_nombre">Nombre Completo</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="email" id="email" name="email" />
            <label class="mdl-textfield__label" for="email">Email</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="pais" name="pais">
                <option value="Colombia">Colombia</option>
            </select>
            <label class="mdl-textfield__label" for="pais">Pais</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="departamento" name="departamento">
                <option value="Córdoba">Córdoba</option>
            </select>
            <label class="mdl-textfield__label" for="departamento">Departamento</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <select class="mdl-textfield__input" id="ciudad" name="ciudad">
                <option value="Montería">Montería</option>
            </select>
            <label class="mdl-textfield__label" for="ciudad">Ciudad</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="password" id="clave" name="clave" />
            <label class="mdl-textfield__label" for="clave">Clave</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
            <input class="mdl-textfield__input" type="password" id="conf_clave" name="conf_clave" />
            <label class="mdl-textfield__label" for="conf_clave">Confirmar clave</label>
        </div>


        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-col">
                <a href="#" onclick="login.GuardarUsuario()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    REGISTRAR
                </a>
            </div>
            <div class="mdl-cell mdl-cell--2-col">

            </div>
        </div>

    </form>


@endsection



@section('script')



@endsection
