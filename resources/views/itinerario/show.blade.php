<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 4/19/2017
 * Time: 09:14
 */
?>
@extends('layouts.dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center;">
            <h2>{{ $index_itineraries->title }}
                <?php if($GLOBALS['AUTHOR']){ ?>
                <a role="button" class="btn btn-primary pull-right" target="_blank" href="/itinerario/{{ $index_itineraries->id }}/edit"> <i class="fas fa-edit"></i> Editar itinerario</a>
                <?php } ?>
            </h2>
        </div>

        <div class="panel-body">
            <?php if($error == ''){ ?>

                <div class="col-md-12">
                    <h2 style="text-align: center;"> <b>{{ $data->name_artwork }}</b> </h2>
                    <a role="button" class="btn btn-primary btn-block" target="_blank" href="/artworks/{{ $data->id_artwork }}">
                        <img src="{{ $data->image_artwork }}" class="img-responsive img-thumbnail" alt="{{ $data->name_artwork }}" style="max-height: 500px;">
                    </a>
                    <div class="caption"><p style="text-align: center;">{{ $data->name_artwork }}</p></div>
                    <div class="parrafo_texto" style="">
                        <?php echo html_entity_decode($data->text); ?>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            <?php } ?>
        </div>
        <div class="panel-footer">
            <ul class="pager">
                <?php if($previous > 0){ ?>
                    <?php $url = '/itinerario/' . $previous . '?itinerario=' . $index_itineraries->id; ?>
                    <li><a href="<?php echo $url; ?>">Anterior</a></li>
                <?php } ?>

                <?php if($next > 0){ ?>
                    <?php $url = '/itinerario/' . $next . '?itinerario=' . $index_itineraries->id; ?>
                    <li><a href="<?php echo $url; ?>">Siguiente</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
@endsection
@push('scripts_multi')
<script type="text/javascript">
    $( document ).ready(function() {

    });
</script>
@endpush
