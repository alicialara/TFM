<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 4/19/2017
 * Time: 09:14
 */
?>
@extends('layouts.dashboard')
@section('content')

    <link href="<?php echo URL_BASE_PUBLIC; ?>/css/AdminLTE.min.css" rel="stylesheet">



    <div class="panel panel-default">
        <div class="panel-heading"><h3>Gestión de logs</h3></div>

        <div class="panel-body" style="font-size: 13px">

            <div class="col-md-3">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $total_users; ?></h3>

                        <p>Total usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $total_urls; ?></h3>
                        <p>Páginas vistas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bookmark"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $total_distict_iti; ?></h3>
                        <p>Itinerarios distintos vistos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $total_iti; ?></h3>
                        <p>Itinerarios vistos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="small-box bg-blue-gradient">
                    <div class="inner">
                        <h3><?php echo $total_usua_solo_1_url_; ?></h3>

                        <p>Total usuarios que abandonan en la primera página</p>
                    </div>
                    <div class="icon">
                        {{--<i class="fa fa-users"></i>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3><?php echo $media_usua_more_1_url; ?></h3>

                        <p>Media de páginas vistas por usuario (>1)</p>
                    </div>
                    <div class="icon">
                        {{--<i class="fa fa-users"></i>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $media_usua_url; ?></h3>

                        <p>Media de páginas vistas por usuario</p>
                    </div>
                    <div class="icon">
                        {{--<i class="fa fa-users"></i>--}}
                    </div>
                </div>
            </div>


            {{--<div id="data" style="display: none;">{"nodes":[{"id":"\/ - 459","label":"\/ - 459"},{"id":"\/itinerario - 38,743455497382","label":"\/itinerario - 38,743455497382"},{"id":"\/itinerario\/0?selected_values=13 - 0,65359477124183","label":"\/itinerario\/0?selected_values=13 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=11 - 0,65359477124183","label":"\/itinerario\/0?selected_values=11 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=49 - 0,65359477124183","label":"\/itinerario\/0?selected_values=49 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=34 - 0,65359477124183","label":"\/itinerario\/0?selected_values=34 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=5 - 0,65359477124183","label":"\/itinerario\/0?selected_values=5 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=167 - 1,3071895424837","label":"\/itinerario\/0?selected_values=167 - 1,3071895424837"},{"id":"\/ - 8,4967320261438","label":"\/ - 8,4967320261438"},{"id":"\/itinerario\/0?selected_values=159 - 0,65359477124183","label":"\/itinerario\/0?selected_values=159 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=146 - 1,3071895424837","label":"\/itinerario\/0?selected_values=146 - 1,3071895424837"},{"id":"\/itinerario\/0?selected_values= - 0,65359477124183","label":"\/itinerario\/0?selected_values= - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=3%2C4 - 0,65359477124183","label":"\/itinerario\/0?selected_values=3%2C4 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=262%2C264 - 0,65359477124183","label":"\/itinerario\/0?selected_values=262%2C264 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=3%2C9 - 0,65359477124183","label":"\/itinerario\/0?selected_values=3%2C9 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=9 - 0,65359477124183","label":"\/itinerario\/0?selected_values=9 - 0,65359477124183"},{"id":"\/itinerario\/0?selected_values=2 - 0,65359477124183","label":"\/itinerario\/0?selected_values=2 - 0,65359477124183"},{"id":"\/itinerario - 21,56862745098","label":"\/itinerario - 21,56862745098"},{"id":"\/referencia - 1,3071895424837","label":"\/referencia - 1,3071895424837"},{"id":"\/segmentos - 0,65359477124183","label":"\/segmentos - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=10 - 1,3071895424837","label":"\/itinerario\/0?itinerario=10 - 1,3071895424837"},{"id":"\/itinerario\/0?itinerario=160 - 0,65359477124183","label":"\/itinerario\/0?itinerario=160 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=585 - 1,9607843137255","label":"\/itinerario\/0?itinerario=585 - 1,9607843137255"},{"id":"\/itinerario\/0?itinerario=12 - 3,2679738562092","label":"\/itinerario\/0?itinerario=12 - 3,2679738562092"},{"id":"\/encuestas - 9,8039215686275","label":"\/encuestas - 9,8039215686275"},{"id":"\/personaje - 0,65359477124183","label":"\/personaje - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=4 - 0,65359477124183","label":"\/itinerario\/0?itinerario=4 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=6 - 1,9607843137255","label":"\/itinerario\/0?itinerario=6 - 1,9607843137255"},{"id":"\/artworks\/2568 - 0,65359477124183","label":"\/artworks\/2568 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=17 - 1,3071895424837","label":"\/itinerario\/0?itinerario=17 - 1,3071895424837"},{"id":"\/itinerario\/0?itinerario=371 - 0,65359477124183","label":"\/itinerario\/0?itinerario=371 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=5 - 7,1895424836601","label":"\/itinerario\/0?itinerario=5 - 7,1895424836601"},{"id":"\/itinerario\/0?itinerario= - 0,65359477124183","label":"\/itinerario\/0?itinerario= - 0,65359477124183"},{"id":"\/artworks\/333 - 0,65359477124183","label":"\/artworks\/333 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=245 - 3,921568627451","label":"\/itinerario\/0?itinerario=245 - 3,921568627451"},{"id":"\/itinerario\/0?itinerario=7 - 1,9607843137255","label":"\/itinerario\/0?itinerario=7 - 1,9607843137255"},{"id":"\/itinerario\/0?itinerario=3 - 5,8823529411765","label":"\/itinerario\/0?itinerario=3 - 5,8823529411765"},{"id":"\/register - 0,65359477124183","label":"\/register - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=159 - 0,65359477124183","label":"\/itinerario\/0?itinerario=159 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=49 - 0,65359477124183","label":"\/itinerario\/0?itinerario=49 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=77 - 0,65359477124183","label":"\/itinerario\/0?itinerario=77 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=45%2C47%2C61%2C571 - 0,65359477124183","label":"\/itinerario\/0?itinerario=45%2C47%2C61%2C571 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=177 - 0,65359477124183","label":"\/itinerario\/0?itinerario=177 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=2%2C23%2C180 - 0,65359477124183","label":"\/itinerario\/0?itinerario=2%2C23%2C180 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=180 - 0,65359477124183","label":"\/itinerario\/0?itinerario=180 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=50 - 0,65359477124183","label":"\/itinerario\/0?itinerario=50 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=5%2C26 - 0,65359477124183","label":"\/itinerario\/0?itinerario=5%2C26 - 0,65359477124183"},{"id":"\/faq - 0,65359477124183","label":"\/faq - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=61%2C68%2C73 - 0,65359477124183","label":"\/itinerario\/0?itinerario=61%2C68%2C73 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=2%2C18%2C29 - 0,65359477124183","label":"\/itinerario\/0?itinerario=2%2C18%2C29 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=151%2C166 - 0,65359477124183","label":"\/itinerario\/0?itinerario=151%2C166 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=142 - 0,65359477124183","label":"\/itinerario\/0?itinerario=142 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=2%2C3 - 0,65359477124183","label":"\/itinerario\/0?itinerario=2%2C3 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=414 - 0,65359477124183","label":"\/itinerario\/0?itinerario=414 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=138 - 0,65359477124183","label":"\/itinerario\/0?itinerario=138 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=9 - 0,65359477124183","label":"\/itinerario\/0?itinerario=9 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=11 - 0,65359477124183","label":"\/itinerario\/0?itinerario=11 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=388 - 0,65359477124183","label":"\/itinerario\/0?itinerario=388 - 0,65359477124183"},{"id":"\/itinerario\/0?itinerario=448%2C459%2C503 - 0,65359477124183","label":"\/itinerario\/0?itinerario=448%2C459%2C503 - 0,65359477124183"},{"id":"\/ - 37,17277486911","label":"\/ - 37,17277486911"},{"id":"\/itinerario\/0?selected_values=24 - 0,52356020942408","label":"\/itinerario\/0?selected_values=24 - 0,52356020942408"},{"id":"\/home - 1,5706806282723","label":"\/home - 1,5706806282723"},{"id":"\/itinerario\/0?selected_values= - 0,52356020942408","label":"\/itinerario\/0?selected_values= - 0,52356020942408"},{"id":"\/personaje - 1,0471204188482","label":"\/personaje - 1,0471204188482"},{"id":"\/referencia - 3,1413612565445","label":"\/referencia - 3,1413612565445"},{"id":"\/personaje\/294 - 0,52356020942408","label":"\/personaje\/294 - 0,52356020942408"},{"id":"\/encuestas - 12,041884816754","label":"\/encuestas - 12,041884816754"},{"id":"\/segmentos - 0,52356020942408","label":"\/segmentos - 0,52356020942408"},{"id":"\/itinerario\/1?itinerario=5 - 0,52356020942408","label":"\/itinerario\/1?itinerario=5 - 0,52356020942408"},{"id":"\/faq - 2,6178010471204","label":"\/faq - 2,6178010471204"},{"id":"\/encuestas\/resultados - 1,0471204188482","label":"\/encuestas\/resultados - 1,0471204188482"},{"id":"\/itinerario\/1?selected_values=24 - 100","label":"\/itinerario\/1?selected_values=24 - 100"},{"id":"\/ - 100","label":"\/ - 100"},{"id":"\/itinerario\/0?selected_values= - 40","label":"\/itinerario\/0?selected_values= - 40"},{"id":"\/itinerario - 40","label":"\/itinerario - 40"},{"id":"\/itinerario\/0?selected_values=3 - 20","label":"\/itinerario\/0?selected_values=3 - 20"},{"id":"\/personaje - 48,148148148148","label":"\/personaje - 48,148148148148"},{"id":"\/ - 11,111111111111","label":"\/ - 11,111111111111"},{"id":"\/artworks - 7,4074074074074","label":"\/artworks - 7,4074074074074"},{"id":"\/itinerario - 3,7037037037037","label":"\/itinerario - 3,7037037037037"},{"id":"\/personaje\/229 - 3,7037037037037","label":"\/personaje\/229 - 3,7037037037037"},{"id":"\/artworks\/324 - 3,7037037037037","label":"\/artworks\/324 - 3,7037037037037"},{"id":"\/personaje\/206 - 7,4074074074074","label":"\/personaje\/206 - 7,4074074074074"},{"id":"\/personaje\/214 - 3,7037037037037","label":"\/personaje\/214 - 3,7037037037037"},{"id":"\/personaje\/225 - 3,7037037037037","label":"\/personaje\/225 - 3,7037037037037"},{"id":"\/personaje\/203 - 3,7037037037037","label":"\/personaje\/203 - 3,7037037037037"},{"id":"\/itinerario\/0?itinerario=8 - 3,7037037037037","label":"\/itinerario\/0?itinerario=8 - 3,7037037037037"},{"id":"\/personaje - 30","label":"\/personaje - 30"},{"id":"\/referencia\/16164 - 10","label":"\/referencia\/16164 - 10"},{"id":"\/ - 30","label":"\/ - 30"},{"id":"\/referencia\/1886 - 20","label":"\/referencia\/1886 - 20"},{"id":"\/referencia\/1920 - 10","label":"\/referencia\/1920 - 10"},{"id":"\/referencia\/11474 - 100","label":"\/referencia\/11474 - 100"},{"id":"\/encuestas - 28,947368421053","label":"\/encuestas - 28,947368421053"},{"id":"\/segmentos - 1,3157894736842","label":"\/segmentos - 1,3157894736842"},{"id":"\/artworks\/2568 - 1,3157894736842","label":"\/artworks\/2568 - 1,3157894736842"},{"id":"\/itinerario - 47,368421052632","label":"\/itinerario - 47,368421052632"},{"id":"\/ - 14,473684210526","label":"\/ - 14,473684210526"},{"id":"\/faq - 3,9473684210526","label":"\/faq - 3,9473684210526"},{"id":"\/itinerario\/0?itinerario=3%2C4 - 1,3157894736842","label":"\/itinerario\/0?itinerario=3%2C4 - 1,3157894736842"},{"id":"\/itinerario\/2?itinerario=3 - 1,3157894736842","label":"\/itinerario\/2?itinerario=3 - 1,3157894736842"},{"id":"\/itinerario - 33,333333333333","label":"\/itinerario - 33,333333333333"},{"id":"\/select-ajax - 33,333333333333","label":"\/select-ajax - 33,333333333333"},{"id":"\/segmentos\/ver_combinados?selected_values= - 16,666666666667","label":"\/segmentos\/ver_combinados?selected_values= - 16,666666666667"},{"id":"\/ - 16,666666666667","label":"\/ - 16,666666666667"},{"id":"\/itinerario\/2?itinerario=5 - 100","label":"\/itinerario\/2?itinerario=5 - 100"},{"id":"\/faq - 47,368421052632","label":"\/faq - 47,368421052632"},{"id":"\/ - 31,578947368421","label":"\/ - 31,578947368421"},{"id":"\/encuestas - 10,526315789474","label":"\/encuestas - 10,526315789474"},{"id":"\/itinerario - 10,526315789474","label":"\/itinerario - 10,526315789474"},{"id":"\/encuestas\/resultados - 62,5","label":"\/encuestas\/resultados - 62,5"},{"id":"\/itinerario\/0?itinerario=8 - 12,5","label":"\/itinerario\/0?itinerario=8 - 12,5"},{"id":"\/ - 25","label":"\/ - 25"}],"edges":[{"from":"\/ - 459","to":"\/itinerario - 38,743455497382"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=13 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=11 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=49 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=34 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=5 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=167 - 1,3071895424837"},{"from":"\/itinerario - 38,743455497382","to":"\/ - 8,4967320261438"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=159 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=146 - 1,3071895424837"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values= - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=3%2C4 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=262%2C264 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=3%2C9 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=9 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?selected_values=2 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario - 21,56862745098"},{"from":"\/itinerario - 38,743455497382","to":"\/referencia - 1,3071895424837"},{"from":"\/itinerario - 38,743455497382","to":"\/segmentos - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=10 - 1,3071895424837"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=160 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=585 - 1,9607843137255"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=12 - 3,2679738562092"},{"from":"\/itinerario - 38,743455497382","to":"\/encuestas - 9,8039215686275"},{"from":"\/itinerario - 38,743455497382","to":"\/personaje - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=4 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=6 - 1,9607843137255"},{"from":"\/itinerario - 38,743455497382","to":"\/artworks\/2568 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=17 - 1,3071895424837"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=371 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=5 - 7,1895424836601"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario= - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/artworks\/333 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=245 - 3,921568627451"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=7 - 1,9607843137255"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=3 - 5,8823529411765"},{"from":"\/itinerario - 38,743455497382","to":"\/register - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=159 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=49 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=77 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=45%2C47%2C61%2C571 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=177 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=2%2C23%2C180 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=180 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=50 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=5%2C26 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/faq - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=61%2C68%2C73 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=2%2C18%2C29 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=151%2C166 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=142 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=2%2C3 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=414 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=138 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=9 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=11 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=388 - 0,65359477124183"},{"from":"\/itinerario - 38,743455497382","to":"\/itinerario\/0?itinerario=448%2C459%2C503 - 0,65359477124183"},{"from":"\/ - 459","to":"\/ - 37,17277486911"},{"from":"\/ - 37,17277486911","to":"\/itinerario - 38,743455497382"},{"from":"\/ - 37,17277486911","to":"\/ - 37,17277486911"},{"from":"\/ - 37,17277486911","to":"\/itinerario\/0?selected_values=24 - 0,52356020942408"},{"from":"\/ - 37,17277486911","to":"\/home - 1,5706806282723"},{"from":"\/ - 37,17277486911","to":"\/itinerario\/0?selected_values= - 0,52356020942408"},{"from":"\/ - 37,17277486911","to":"\/personaje - 1,0471204188482"},{"from":"\/ - 37,17277486911","to":"\/referencia - 3,1413612565445"},{"from":"\/ - 37,17277486911","to":"\/personaje\/294 - 0,52356020942408"},{"from":"\/ - 37,17277486911","to":"\/encuestas - 12,041884816754"},{"from":"\/ - 37,17277486911","to":"\/segmentos - 0,52356020942408"},{"from":"\/ - 37,17277486911","to":"\/itinerario\/1?itinerario=5 - 0,52356020942408"},{"from":"\/ - 37,17277486911","to":"\/faq - 2,6178010471204"},{"from":"\/ - 37,17277486911","to":"\/encuestas\/resultados - 1,0471204188482"},{"from":"\/ - 459","to":"\/itinerario\/0?selected_values=24 - 0,52356020942408"},{"from":"\/itinerario\/0?selected_values=24 - 0,52356020942408","to":"\/itinerario\/1?selected_values=24 - 100"},{"from":"\/ - 459","to":"\/home - 1,5706806282723"},{"from":"\/home - 1,5706806282723","to":"\/ - 100"},{"from":"\/ - 459","to":"\/itinerario\/0?selected_values= - 0,52356020942408"},{"from":"\/itinerario\/0?selected_values= - 0,52356020942408","to":"\/itinerario\/0?selected_values= - 40"},{"from":"\/itinerario\/0?selected_values= - 0,52356020942408","to":"\/itinerario - 40"},{"from":"\/itinerario\/0?selected_values= - 0,52356020942408","to":"\/itinerario\/0?selected_values=3 - 20"},{"from":"\/ - 459","to":"\/personaje - 1,0471204188482"},{"from":"\/personaje - 1,0471204188482","to":"\/personaje - 48,148148148148"},{"from":"\/personaje - 1,0471204188482","to":"\/ - 11,111111111111"},{"from":"\/personaje - 1,0471204188482","to":"\/artworks - 7,4074074074074"},{"from":"\/personaje - 1,0471204188482","to":"\/itinerario - 3,7037037037037"},{"from":"\/personaje - 1,0471204188482","to":"\/personaje\/229 - 3,7037037037037"},{"from":"\/personaje - 1,0471204188482","to":"\/artworks\/324 - 3,7037037037037"},{"from":"\/personaje - 1,0471204188482","to":"\/personaje\/206 - 7,4074074074074"},{"from":"\/personaje - 1,0471204188482","to":"\/personaje\/214 - 3,7037037037037"},{"from":"\/personaje - 1,0471204188482","to":"\/personaje\/225 - 3,7037037037037"},{"from":"\/personaje - 1,0471204188482","to":"\/personaje\/203 - 3,7037037037037"},{"from":"\/personaje - 1,0471204188482","to":"\/itinerario\/0?itinerario=8 - 3,7037037037037"},{"from":"\/ - 459","to":"\/referencia - 3,1413612565445"},{"from":"\/referencia - 3,1413612565445","to":"\/personaje - 30"},{"from":"\/referencia - 3,1413612565445","to":"\/referencia\/16164 - 10"},{"from":"\/referencia - 3,1413612565445","to":"\/ - 30"},{"from":"\/referencia - 3,1413612565445","to":"\/referencia\/1886 - 20"},{"from":"\/referencia - 3,1413612565445","to":"\/referencia\/1920 - 10"},{"from":"\/ - 459","to":"\/personaje\/294 - 0,52356020942408"},{"from":"\/personaje\/294 - 0,52356020942408","to":"\/referencia\/11474 - 100"},{"from":"\/ - 459","to":"\/encuestas - 12,041884816754"},{"from":"\/encuestas - 12,041884816754","to":"\/encuestas - 28,947368421053"},{"from":"\/encuestas - 12,041884816754","to":"\/segmentos - 1,3157894736842"},{"from":"\/encuestas - 12,041884816754","to":"\/artworks\/2568 - 1,3157894736842"},{"from":"\/encuestas - 12,041884816754","to":"\/itinerario - 47,368421052632"},{"from":"\/encuestas - 12,041884816754","to":"\/ - 14,473684210526"},{"from":"\/encuestas - 12,041884816754","to":"\/faq - 3,9473684210526"},{"from":"\/encuestas - 12,041884816754","to":"\/itinerario\/0?itinerario=3%2C4 - 1,3157894736842"},{"from":"\/encuestas - 12,041884816754","to":"\/itinerario\/2?itinerario=3 - 1,3157894736842"},{"from":"\/ - 459","to":"\/segmentos - 0,52356020942408"},{"from":"\/segmentos - 0,52356020942408","to":"\/itinerario - 33,333333333333"},{"from":"\/segmentos - 0,52356020942408","to":"\/select-ajax - 33,333333333333"},{"from":"\/segmentos - 0,52356020942408","to":"\/segmentos\/ver_combinados?selected_values= - 16,666666666667"},{"from":"\/segmentos - 0,52356020942408","to":"\/ - 16,666666666667"},{"from":"\/ - 459","to":"\/itinerario\/1?itinerario=5 - 0,52356020942408"},{"from":"\/itinerario\/1?itinerario=5 - 0,52356020942408","to":"\/itinerario\/2?itinerario=5 - 100"},{"from":"\/ - 459","to":"\/faq - 2,6178010471204"},{"from":"\/faq - 2,6178010471204","to":"\/faq - 47,368421052632"},{"from":"\/faq - 2,6178010471204","to":"\/ - 31,578947368421"},{"from":"\/faq - 2,6178010471204","to":"\/encuestas - 10,526315789474"},{"from":"\/faq - 2,6178010471204","to":"\/itinerario - 10,526315789474"},{"from":"\/ - 459","to":"\/encuestas\/resultados - 1,0471204188482"},{"from":"\/encuestas\/resultados - 1,0471204188482","to":"\/encuestas\/resultados - 62,5"},{"from":"\/encuestas\/resultados - 1,0471204188482","to":"\/itinerario\/0?itinerario=8 - 12,5"},{"from":"\/encuestas\/resultados - 1,0471204188482","to":"\/ - 25"}]}</div>--}}
            <div id="data" style="display: none;"><?php echo $ajax_data; ?></div>
            <div class="col-md-12" style="margin: 10px auto;">
                <div id="mynetwork" style="width: 100%;height: 2000px;"></div>
            </div>
        </div>

    </div>
@endsection
@push('scripts_graphs')

<script type="text/javascript">

    $( document ).ready(function() {
        $(".col-md-8").removeAttr("class");
        var inputValue = JSON.parse($("#data").text());
        var nodes_ = inputValue.nodes;
        var edges_ = inputValue.edges;
//        console.log(nodes_);
        var data = {
            nodes: nodes_,
            edges: edges_
        };
        var container = document.getElementById('mynetwork');
        var options = {
            nodes: {
                shape: 'dot',
                size: 15,
//                color : '#ECBF26', // select color

                font: {
                    size: 18,
//                    color : '#ffffff'
                },
                borderWidth: 2
            },
            interaction: {
                zoomView: false
            },
            layout: {
                hierarchical: {
                    enabled: true,
                    levelSeparation: 550,
                    nodeSpacing: 10,
                    treeSpacing: 10,
                    blockShifting: true,
                    edgeMinimization: true,
                    parentCentralization: true,
//                    direction: 'DU',
                    sortMethod: 'directed',
                    direction: 'LR'        // UD, DU, LR, RL
//                    sortMethod: 'hubsize'   // hubsize, directed
                }
            }
        };
        options.height = '100%';
        options.width = '100%';
//        options.borderWidth = '13px';
        var network = new vis.Network(container, data, options);

    });
</script>
@endpush
