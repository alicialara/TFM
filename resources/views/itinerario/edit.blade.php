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
                <div class="panel-heading"><h3>Edición de itinerario</h3></div>

                <div class="panel-body">
                    <div class="col-md-12">
                        El manual con los pasos para la edición de un itinerario se puede ver
                        <a href="<?php echo URL_BASE_PUBLIC; ?>/pdf/gestion_itinerarios.pdf" target="_blank"> aquí <i class="fa fa-file-pdf-o fa-2x"></i></a>

                    </div>

                    <div class="col-md-12" style="margin: 10px auto;">
                        @include('btns_edicion_tinymce')
                    </div>
                    <div class="col-md-12" style="margin-top:20px;">
                        <?php foreach($array_segments as $segment_text){ ?>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <?php if(isset($itinerario)) {  $value = $segment_text;} else{ $value = null;  } ?>
                            {{ Form::textarea('html', $value, array('class' => 'form-control', 'style' => 'height:150px', 'id' => 'html')) }}
                            @if ($errors->has('html')) <div class="alert alert-danger">{{ $errors->first('html') }}</div> @endif
                        </div>
                        <?php } ?>
                        {!! Form::open(array('url' => 'itinerario')) !!}
                        {{ Form::token() }}
                        {{ Form::hidden('final_html','') }}
                        @if (isset($itinerario))
                            {{ Form::hidden('id',$itinerario->id) }}
                        @endif
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

@push('scripts_datatables')
<script>
    $( document ).ready(function() {
        $('form').unbind().submit(function(){
            var final_text = '';
            $('textarea').each(function(){
                final_text += $(this).val();
            });
            $('input[name="final_html"]').val(final_text);
            return true;
        });
    });
</script>
@endpush