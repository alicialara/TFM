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
                <div class="panel-heading"><h3>Creación de una nueva referencia</h3></div>

                <div class="panel-body">
                    <div class="col-md-12">
                        El manual con los pasos para la creación de un nuevo referencia en la Web del Museo se puede ver
                        <a href="<?php echo URL_BASE_PUBLIC; ?>/pdf/gestion_referencia.pdf" target="_blank"> aquí <i class="fa fa-file-pdf-o fa-2x"></i></a>

                    </div>

                    <div class="col-md-12" style="margin-top:20px;">

                        {!! Form::open(array('url' => 'referencia')) !!}

                        {{ Form::token() }}

                        @if (isset($referencia))
                            {{ Form::hidden('id',$referencia->id) }}
                        @endif



                        <div class="form-group">
                            <?php if(isset($referencia)) {  $value = $referencia->label;} else{ $value = null;  } ?>
                            {{ Form::text('label', $value, array('placeholder' => 'Título completo de la referencia (máximo 100 caracteres)', 'class' => 'form-control' )) }}
                            @if ($errors->has('label')) <div class="alert alert-danger">{{ $errors->first('label') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($referencia)) {  $value = $referencia->url;} else{ $value = null;  } ?>
                            {{ Form::text('url', $value, array('placeholder' => 'URL de la referencia (si existe)', 'class' => 'form-control' )) }}
                            @if ($errors->has('url')) <div class="alert alert-danger">{{ $errors->first('url') }}</div> @endif
                        </div>

                        <div class="form-group">
                            <label>Descripción (Wikipedia):</label>
                            <?php if(isset($referencia)) {  $value = $referencia->description;} else{ $value = null;  } ?>
                            {{ Form::textarea('description', $value, array('class' => 'form-control', 'style' => 'height:150px', 'id' => 'description')) }}
                            @if ($errors->has('description')) <div class="alert alert-danger">{{ $errors->first('description') }}</div> @endif
                        </div>


                        <div class="form-group">
                            {{ Form::submit('Crear referencia', array('class' => 'btn btn-success')) }}
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
            'advlist autolink lists link image charmap print preview anchor autoresize',
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