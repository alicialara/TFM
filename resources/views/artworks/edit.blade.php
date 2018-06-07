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
                <div class="panel-heading"><h3>Edición de obra</h3></div>

                <div class="panel-body">


                    <div class="col-md-12" style="margin-top:20px;">

                        {!! Form::open(array('url' => 'artworks')) !!}

                        {{ Form::token() }}

                        @if (isset($artwork))
                            {{ Form::hidden('id',$artwork->id) }}
                        @endif



                        <div class="form-group">
                            <?php if(isset($artwork)) {  $value = $artwork->name;} else{ $value = null;  } ?>
                            {{ Form::text('name', $value, array('placeholder' => 'Nombre de la obra', 'class' => 'form-control' )) }}
                            @if ($errors->has('name')) <div class="alert alert-danger">{{ $errors->first('name') }}</div> @endif
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