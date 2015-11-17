@if(Session::has("mensaje"))
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-color--{!! Session::get("mensaje.color") !!}" style=" font-weight: bold; color:#FFF;width: 100%; min-height: 40px; line-height: 40px; text-align: center;">
        {!! Session::get("mensaje.contenido") !!}
    </div>
@endif