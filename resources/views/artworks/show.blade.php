<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 4/25/2017
 * Time: 09:44
 */
?>
@extends('layouts.dashboard')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align: center; font-weight: bold;">{{ $artwork->name }}</h1></div>

                <div class="panel-body">

                    <div class="well well-lg col-md-12">
                        <div class="col-md-4">
                            <?php if($artwork->image != ''){ ?>
                            <img src="{{ $artwork->image }}" class="img-responsive" alt="{{ $artwork->name }}" style="min-height: 306px;max-height: 400px;">
                            <?php }else{ ?>
                            <img src="/public/img/profile_default.png" class="img-responsive" alt="{{ $artwork->name }}" style="min-height: 306px;max-height: 400px;">
                            <?php } ?>
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <td>Procedencia</td>
                                    <td>{{ strip_tags(implode(";",$artwork->procedencia)) }}</td>
                                </tr>
                                <tr>
                                    <td>Palabras clave (Museo del Prado)</td>
                                    <td>{{ strip_tags(implode(",",$artwork->keywords_mp)) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8 ">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <td>Identificador del catálogo (Museo del Prado)</td>
                                    <td>{{ strip_tags($artwork->identificador_catalogo) }}</td>
                                </tr>
                                <tr>
                                    <td>Colección</td>
                                    <td>{{ strip_tags($artwork->coleccion) }}</td>
                                </tr>
                                <tr>
                                    <td>País</td>
                                    <td>{{ strip_tags($artwork->pais) }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha de creación</td>
                                    <td>{{ strip_tags($artwork->date_created) }}</td>
                                </tr>
                                <tr>
                                    <td>Género artístico</td>
                                    <td>{{ strip_tags($artwork->genero_artistico) }}</td>
                                </tr>
                                <tr>
                                    <td>Estilo</td>
                                    <td>{{ strip_tags($artwork->estilo) }}</td>
                                </tr>
                                <tr>
                                    <td>Técnica</td>
                                    <td>{{ strip_tags($artwork->tecnica) }}</td>
                                </tr>

                                <tr>
                                    <td>Superficie</td>
                                    <td>{{ strip_tags($artwork->superficie) }}</td>
                                </tr>
                                <tr>
                                    <td>Movimiento</td>
                                    <td><?php if(count($artwork->movimiento)>0){echo strip_tags(implode(",",preg_replace(array("/\t/", "/\s{2,}/", "/\n/"),array("", " ", " "),array_values($artwork->movimiento)))); } ?></td>
                                </tr>
                                <tr>
                                    <td>Representa a</td>
                                    <td><?php if(count($artwork->representa_a)>0){echo strip_tags(implode(",",preg_replace(array("/\t/", "/\s{2,}/", "/\n/"),array("", " ", " "),array_values($artwork->representa_a)))); } ?></td>
                                </tr>
                                <tr>
                                    <td>Ubicación</td>
                                    <td>{{ strip_tags($artwork->ubicacion) }}</td>
                                </tr>
                                <tr>
                                    <td>Material empleado</td>
                                    <td>{{ strip_tags($artwork->material_empleado) }}</td>
                                </tr>
                                <tr>
                                    <td>Alto (cm)</td>
                                    <td>{{ strip_tags($artwork->alto) }}</td>
                                </tr>
                                <tr>
                                    <td>Ancho (cm)</td>
                                    <td>{{ strip_tags($artwork->ancho) }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="well col-md-12 wp_paragraph">
                        <p class="parrafo_texto" style="text-align: center; font-weight: bold">Descripción (Museo del Prado)</p>
                        <?php echo html_entity_decode($artwork->description_mp); ?>
                    </div>
                    <div class="well col-md-12 wp_paragraph">
                        <p class="parrafo_texto" style="text-align: center; font-weight: bold">Descripción (Wikipedia) </p>
                        <?php echo html_entity_decode(strip_tags($artwork->description_wp)); ?>
                    </div>
                    <h3>Segmentos asociados a la obra: </h3>
                    <?php foreach($segments as $seg){ ?>
                        <div class="well col-md-12 wp_paragraph">
                            <p class="parrafo_texto" style="text-align: center; font-weight: bold">Segmento {{ $seg->id }}<a class="btn btn-primary pull-right" target="_blank" href="/segmentos/{{ $seg->id }}/edit"><span class="glyphicon glyphicon-edit"></span> Editar segmento</a> </p>
                            <?php echo html_entity_decode($seg->text); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
@endsection
