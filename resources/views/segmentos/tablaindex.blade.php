<div class="col-md-12">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">Lista de referencias</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <a role="button" class="btn btn-info btn-block" title="Crear una nueva referencia" href="<?php echo URL_BASE; ?>/referencia/create" target="_blank">Crear una nueva referencia</a>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <table class="table table_modal display compact" id="users-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>URL</th>
                            <th>Descripción</th>
                            <th>Seleccionar</th>

                            @if($modal)
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($referencia as $key => $value)
                            <tr>
                                {{--<td><a class="btn btn-success" href="{{ URL::to('referencia/' . $value->id) }}">{{ $value->id }}</a></td>--}}
                                <td id="id_{{ $value->id }}">{{ $value->id }}</td>
                                <td id="titulo_{{ $value->id }}">{{ $value->label }}</td>
                                <td id="url_{{ $value->id }}">{{ $value->url }}</td>
                                <td id="descripcion_{{ $value->description }}"><?php if($value->description) echo "Si"; else echo "No"; ?></td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('referencia/' . $value->id . '/edit') }}" target="_blank">Editar</a>
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