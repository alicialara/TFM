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


        <div class="col-md-3 col-sm-12">
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
        <div class="col-md-3 col-sm-12">
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
        <div class="col-md-3 col-sm-12">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo count($debilidades); ?> / <?php echo count($mejorable); ?></h3>

                    <p>Debilidades / Sugerencias</p>
                </div>
                <div class="icon">
                    <i class="fa fa-exclamation"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $conocimiento_previo; ?> / 7</h3>

                    <p>Conocimiento en área</p>
                </div>
                <div class="icon">
                    <i class="fa fa-database"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
        </div>
        <div id="data_pie_1" style="display: none;"><?php echo $data_pie_1; ?></div>
        <div id="data_pie_2" style="display: none;"><?php echo $data_pie_2; ?></div>

        <div class="col-md-12" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="fa fa-angle-double-right"></i> Lista de puntos fuertes
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ul>
                            <?php foreach($fortalezas as $fortaleza){ ?>
                            <li><?php echo $fortaleza; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-angle-double-right"></i> Lista de puntos débiles
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul>
                            <?php foreach($debilidades as $debilidad){ ?>
                            <li><?php echo $debilidad; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fa fa-angle-double-right"></i> Ideas de mejora
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingThree">
                    <div class="panel-body">
                        <ul>
                            <?php foreach($mejorable as $mejora){ ?>
                            <li><?php echo $mejora; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12" style="background-color: whitesmoke;">

            <div class="col-md-12" style="margin-top: 20px;"><h2>A continuación, se muestran los grafos generados a partir de las sugerencias recibidas.</h2></div>
            <div class="col-md-12"><h3 style="text-align: center;font-size: 20px;">¿Qué es lo que más te ha gustado de esta página web y por qué?</h3></div>

            <div class="col-md-12" style="margin: 10px auto;background-color: white;">
                <div id="mynetwork1" style="width: 100%;height: 800px;"></div>
            </div>
            <div class="col-md-12"><h4>Contenido del nodo:</h4><pre id="nodeContent1"></pre></div>


            <hr>
            <hr>

            <div class="col-md-12"><h3 style="text-align: center;font-size: 20px;">¿Qué es lo que menos te ha gustado de esta página web y por qué?</h3></div>

            <div class="col-md-12" style="margin: 10px auto;background-color: white;">
                <div id="mynetwork2" style="width: 100%;height: 800px;"></div>
            </div>
            <div class="col-md-12"><h4>Contenido del nodo:</h4><pre id="nodeContent2"></pre></div>



            <hr>
            <hr>

            <div class="col-md-12"><h3 style="text-align: center;font-size: 20px;">¿Cómo crees que se podría mejorar la página web? ¿Te gustaría añadir alguna funcionalidad en concreto?</h3></div>

            <div class="col-md-12" style="margin: 10px auto;background-color: white;">
                <div id="mynetwork3" style="width: 100%;height: 800px;"></div>
            </div>
            <div class="col-md-12"><h4>Contenido del nodo:</h4><pre id="nodeContent3"></pre></div>

        </div>
    </div>
@endsection
@push('scripts_datatables')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
                indexLabelFontSize: 13,
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
                startAngle: 20,
                //innerRadius: 60,
                indexLabelFontSize: 13,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                dataPoints: JSON.parse($('#data_pie_2').text())
            }]
        });
        chart.render();
    });
</script>
@endpush

@push('scripts_graphs')

<script type="text/javascript">
    /**
     * This function fills the DataSets. These DataSets will update the network.
     */

    function create_graph_from_gephi(json_file, network_container, data_container){
        $.getJSON( json_file, function( gephiJSON ) {
            var network;

            var nodes = new vis.DataSet();
            var edges = new vis.DataSet();
            var gephiImported;
            var nodeContent = document.getElementById(data_container);
            var container = document.getElementById(network_container);
//            var parsed = vis.network.gephiParser.parseGephi(gephiJSON, {});
//            var data = {
//                nodes: parsed.nodes,
//                edges: parsed.edges
//            };
            var parserOptions = {
                edges: {
                    inheritColors: false
                },
                nodes: {
                    fixed: true,
                    parseColor: false
                }
            };

// parse the gephi file to receive an object
// containing nodes and edges in vis format.
            var parsed = vis.network.convertGephi(gephiJSON, parserOptions);

// provide data in the normal fashion
            var data = {
                nodes: parsed.nodes,
                edges: parsed.edges
            };
            nodes.add(parsed.nodes);
            edges.add(parsed.edges);
            var options = {
                nodes: {
                    shape: 'dot',
                    size: 13,
                    font: {
                        size: 15
                    },
                    borderWidth: 1
                },
                edges: {
                    width: 2,
                    smooth: {
                        type: 'continuous'
                    }
                },
                interaction: {
                    zoomView: true
                },
                layout: {
                    randomSeed: undefined,
                    improvedLayout: true
                },
                physics: {
                    stabilization: true,
                    barnesHut: {
                        gravitationalConstant: -80,
                        springConstant: 0.002,
                        springLength: 150
                    }
                }
            };
            options.height = '100%';
            options.width = '100%';
            network = new vis.Network(container, data, options);
            network.on('click', function (params) {
                if (params.nodes.length > 0) {
                    var data = nodes.get(params.nodes[0]); // get the data from selected node
                    nodeContent.innerHTML = JSON.stringify(data, undefined, 3); // show the data in the div
                }
            });
            network.fit(); // zoom to fit
        });
    }

    $( document ).ready(function() {
        create_graph_from_gephi("/public/uploads/oa_1.json", 'mynetwork1', 'nodeContent1')
        create_graph_from_gephi("/public/uploads/oa_2.json", 'mynetwork2', 'nodeContent2')
        create_graph_from_gephi("/public/uploads/oa_3.json", 'mynetwork3', 'nodeContent3')
    });
</script>
@endpush
