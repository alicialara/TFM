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
                <div class="panel-heading"><h3>Edición de narrativa</h3></div>
                <div class="panel-body">
                    @include('btns_edicion_tinymce')
                    <div class="col-md-12" style="margin-top:20px;">
                        {!! Form::open(array('url' => 'narrativa')) !!}
                        {{ Form::token() }}
                        @if (isset($narrativa))
                            {{ Form::hidden('id',$narrativa->id) }}
                        @endif
                        <div class="form-group">
                            <?php if(isset($narrativa)) {  $value = $narrativa->titulo;} else{ $value = null;  } ?>
                            {{ Form::text('titulo', $value, array('placeholder' => 'Título (máximo 100 caracteres)', 'class' => 'form-control' )) }}
                            @if ($errors->has('titulo')) <div class="alert alert-danger">{{ $errors->first('titulo') }}</div> @endif
                        </div>
                        <div class="form-group">
                            <?php if(isset($narrativa)) {  $value = $narrativa->descripcion;} else{ $value = null;  } ?>
                            {{ Form::textarea('descripcion', $value, array('class' => 'form-control', 'id' => 'descripcion')) }}
                            @if ($errors->has('descripcion')) <div class="alert alert-danger">{{ $errors->first('descripcion') }}</div> @endif
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
