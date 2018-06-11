<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="NoIndex, NoFollow">
    <title>MPOC</title>
    <link rel="shortcut icon" href="/public/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?php echo URL_BASE_PUBLIC; ?>/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL_BASE_PUBLIC; ?>/css/style.css" rel="stylesheet" type="text/css">
    <!-- Mainly scripts -->
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/inspinia.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/pace/pace.min.js"></script>


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .centered{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        /* If the screen size is 601px wide or more, set the font-size of <div> to 80px */
        @media screen and (min-width: 601px) {
            h3 {
                font-size: 16px;
            }
        }

        /* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
        @media screen and (max-width: 600px) {
            h3 {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div class="">
        <div class="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url(URL_BASE.'/') }}">Inicio</a>
                    @else

                        <a href="{{ url(URL_BASE.'/login') }}">Iniciar sesión</a>
                        <a href="{{ url(URL_BASE.'/register') }}">Registrarse</a>
                    @endif
                </div>
            @endif
            <div class="">
                <div class="">
                    <img src="/public/img/logotipo_MPOC.png" class="img-responsive centered" alt="logo">
                    <h3 style="text-align: center">Sistema web de visualización de itinerarios - UNED</h3>
                    <hr class="my-4">
                    <p class="wp_paragraph" style="text-align:center;color:black;"><b>¿Sirve Wikipedia para algo más que
                            mostrar información?</b></p>
                    <ul class="wp_paragraph" style="color:black;">
                        <li>Los recursos en abierto no son sólo una fuente de información de conceptos.</li>
                        <li>Los datos enlazados permiten relacionar, categorizar y descubrir información en los
                            textos.
                        </li>
                    </ul>
                    <p class="wp_paragraph" style="text-align:center;color:black;">
                        Este trabajo presenta la primera versión de un protitipo de generación de itinerarios que parte
                        con <b>581 itinerarios obtenidos automáticamente</b> a partir de <a
                                href="https://es.wikipedia.org" target="_blank">Wikipedia</a>, <a
                                href="https://www.wikidata.org" target="_blank">Wikidata</a> y el <a
                                href="https://www.museodelprado.es/" target="_blank">Museo del Prado</a>.
                        Estos itinerarios, a su vez, están formados por <b>4823 obras</b>, <b>1504 personajes</b>, <b>14166
                            referencias</b> y <b>25569 eventos</b>. De los eventos encontrados, 2799 están relacionados
                        con obras, 2090 con personajes y 221 con referencias.
                    </p>

                    <div class="well wp_paragraph" style="color:black;">
                        <p>Tarea a realizar para familiarizarse:</p>
                        <ol>
                            <li> Busque información sobre varios itinerarios. Por ejemplo:
                                <ul>
                                    <li>Busque y visualice el itinerario "Cuadros relacionados con el personaje Diego
                                        Velázquez".
                                    </li>
                                    <li>Busque y visualice el itinerario "Cuadros relacionados con Adoración de los
                                        Reyes Magos".
                                    </li>
                                </ul>
                            </li>
                            <li>Rellene la encuesta.</li>
                        </ol>

                        <p style="text-align: center">Para cualquier duda relacionada con el sistema, puede acceder al <b><a target="_blank" href="/public/uploads/ANEXO_I_Manual_de_usuario_IEEE_1063_2001.pdf">Manual de usuario</a></b></p>
                    </div>
                    <p>
                        <a class="btn btn-primary btn-lg btn-block" href="/itinerario" role="button" style=""><i class="fa fa-search"></i> Búsqueda de itinerarios</a>
                    </p>
                    <p>
                        <a class="btn btn-primary btn-lg btn-block" href="/encuestas" role="button" style=""><i
                                    class="fa fa-edit"></i> Realizar encuesta</a>
                    </p>
                    <p>
                        <a class="btn btn-primary btn-lg btn-block" href="/faq" role="button" style="">Consultar las
                            preguntas frecuentes</a>
                    </p>
                </div>
                <?php if($GLOBALS['ADMIN']){ ?>
                <div class="well">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edición de itinerarios</div>
                        <div class="panel-body">
                            <?php echo View::make('caja',array('size'=>'3','link'=>URL_BASE.'/referencia','icon'=>'fa fa-external-link','text'=>'Gestión de referencias','type'=>'primary')); ?>
                            <?php echo View::make('caja',array('size'=>'3','link'=>URL_BASE.'/personaje','icon'=>'fa fa-users','text'=>'Gestión de personajes','type'=>'primary')); ?>
                            <?php echo View::make('caja',array('size'=>'3','link'=>URL_BASE.'/artworks','icon'=>'fa fa-pencil','text'=>'Gestión de obras','type'=>'primary')); ?>
                            <?php echo View::make('caja',array('size'=>'3','link'=>URL_BASE.'/segmentos','icon'=>'fa fa-plus','text'=>'Gestión de itinerarios','type'=>'primary')); ?>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Administración</div>
                        <div class="panel-body">
                            <?php echo View::make('caja',array('size'=>'3','link'=>URL_BASE.'/logs','icon'=>'fa fa-database','text'=>'Gestión de logs','type'=>'primary')); ?>
                            <?php echo View::make('caja',array('size'=>'3','link'=>URL_BASE.'/encuestas','icon'=>'fa fa-question','text'=>'Gestión de encuestas','type'=>'primary')); ?>

                        </div>
                    </div>
                </div>

                <?php } ?>
                <div class="well">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?php echo URL_BASE_PUBLIC; ?>/img/logonaranjanegro.jpg" class="img-responsive" alt="logo musacces" style="    height: 50px;">
                        </div>
                        <div class="col-md-9">
                            <h4>Museología e integración social: la difusión del patrimonio artístico y cultural del Museo del Prado a colectivos con especial accesibilidad (invidentes, sordos y reclusos)</h4>
                            <div class="flex-center">
                                <a href="http://www.musacces.es/" title="Web oficial Musacces" target="_blank">Web oficial Musacces</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
<footer>


</footer>
</html>
