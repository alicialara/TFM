<div class="col-md-12">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">Lista de personajes</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <a role="button" class="btn btn-info btn-block" title="Crear nuevo personaje" href="<?php echo URL_BASE; ?>/personaje/create" target="_blank">Crear nuevo personaje</a>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <table class="table table_modal display compact" id="users-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Nacimiento</th>
                            <th>Fallecimiento</th>
                            <th>Descripción</th>
                            <th>Descripción Wikipedia</th>
                            <th>Seleccionar</th>

                            @if($modal)
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($personaje as $key => $value)

                            <tr>
                                {{--<td><a class="btn btn-success" href="{{ URL::to('personaje/' . $value->id) }}">{{ $value->id }}</a></td>--}}
                                <td id="id_{{ $value->id }}">{{ $value->id }}</td>
                                <td id="imagen_{{ $value->id }}">
                                    <?php if($value->image != ''){ ?>
                                        <img src="{{ $value->image }}" class="img-responsive" alt="{{ $value->label }}" style="max-height: 31px;max-width: 132px;">
                                    <?php }else{ ?>
                                        <img src="/public/img/profile_default.png" class="img-responsive" alt="{{ $value->label }}" style="max-height: 31px;">
                                    <?php } ?>
                                </td>
                                <td id="nombre_{{ $value->id }}">{{ $value->label }}</td>
                                <td id="nacimiento_{{ $value->id }}">{{ $value->fecha_nacimiento }}, {{ $value->lugar_nacimiento }}</td>
                                <td id="fallecimiento_{{ $value->id }}">{{ $value->fecha_fallecimiento }}, {{ $value->lugar_fallecimiento }}</td>
                                <td id="description_mp_{{ $value->id }}"><?php if(strlen($value->description_mp)>1) echo "Si"; else echo "No"; ?></td>
                                <td id="description_wp_{{ $value->id }}"><?php if(strlen($value->description_wp)>1) echo "Si"; else echo "No"; ?></td>
                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('personaje/' . $value->id . '/edit') }}" target="_blank">Editar</a>
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