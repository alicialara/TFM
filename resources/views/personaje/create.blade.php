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
                <div class="panel-heading"><h3>Editar personaje</h3></div>

                <div class="panel-body">

                    <div class="col-md-12" style="margin-top:20px;">

                        {!! Form::open(array('url' => 'personaje')) !!}

                        {{ Form::token() }}

                        @if (isset($personaje))
                            {{ Form::hidden('id',$personaje->id) }}
                        @endif

                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->label;} else{ $value = null;  } ?>
                            {{ Form::text('label', $value, array('placeholder' => 'Nombre completo del personaje (máximo 100 caracteres)', 'class' => 'form-control' )) }}
                            @if ($errors->has('label')) <div class="alert alert-danger">{{ $errors->first('label') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->fecha_nacimiento;} else{ $value = null;  } ?>
                            {{ Form::text('fecha_nacimiento', $value, array('placeholder' => 'Fecha de nacimiento (DD/MM/AAAA)', 'class' => 'form-control' )) }}
                            @if ($errors->has('fecha_nacimiento')) <div class="alert alert-danger">{{ $errors->first('fecha_nacimiento') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->fecha_fallecimiento;} else{ $value = null;  } ?>
                            {{ Form::text('fecha_fallecimiento', $value, array('placeholder' => 'Fecha de fallecimiento (DD/MM/AAAA)', 'class' => 'form-control' )) }}
                            @if ($errors->has('fecha_fallecimiento')) <div class="alert alert-danger">{{ $errors->first('fecha_fallecimiento') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->label;} else{ $value = null;  } ?>
                            {{ Form::text('label', $value, array('placeholder' => 'Nombre completo del personaje (máximo 100 caracteres)', 'class' => 'form-control' )) }}
                            @if ($errors->has('label')) <div class="alert alert-danger">{{ $errors->first('label') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->lugar_nacimiento;} else{ $value = null;  } ?>
                            {{ Form::text('lugar_nacimiento', $value, array('placeholder' => 'Lugar de nacimiento', 'class' => 'form-control' )) }}
                            @if ($errors->has('lugar_nacimiento')) <div class="alert alert-danger">{{ $errors->first('lugar_nacimiento') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->lugar_fallecimiento;} else{ $value = null;  } ?>
                            {{ Form::text('lugar_fallecimiento', $value, array('placeholder' => 'Lugar de fallecimiento', 'class' => 'form-control' )) }}
                            @if ($errors->has('lugar_fallecimiento')) <div class="alert alert-danger">{{ $errors->first('lugar_fallecimiento') }}</div> @endif
                        </div>

                        <div class="form-group">
                            <label>Descripción:</label>
                            <?php if(isset($personaje)) {  $value = $personaje->description_mp;} else{ $value = null;  } ?>
                            {{ Form::textarea('description_mp', $value, array('class' => 'form-control', 'style' => 'height:150px', 'id' => 'description_mp')) }}
                            @if ($errors->has('description_mp')) <div class="alert alert-danger">{{ $errors->first('description_mp') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <label>Descripción (Wikipedia):</label>
                            <?php if(isset($personaje)) {  $value = $personaje->description_wp;} else{ $value = null;  } ?>
                            {{ Form::textarea('description_wp', $value, array('class' => 'form-control', 'style' => 'height:150px', 'id' => 'description_wp')) }}
                            @if ($errors->has('description_wp')) <div class="alert alert-danger">{{ $errors->first('description_wp') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($personaje)) {  $value = $personaje->image;} else{ $value = null;  } ?>
                            {{ Form::text('image', $value, array('placeholder' => 'URL imagen del personaje', 'class' => 'form-control' )) }}
                            @if ($errors->has('image')) <div class="alert alert-danger">{{ $errors->first('image') }}</div> @endif
                        </div>



                        <div class="form-group">
                            {{ Form::submit('Guardar cambios', array('class' => 'btn btn-success')) }}
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