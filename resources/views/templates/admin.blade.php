<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.:IdMaleza:.</title>

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

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!! Html::style('css/jquery-confirm.css') !!}
    {!! Html::style('css/material.css') !!}
    {!! Html::style('css/admin/styles.css') !!}
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
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header">
        <div class="mdl-layout__header-row" style="background-color: #FFF;">
            <span class="mdl-layout-title">{!! Html::image('img/sistema/logo.png','Imagen no encontrada',array("width"=>"100"))!!}</span>
            <div class="mdl-layout-spacer"></div>

            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">Contacto</li>
                <li class="mdl-menu__item">Ayuda</li>
                <li class="mdl-menu__item">Información legal</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer">
        <header class="demo-drawer-header">

            <div class="demo-avatar-dropdown mdl-color--white mdl-shadow--2dp mdl-card" style="padding:2px; min-height: 20px;">
                <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person</i>
            <span class="mdl-color-text--blue-black-400  mdl-navigation__link"  >

            {!! Session::get("full_nombre") !!}
            </span>

                <div class="mdl-layout-spacer"></div>


            </div>
        </header>
        <nav class="demo-navigation mdl-navigation ">
            <a style="display: none;" id="cultivo" class="mdl-navigation__link" href="/cultivo?h=0"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">reorder</i>Cultivo actual</a>
            <a class="mdl-navigation__link" href="/cultivo/create"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add</i>Nuevo Cultivo</a>
            <a class="mdl-navigation__link" href="/cultivo?h=1"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Historico</a>
            <a class="mdl-navigation__link" href="/busqueda?tipo=admin"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">search</i>Busqueda rapida</a>

            <a class="mdl-navigation__link" href="/logout"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">power</i>Salir</a>

            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">



        @yield("section")



        </div>




    </main>
</div>


{!! Html::script('js/lib/jquery.min.js') !!}
{!! Html::script('js/material.js') !!}
{!! Html::script('js/jquery-confirm.js') !!}
{!! Html::script('js/lib/pretty.js') !!}

{!! Html::script('js/Mensajes.js') !!}
{!! Html::script('js/Consulta.js') !!}


<script type="text/javascript">
    mensaje = new Mensajes();
    consulta = new Consulta();


    //mensaje.alerta("Alerta","No es un gran error");
    @yield('script')
</script>
</body>
</html>
