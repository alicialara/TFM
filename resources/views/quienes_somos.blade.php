<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="NoIndex, NoFollow">
    <title>MPOC</title>
    <link rel="shortcut icon" href="/public/favicon.ico"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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

        .centered {
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
                        <a href="{{ url(URL_BASE.'/') }}">Inicio</a>
                        <a href="{{ url(URL_BASE.'/login') }}">Iniciar sesión</a>
                        <a href="{{ url(URL_BASE.'/register') }}">Registrarse</a>
                    @endif
                </div>
            @endif
            <div class="" style="text-align: justify">

                <a href="/"> <img src="/public/img/logotipo_MPOC.png" class="img-responsive centered" alt="logo"></a>
                <h3 style="text-align: center">¿Qué es MPOC?</h3>
                <hr class="my-4">
                <p style="text-align: center;font-size: 20px;">El objetivo de esta web es mostrar los resultados de
                    generación de itinerarios automáticos.</p>
                <p style="text-align: center">
                    Hoy en día, gracias a las fuentes de recursos web existentes, es posible obtener información acerca
                    de casi cualquier lugar o monumento antes de ir a visitarlo. Pese a esto, es imposible obtener los
                    beneficios que aportan los guías turísticos a las visitas, ya que un guía turístico no sólo ofrece
                    esta información estática, sino también su contexto, las relaciones que existen entre los objetos de
                    la visita y las anécdotas que surgen en relación con éstos. En este trabajo se propone un modelo de
                    representación capaz de aportar ese dinamismo a la información existente en recursos enlazados en
                    abierto en la Web que permita establecer relaciones y aporte una nueva forma de preparar una visita
                    turística, tanto presencial como virtual.
                    Además, se presenta este sistema de información web, un prototipo para la visualización de
                    itinerarios.
                </p>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa fa-angle-double-right"></i> ¿Qué información voy a encontrarme en esta
                                    web?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                Una de las metas que pretendo abordar en este trabajo surge a partir del concepto <a
                                        href="https://es.wikipedia.org/wiki/Datos_enlazados" target="_blank"> "LOD"
                                    (Linked-Open Data, Datos enlazados en la Web)</a>. La idea es obtener la información
                                a partir de recursos en abierto, información libre de la Web. Por ello, partimos de tres
                                fuentes de recursos:

                                <ul>
                                    <li><a href="https://es.wikipedia.org" target="_blank">Wikipedia</a>: es un proyecto
                                        de enciclopedia web multilingüe que comenzó en el año 2001 y que cuenta con más
                                        de un millón de artículos.
                                    </li>
                                    <li><a href="https://www.wikidata.org" target="_blank">Wikidata</a>: es una base de
                                        conocimiento de acceso libre y gratuito, colaborativo y multilingüe que incluye
                                        datos estructurados para servir de soporte a Wikipedia, Wikimedia Commons y
                                        otras comunidades de la Fundación Wikimedia. Wikidata es un repositorio
                                        compuesto por una serie de ítems (que representan conceptos, temas u objetos), y
                                        cada uno de estos ítem está contiene una etiqueta, una descripción y una serie
                                        de sobrenombres (nombres alternativos para ese ítem). Para describir las
                                        características de los ítems se utilizan los enunciados, y están compuestos por
                                        una propiedad y su valor. Para poder obtener la información existente en
                                        Wikidata, se pueden utilizar las herramientas web disponibles, como Wikidata
                                        Query Service, o bien a través de su API , que permite obtener los datos en
                                        distintos formatos (como XML o JSON). Wikidata cuenta, además, con la
                                        información que existía en Freebase, una base de conocimiento colaborativa
                                        creada partiendo de distintas fuentes, incluyendo la colaboración de usuarios,
                                        que quedó en desuso en el año 2014.
                                    </li>
                                    <li><a href="https://www.museodelprado.es/" target="_blank">Museo del Prado</a>:
                                        Cuenta con descripciones de las obras e información sobre las mismas y sus
                                        autores.
                                    </li>
                                </ul>

                                Con toda esta información, se obtiene una red de conceptos como la mostrada en la
                                Ilustración 1.
                                <figure>
                                    <img src="/public/uploads/ilustracion_1.jpg" class="flex-center img-responsive">
                                    <figcaption>Ilustración 1. Imagen extraída utilizando Gephi sobre el grafo generado
                                        en este trabajo
                                    </figcaption>
                                </figure>

                                <strong style="font-size: 20px;"><i class="fa fa-database"></i> Una vez procesados todos
                                    los datos, se obtienen un total de 4823 obras, 1504 personajes, 14166 referencias y
                                    25569 eventos. De los eventos encontrados, 2799 están relacionados con obras, 2090
                                    con personajes y 221 con referencias.</strong>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-angle-double-right"></i> ¿Cómo se han creado los itinerarios?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Los itinerarios mostrados en esta página se han creado automáticamente después de haber
                                procesado, analizado y categorizado toda la información de las obras correspondientes al
                                museo desde las tres fuentes de recursos comentadas anteriormente.
                                Los párrafos que conforman cada itinerario contienen hiperenlaces que facilitan la
                                comprensión y enriquecen los itinerarios.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-angle-double-right"></i> ¿Por qué a veces falta información?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                La primera fase de este trabajo tiene como objetivo preparar un sistema que permita a
                                los expertos humanistas crear y editar los itinerarios generados partiendo de la
                                información extraída automáticamente.
                                Después de esta primera fase, los expertos comenzarán su trabajo de edición de
                                itinerarios, por lo que mejorarán la información existente, y aportarán nuevos e
                                interesantes itinerarios a la plataforma.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa fa-angle-double-right"></i> He encontrado un error, ¿a quién debo
                                    notificárselo?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingFour">
                            <div class="panel-body">
                                En caso de error, enviar un mail a alicialaraclares [arroba] gmail.com.
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
