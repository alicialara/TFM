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
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Buscar un itinerario</h3></div>

        <div class="panel-body">
            <div class="" style="margin: 10px auto;">
                <div class="form-group">
                    <label>Buscar entidad:</label>{!! Form::select('index_itineraries',$index_itineraries,null,['class'=>'form-control', 'multiple' => 'multiple']) !!}
                </div>
                {!! Form::open(['url'=>'itinerario/0','id'=>'myform','class'=>'form', 'method' => 'GET', 'target' => '_blank'])!!}
                {!! Form::hidden('itinerario') !!}
                <div class='form-group'>
                    <p>* Para acceder al itinerario, es necesario seleccionarlo en la tabla.</p>
                    {!! Form::submit('Ver itinerario',['class'=>'input-lg btn btn-success', 'style' => 'width: 100%'])!!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
@push('scripts_multi')
<script type="text/javascript">
    $( document ).ready(function() {
        $("select[name='index_itineraries']").multi({
            'enable_search': true,
            'search_placeholder': 'Buscar...'
        });
        $('input[type="submit"]').click(function(e){
            e.preventDefault();
            var ids = [];
            $('select > option:selected').each(function() {
                ids.push($(this).val());
            });
            if(ids.length == 0){
                alert("Para ver un itinerario, haz clic sobre él en la tabla.")
            }else{
                ids = ids.join(",");
                $('input[name="itinerario"]').val(ids);
                $('form').submit();
            }

        });
    });
//    $(':input[type="submit"]').prop('disabled', false);
</script>
<style>
    .non-selected-wrapper{
        height: 600px !important;
        width:100% !important;
    }
    .selected-wrapper{
        display: none !important;
    }
    .selected{
        background-color: black !important;
        color: white !important;
    }
</style>
@endpush
