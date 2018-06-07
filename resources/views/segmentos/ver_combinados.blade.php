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
        <div class="panel-heading"><h3>Combinación de segmentos</h3></div>
        <div class="panel-body">
            <div class="well well-lg">
                <h3>Segmentos que pertenecen a todos los elementos narrativos seleccionados: </h3>
            </div>
            <table class="table table_modal display compact" id="users-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Obra</th>
                    <th>Texto</th>
                    <th>Editar</th>
                    <th>Orden</th>
                </tr>
                </thead>
                <tbody>
                @foreach($intersect as $key)
                    <tr>
                        <td id="id_{{ $key }}">{{ $key }}</td>
                        <td>{{ $data_segments[$key]->name }}</td>
                        <td id="descripcion_{{ $key }}" title="<?php echo strip_tags($data_segments[$key]->text); ?>"><?php echo substr(strip_tags($data_segments[$key]->text), 0, 100); ?></td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('segmentos/' . $key . '/edit') }}" target="_blank">Editar</a>
                        </td>
                        <td><input type="number" class="form-control ordered" id="{{ $key }}" value="0" style="width: 68px;"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @foreach($results as $key => $val)
            <div class="well well-lg">
                <h3>Segmentos que pertenecen a <b>{{ $titles_nes[$key] }}</b></h3>
            </div>
            <table class="table table_modal display compact" id="users-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Obra</th>
                    <th>Texto</th>
                    <th>Editar</th>
                    <th>Orden</th>
                </tr>
                </thead>
                <tbody>
                @foreach($val as $value)
                    <tr>
                        <td id="id_{{ $value }}">{{ $value }}</td>
                        <td>{{ $data_segments[$value]->name }}</td>
                        <td id="descripcion_{{ $value }}" title="<?php echo strip_tags($data_segments[$value]->text); ?>"><?php echo substr(strip_tags($data_segments[$value]->text), 0, 100); ?></td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <a class="btn btn-small btn-info" href="{{ URL::to('segmentos/' . $value . '/edit') }}" target="_blank">Editar</a>
                        </td>
                        <td><input type="number" class="form-control ordered" id="{{ $value }}" value="0" style="width: 68px;"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endforeach
        </div>
        <div class="well col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="nombre_itinerario" placeholder="Nombre del itinerario..." value="Nombre del itinerario">
            </div>
            <div class="form-group">
                <a role="button" class="btn btn-lg btn-primary btn-block" id="crear_itinerario">Crear itinerario con los segmentos seleccionados</a>
            </div>
            <div id="go_to_itinerary" class="form-group">

            </div>
        </div>
        <input type="hidden" name="names_ne" value="{{ implode(",",array_values($titles_nes)) }}">

    </div>
@endsection
@push('scripts_multi')
<script type="text/javascript">
    $( document ).ready(function() {
        $('a[id="crear_itinerario"]').unbind().click(function(){
            var token = $("input[name='_token']").val();
            var names_ne = $("input[name='names_ne']").val();
            var nombre_itinerario = $("input[name='nombre_itinerario']").val();
            var ids_segmentos = [];
            $('input[type="number"]').each(function(){
                valor = $(this).attr('id');
                if($(this).val() > 0){
                    ids_segmentos.push(valor);
                }
            });
            ids_segmentos = ids_segmentos.join(",");
//            ids_segmentos = $.unique(ids_segmentos);
            console.log(ids_segmentos);
            $.ajax({
                url: "{{ route('createitinerary-ajax') }}",
                method: 'POST',
                data: {ids_segmentos:ids_segmentos, _token:token,names_ne:names_ne,nombre_itinerario:nombre_itinerario},
                success: function(data) {
                    console.log(data.id_itinerario);
                    if(data.id_itinerario == 0){
                        alert("No se puede crear el itinerario. Ya existe otro con el mismo nombre.");
                    }else{
                        $('#go_to_itinerary').html('<a class="btn btn-lg btn-warning btn-block" href="/itinerario/0?selected_values=' + data.id_itinerario + '" target="_blank">Ir al itinerario creado</a>');
                    }

                }
            });
        });
    });
</script>
@endpush