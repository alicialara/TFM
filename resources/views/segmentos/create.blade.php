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
                <div class="panel-heading"><h3>Edición de segmento</h3></div>

                <div class="panel-body">
                    <div class="col-md-12">
                        El manual con los pasos para la edición de un segmento se puede ver
                        <a href="<?php echo URL_BASE_PUBLIC; ?>/pdf/gestion_segmentos.pdf" target="_blank"> aquí <i class="fa fa-file-pdf-o fa-2x"></i></a>

                    </div>
                    <div class="col-md-4">
                        <?php if($segmento->image != ''){ ?>
                        <img src="{{ $segmento->image }}" class="img-responsive" alt="{{ $segmento->id }}" style="min-height: 306px;max-height: 400px;">
                        <?php }else{ ?>
                        <img src="/public/img/profile_default.png" class="img-responsive" alt="{{ $segmento->id }}" style="min-height: 306px;max-height: 400px;">
                        <?php } ?>
                    </div>
                    <div class="col-md-8" style="margin: 10px auto;">
                        @include('btns_edicion_tinymce')
                    </div>
                    <div class="col-md-12" style="margin-top:20px;">

                        {!! Form::open(array('url' => 'segmentos')) !!}

                        {{ Form::token() }}

                        @if (isset($segmento))
                            {{ Form::hidden('id',$segmento->id) }}
                        @endif


                        <div class="form-group">
                            <label>Descripción:</label>
                            <?php if(isset($segmento)) {  $value = $segmento->text;} else{ $value = null;  } ?>
                            {{ Form::textarea('text', $value, array('class' => 'form-control', 'style' => 'height:150px', 'id' => 'text')) }}
                            @if ($errors->has('text')) <div class="alert alert-danger">{{ $errors->first('text') }}</div> @endif
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