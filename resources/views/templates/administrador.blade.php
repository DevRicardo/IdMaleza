<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.:WEEDS:.</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    {!! Html::style('css/jquery-confirm.css') !!}
    {!! Html::style('css/material.css') !!}
    {!! Html::style('css/login/styles.css') !!}
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
<div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
    <header class="demo-header mdl-layout__header" style="background-color: #ffffff;">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">{!! Html::image('img/sistema/logo.png','Imagen no encontrada',array("width"=>"100"))!!}</span>
            <div class="mdl-layout-spacer"></div>

            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">Malezas</li>
                <li class="mdl-menu__item">Activos</li>
                <li class="mdl-menu__item"><a href="/logout">Salir</a></li>
            </ul>
        </div>
    </header>
    <div class="demo-ribbon"></div>
    <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
            <div class="mdl-cell mdl-cell--1-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
            <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--10-col" style="padding-top: 20px;">
                <div class="demo-crumbs mdl-color-text--grey-500">

                </div>


                @yield('section')




            </div>
        </div>
        <footer class="demo-footer mdl-mini-footer">
            <div class="mdl-mini-footer--left-section">
                <ul class="mdl-mini-footer--link-list">
                    <li>Universidad de Cordoba</li>

                </ul>
            </div>
        </footer>
    </main>
</div>


{!! Html::script('js/lib/jquery.min.js') !!}
{!! Html::script('js/material.js') !!}
{!! Html::script('js/jquery-confirm.js') !!}
{!! Html::script('js/lib/pretty.js') !!}

{!! Html::script('js/Mensajes.js') !!}
{!! Html::script('js/Consulta.js') !!}
{!! Html::script('js/clases/Login.js') !!}

<script type="text/javascript">
    mensaje = new Mensajes();
    consulta = new Consulta();
    login = new Login();

    //mensaje.alerta("Alerta","No es un gran error");
    @yield('script')
</script>


</body>
