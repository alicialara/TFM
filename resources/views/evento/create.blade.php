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
                <div class="panel-heading"><h3>Creación de un nuevo evento</h3></div>

                <div class="panel-body">
                    <div class="col-md-12">
                        El manual con los pasos para la creación de un nuevo evento en la Web del Museo se puede ver
                        <a href="<?php echo URL_BASE_PUBLIC; ?>/pdf/gestion_eventos.pdf" target="_blank"> aquí <i class="fa fa-file-pdf-o fa-2x"></i></a>

                    </div>

                    <div class="col-md-12" style="margin-top:20px;">

                        {!! Form::open(array('url' => 'evento')) !!}

                        {{ Form::token() }}

                        @if (isset($evento))
                            {{ Form::hidden('id',$evento->id) }}
                        @endif



                        <div class="form-group">
                            <?php if(isset($evento)) {  $value = $evento->accion;} else{ $value = null;  } ?>
                            {{ Form::text('accion', $value, array('placeholder' => 'Título o acción del evento (máximo 100 caracteres)', 'class' => 'form-control' )) }}
                            @if ($errors->has('accion')) <div class="alert alert-danger">{{ $errors->first('accion') }}</div> @endif
                        </div>


                        <div class="form-group">
                            <?php if(isset($evento)) {  $value = $evento->lugar;} else{ $value = null;  } ?>
                            {{ Form::text('lugar', $value, array('placeholder' => 'Lugar del evento', 'class' => 'form-control')) }}
                            @if ($errors->has('lugar')) <div class="alert alert-danger">{{ $errors->first('lugar') }}</div> @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('fecha_inicio_dia', 'Fecha de inicio del evento: ', array('class' => 'awesome label_inline_custom')) }}
                            <?php if(isset($evento)) {  $value = $evento->fecha_inicio_dia;} else{ $value = '01';  } ?>
                            {{ Form::text('fecha_inicio_dia', $value, array('placeholder' => '01', 'class' => 'form-control input_inline_left_custom', 'maxlength' => '2', 'size' => '2')) }}
                            <?php if(isset($evento)) {  $value = $evento->fecha_inicio_mes;} else{ $value = '01';  } ?>
                            {{ Form::text('fecha_inicio_mes', $value, array('placeholder' => '01', 'class' => 'form-control input_inline_left_custom', 'maxlength' => '2', 'size' => '2')) }}
                            <?php if(isset($evento)) {  $value = $evento->fecha_inicio_anyo;} else{ $value = '0000';  } ?>
                            {{ Form::text('fecha_inicio_anyo', $value, array('placeholder' => '2017', 'class' => 'form-control input_inline_right_custom', 'maxlength' => '4', 'size' => '4')) }}
                        </div>
                        @if ($errors->has('fecha_inicio_dia')) <div class="alert alert-danger">{{ $errors->first('fecha_inicio_dia') }}</div> @endif
                        @if ($errors->has('fecha_inicio_mes')) <div class="alert alert-danger">{{ $errors->first('fecha_inicio_mes') }}</div> @endif
                        @if ($errors->has('fecha_inicio_anyo')) <div class="alert alert-danger">{{ $errors->first('fecha_inicio_anyo') }}</div> @endif

                        <div class="form-group">
                            {{ Form::label('fecha_fin_dia', 'Fecha de fin del evento: ', array('class' => 'awesome label_inline_custom')) }}
                            <?php if(isset($evento)) {  $value = $evento->fecha_fin_dia;} else{ $value = '01';  } ?>
                            {{ Form::text('fecha_fin_dia', $value, array('placeholder' => '01', 'class' => 'form-control input_inline_left_custom', 'maxlength' => '2', 'size' => '2')) }}
                            <?php if(isset($evento)) {  $value = $evento->fecha_fin_mes;} else{ $value = '01';  } ?>
                            {{ Form::text('fecha_fin_mes', $value, array('placeholder' => '01', 'class' => 'form-control input_inline_left_custom', 'maxlength' => '2', 'size' => '2')) }}
                            <?php if(isset($evento)) {  $value = $evento->fecha_fin_anyo;} else{ $value = '0000';  } ?>
                            {{ Form::text('fecha_fin_anyo', $value, array('placeholder' => '2017', 'class' => 'form-control input_inline_right_custom', 'maxlength' => '4', 'size' => '4')) }}
                        </div>
                        @if ($errors->has('fecha_fin_dia')) <div class="alert alert-danger">{{ $errors->first('fecha_fin_dia') }}</div> @endif
                        @if ($errors->has('fecha_fin_mes')) <div class="alert alert-danger">{{ $errors->first('fecha_fin_mes') }}</div> @endif
                        @if ($errors->has('fecha_fin_anyo')) <div class="alert alert-danger">{{ $errors->first('fecha_fin_anyo') }}</div> @endif

                        <div class="form-group">

                            <?php if(isset($evento)) {  $value = $evento->descripcion;} else{ $value = null;  } ?>
                                {{ Form::textarea('descripcion', $value, array('class' => 'form-control', 'id' => 'descripcion')) }}
                            @if ($errors->has('accion')) <div class="alert alert-danger">{{ $errors->first('accion') }}</div> @endif
                        </div>
                        <div class="form-group" style="margin: 10px auto;">
                            @include('btns_edicion_tinymce')
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Crear evento', array('class' => 'btn btn-success')) }}
                        </div>


                        {!! Form::close() !!}

                    </div>



                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts_tinymce')
<script>
    tinymce.init({
        selector: 'textarea',
        height: 300,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
@endpush