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
                <div class="panel-heading">Lista de narrativas</div>
                <div class="panel-body">
                    <div class="row">
                        <a role="button" class="btn btn-info btn-block" title="Crear nueva narrativa" href="<?php echo URL_BASE; ?>/narrativa/create" target="_blank">Crear nueva narrativa</a>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <table class="table table-bordered" id="users-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id usuario</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th></th>
                                @if($selection)
                                    <th></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($narrativa as $key => $value)
                                <tr>
                                    {{--<td><a class="btn btn-success" href="{{ URL::to('evento/' . $value->id) }}">{{ $value->id }}</a></td>--}}
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->id_usuario }}</td>
                                    <td>{{ $value->titulo }}</td>
                                    <td>{{ substr(strip_tags($value->descripcion),0,60) }}...</td>

                                    <td>
                                        <a class="btn btn-small btn-info" href="{{ URL::to('narrativa/' . $value->id . '/edit') }}">Editar</a>
                                    </td>
                                    @if($selection)
                                        <td>
                                            <input type="checkbox" id="{{ $value->id  }}" name="{{ $value->id  }}">
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@push('scripts_datatables')
<script>


    $(document).ready(function() {
        $(function() {
            $('.table').DataTable({
                responsive: false,
                paginate: false
            });

        });
    } );
</script>
@endpush
