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
                <div class="panel-heading"><h3>{{ $personaje->label }}</h3></div>

                <div class="panel-body">

                    <div class="well well-lg col-md-12">
                        <div class="col-md-4">
                            <?php if($personaje->image != ''){ ?>
                            <img src="{{ $personaje->image }}" class="img-responsive" alt="{{ $personaje->label }}" style="min-height: 306px;max-height: 400px;">
                            <?php }else{ ?>
                            <img src="/public/img/profile_default.png" class="img-responsive" alt="{{ $personaje->label }}" style="min-height: 306px;max-height: 400px;">
                            <?php } ?>
                        </div>
                        <div class="col-md-8 parrafo_texto">
                            <ul>
                                <li>Nacimiento: {{ $personaje->fecha_nacimiento }}, {{ $personaje->lugar_nacimiento }}</li>
                                <li>Fallecimiento: {{ $personaje->fecha_fallecimiento }}, {{ $personaje->lugar_fallecimiento }}</li>
                            </ul>

                            <a class="btn btn-primary btn-block" href="/personaje/{{ $personaje->id }}/edit">Editar personaje</a>

                        </div>
                    </div>
                    <div class="well col-md-12 wp_paragraph">
                        <p class="parrafo_texto" style="text-align: center; font-weight: bold">Descripción </p>
                        <?php echo html_entity_decode($personaje->description_mp); ?>
                    </div>
                    <div class="well col-md-12">
                        <p class="parrafo_texto" style="text-align: center; font-weight: bold">Descripción (Wikipedia) </p>
                        <?php echo html_entity_decode($personaje->description_wp); ?>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
