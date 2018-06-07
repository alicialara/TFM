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

            <div class="col-md-12" style="margin: 10px auto;">

                <div class="form-group">
                    <label>Buscar:</label>
                    <a class="btn btn-primary btn-block buscar">Buscar</a>
                    {!! Form::select('index_segmentos',$index_segmentos,null,['class'=>'form-control', 'multiple' => 'multiple']) !!}
                </div>
                {!! Form::hidden('selected_labels') !!}
                {!! Form::open(['url'=>'segmentos/ver_combinados','id'=>'myform','class'=>'form', 'method' => 'GET', 'target' => '_blank'])!!}

                {!! Form::hidden('selected_values') !!}

                <a class="btn btn-success anadir_lista btn-block" disabled="">Añadir seleccionados a la lista</a>
                <div class="well selected_well"></div>
                <div class='form-group col-md-4 col-md-offset-4'>
                    {!! Form::submit('Ver segmentos combinados',['class'=>'input-lg btn btn-success', 'style' => 'width: 100%'])!!}
                </div>

                {!! Form::close() !!}


            </div>
        </div>

    </div>
@endsection
@push('scripts_multi')
<script type="text/javascript">
    function buscar(label){
        var token = $("input[name='_token']").val();
        console.log("Buscando..." + label);
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {label:label, _token:token},
            success: function(data) {
                $('.multi-wrapper').remove();
                $('select[name="index_segmentos"]').html('').removeAttr( "style" ).removeAttr( "data-multijs" );
                $('select[name="index_segmentos"]').html(data.options);
                $("select[name='index_segmentos']").multi();
                $('.anadir_lista').removeAttr("disabled");
                change_data();
            }
        });
    }
    function change_data(){
        $('.anadir_lista').unbind().click(function(e){
            e.preventDefault();
            var ids = [];
            var labels = [];
            $('select > option:selected').each(function() {
                ids.push($(this).val());
                labels.push('<span class="badge labels_selected_">' + $(this).text() + '</span>');
            });

            actual = $('input[name="selected_values"]').val().split(',');
            actual_labels = $('input[name="selected_labels"]').val().split('  -  ');
            console.log("Actual: " + actual);
            console.log("Actual: " + actual_labels);
            ids = $.merge(ids, actual);
            labels = $.merge(labels, actual_labels);
            ids = $.unique(ids);
            labels = $.unique(labels);
//            $.extend(true, ids,actual);
            ids = ids.join(",");
            labels = labels.join("  -  ");
            console.log("Final: " + ids);
            console.log("Final: " + labels);
            $('input[name="selected_values"]').val(ids);
            $('input[name="selected_labels"]').val(labels);

            $('.selected_well').html(labels);

        });
        $("input[class='search-input']").unbind().change(function(){
            var label = $(this).val();
            buscar(label);
        });
        $("input[class='buscar']").unbind().change(function(){
            var label = $("input[class='search-input']").val();
            buscar(label);
        });
    }
    $( document ).ready(function() {
        $("select[name='index_segmentos']").multi();
        change_data();



    });
</script>
@endpush
