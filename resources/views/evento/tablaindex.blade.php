<div class="col-md-12">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">Lista de eventos</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <a role="button" class="btn btn-info btn-block" title="Crear nuevo evento" href="<?php echo URL_BASE; ?>/evento/create" target="_blank">Crear nuevo evento</a>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <table class="table table_modal display compact" id="users-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Lugar</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Seleccionar</th>

                            @if($modal)
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($evento as $key => $value)
                            <tr>
                                {{--<td><a class="btn btn-success" href="{{ URL::to('evento/' . $value->id) }}">{{ $value->id }}</a></td>--}}
                                <td id="id_{{ $value->id }}">{{ $value->id }}</td>
                                <td id="accion_{{ $value->id }}">{{ $value->accion }}</td>
                                <td id="descripcion_{{ $value->id }}">{{ substr(strip_tags($value->descripcion),0,30) }}...</td>
                                <td id="lugar_{{ $value->id }}">{{ $value->lugar }}</td>
                                <td id="fecha_inicio_{{ $value->id }}">{{ date('d-m-Y', strtotime($value->fecha_inicio)) }}</td>
                                <td id="fecha_fin_{{ $value->id }}">{{ date('d-m-Y', strtotime($value->fecha_fin)) }}</td>
                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('evento/' . $value->id . '/edit') }}" target="_blank">Editar</a>
                                </td>

                                @if($modal)
                                    <td>
                                        <p>
                                            <input type="radio" id="{{ $value->id  }}" name="optradio">
                                            <label for="{{ $value->id  }}"></label>
                                        </p>

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

@include('scripts_tinymce')

<script>
    $('.table_modal').unbind().DataTable({
        responsive: true,
        paginate: false
    });

</script>