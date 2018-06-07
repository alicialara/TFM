<?php
$trad = new stdClass();
$trad->es = new stdClass();
$trad->en = new stdClass();

$trad->es->edition = 'Edición';
$trad->en->edition = 'Artwork edition';


$trad->es->web_view = 'Ver en Web';
$trad->en->web_view = 'Web view';

$trad->es->date_created = 'Fecha de creación';
$trad->en->date_created = 'Date created';

$trad->es->date_published = 'Fecha de publicación';
$trad->en->date_published = 'Date published';

$trad->es->date_modified = 'Fecha de modificación';
$trad->en->date_modified = 'Date modified';

$trad->es->artwork_artform = 'Tipo';
$trad->en->artwork_artform = 'Artwork artform';

$trad->es->artwork_surface = 'Superficie';
$trad->en->artwork_surface = 'Artwork surface';

$trad->es->measurement = 'Medidas';
$trad->en->measurement = 'Measurement';

$trad->es->height = 'Alto';
$trad->en->height = 'Height';

$trad->es->width = 'Ancho';
$trad->en->width = 'Width';

$trad->es->author_born = 'Lugar de nacimiento';
$trad->en->author_born = 'Born';

$trad->es->author_image = 'Imagen';
$trad->en->author_image = 'Image';

$trad->es->author_description = 'Descripción';
$trad->en->author_description = 'Description';

$trad->es->author_url = 'Ver en Web';
$trad->en->author_url = 'View URL';

$trad->es->author_name = 'Nombre';
$trad->en->author_name = 'Name';

$trad->es->about_author = 'Sobre el autor';
$trad->en->about_author = 'About the author';

$trad->es->related_videos = 'Vídeos relacionados';
$trad->en->related_videos = 'Related videos';

?>
<!-- Modal -->
<div id="modalMetadata" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edición de metadatos</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">

            {!! Form::open(array('url' => 'crawler/edicion_metadata')) !!}

            {{ Form::token() }}


            <div class="form-group">
                {{ Form::label('columns_names', 'Selecciona la clave a modificar', array('class' => 'awesome')) }}
                <?php echo $select_columns_db; ?>
            </div>
            <div class="form-group">
                  <label for="new_value">Nuevo valor del campo:</label>
                  <textarea class="form-control" rows="5" name="new_value"></textarea>
                </div>
            <div class="form-group">
                {{ Form::submit('Enviar a revisión', array('class' => 'btn btn-success')) }}
            </div>


            {!! Form::close() !!}

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="col-md-12">
    <?php echo View::make('badge',['text' => 'ID: ' . $artwork->id]); ?>
    <?php echo View::make('badge',['text' => $trad->$lang->edition.': ' . $artwork->artwork_edition]); ?>
    <div class="col-md-3">
        <div class="bg-mute">
            <div class="row vertical-align">
    <a href="{{ $artwork->url }}" target="_blank" role="button" class="btn btn-info">{{ $trad->$lang->web_view }}</a>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalMetadata">Editar metadatos</button>
</div>
</div>
</div>
    <div class="col-md-12">
        <h2 style="margin-top: 0px;">{{ $artwork->artwork_name }}</h2>
        <p>{{ $artwork->artwork_subtitle }}</p>
        <div class="col-md-6">
            <a href="{{ $artwork->artwork_image }}" title="artwork image" target="_blank"><img src="{{ $artwork->artwork_image }}" class="img-responsive img-thumbnail"></a>
            <div class="well">
<ul>
    <li>{{ $trad->$lang->date_created }}: {{ $artwork->artwork_date_created }}</li>
    <li>{{ $trad->$lang->date_published }}: {{ $artwork->artwork_date_published }}</li>
    <li>{{ $trad->$lang->date_modified }}: {{ $artwork->artwork_date_modified }}</li>
    <li>{{ $trad->$lang->artwork_artform }}: {{ $artwork->artwork_artform }}</li>
    <li>{{ $trad->$lang->artwork_surface }}: {{ $artwork->artwork_surface }}</li>
    <li>{{ $trad->$lang->measurement }}:
        <ul>
            <li>{{ $trad->$lang->height }}: {{ $artwork->height_value }} {{ $artwork->height_unit_text }}</li>
            <li>{{ $trad->$lang->width }}: {{ $artwork->width_value }} {{ $artwork->width_unit_text }}</li>
        </ul>
    </li>
</ul>
            </div>
        </div>
        <div class="col-md-6" style="max-height: 300px;overflow: scroll;"><?php echo $artwork->artwork_description; ?></div>
        <div class="col-md-6" style="margin-top:10px;">
            @if (isset($artwork->audio))
<a href="{{ $artwork->audio }}" class="btn btn-warning btn-large-dim" type="button" target="_blank"><i class="fa fa-file-audio-o fa-5x"></i> </a>
            @endif
            <div class="row">
<?php
$tags = json_decode($artwork->tags);
foreach($tags as $tag){
?> <span class="label label-primary" style="line-height: 3;"><?php echo $tag; ?></span> <?php
}
?>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{{ $trad->$lang->about_author }} : {{ $artwork->author_name }}</h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
</div>
<div class="ibox-content">
    <div class="col-md-6">
        @if (isset($artwork->author_image))
            <a href="{{ $artwork->author_image }}" title="author image" target="_blank"><img src="{{ $artwork->author_image }}" class="img-responsive img-thumbnail"></a>
        @endif
        <ul>
            <li>{{ $trad->$lang->author_born }}: {{ $artwork->author_born }}</li>

            @if (isset($artwork->author_url))
<li><a href="{{ $artwork->author_url }}" target="_blank">{{ $trad->$lang->author_url }}</a> </li>
            @endif
        </ul>
    </div>
    <div class="col-md-6" style="max-height: 300px;overflow: scroll;">
        {{ $trad->$lang->author_description }}: {{ $artwork->author_description }}
    </div>
</div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{{ $trad->$lang->related_videos }}</h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
</div>
<div class="ibox-content">
    <div class="col-md-12">
        <?php $media = json_decode($artwork->associated_media); ?>
        <pre><?php //print_r($media); ?></pre>
        <?php
        $i = 0;
        foreach($media as $video){
            $i++;
            if(isset($video->embedUrl)){
$url_video = str_replace("/watch?v=","/embed/",$video->embedUrl);
echo '<figure><iframe width="425" height="349" src="'.$url_video.'" frameborder="0" allowfullscreen></iframe></figure>';
            }
            if($i == 10) break;
        }
        ?>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
