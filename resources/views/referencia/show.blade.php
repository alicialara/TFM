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
                <div class="panel-heading"><h3>{{ $referencia->label }}</h3></div>

                <div class="panel-body">

                    <div class="well col-md-12">
                        <p class="parrafo_texto" style="text-align: center; font-weight: bold">Descripción </p>
                        <?php echo html_entity_decode($referencia->description); ?>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
