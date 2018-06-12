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
    <div class="col-md-12">


        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo count($encuestas); ?></h3>

                    <p>Total encuestas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo count($fortalezas); ?></h3>

                    <p>Sugerencias puntos fuertes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo count($debilidades); ?> / <?php echo count($mejorable); ?></h3>

                    <p>Debilidades / Sugerencias</p>
                </div>
                <div class="icon">
                    <i class="fa fa-exclamation"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $conocimiento_previo; ?> / 7</h3>

                    <p>Conocimiento en área</p>
                </div>
                <div class="icon">
                    <i class="fa fa-database"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="col-md-6">
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
        </div>
        <div id="data_pie_1" style="display: none;"><?php echo $data_pie_1; ?></div>
        <div id="data_pie_2" style="display: none;"><?php echo $data_pie_2; ?></div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-angle-double-right"></i> Lista de puntos fuertes
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingTwo">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-angle-double-right"></i> Lista de puntos fuertes
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingTwo">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>


        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    </div>
@endsection
@push('scripts_datatables')
<script>

    $( document ).ready(function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Rango edades",
                horizontalAlign: "left"
            },
            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontSize: 17,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                dataPoints: JSON.parse($('#data_pie_1').text())
            }]
        });
        chart.render();


        var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "Rango estudios",
                horizontalAlign: "left"
            },
            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontSize: 17,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                dataPoints: JSON.parse($('#data_pie_2').text())
            }]
        });
        chart.render();
    });
</script>
@endpush
