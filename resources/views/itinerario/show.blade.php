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
                <div class="col-md-6 col-sm-12 well well-lg" style="margin: 10px auto;">
                    <h2 style="text-align: center;"> <b>{{ $data->name_artwork }}</b> </h2>
                    <a role="button" class="btn btn-primary btn-block" target="_blank" href="/artworks/{{ $data->id_artwork }}"> <i class="fas fa-info"></i> Saber más sobre la obra</a>
                    <img src="{{ $data->image_artwork }}" class="img-rounded img-responsive" alt="{{ $data->name_artwork }}" style="max-height: 1000px;">
                    <div class="caption">
                    <p style="text-align: center;">{{ $data->name_artwork }}</p>
                </div>
                </div>
                <div class="parrafo_texto col-md-6 col-sm-12" style="margin: 10px auto;">

                    <?php echo html_entity_decode($data->text); ?>
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
