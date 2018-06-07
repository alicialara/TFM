
<?php $size_boxes = '3'; ?>
<?php $size_boxes_lg = '6'; ?>
<div class="row">

    <h1 class="col-md-3 hidden-xs"><img src="/public/img/logotipo_MPOC.png" class="img-responsive"></h1>
    <p class="col-md-9 lead">MPOC es un sistema web de visualización de itinerarios diseñado como parte del trabajo fin de máster en Lenguajes y Sistemas Informáticos - UNED</p>
    <hr class="my-4">
    <p class="col-md-12 lead">
        Aquí escribir la motivación...
    </p>
    <p class="col-md-12 lead">
        <a class="btn btn-primary btn-lg btn-block" href="/itinerario" role="button" style="padding: 41px 86px;"><i class="fa fa-search"></i> Búsqueda de itinerarios</a>
    </p>
</div>
<?php if($GLOBALS['ADMIN']){ ?>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">Administración</div>
        <div class="panel-body">
            <?php echo View::make('caja',array('size'=>$size_boxes,'link'=>URL_BASE.'/referencia','icon'=>'fa fa-external-link','text'=>'Gestión de referencias','type'=>'primary')); ?>
            <?php echo View::make('caja',array('size'=>$size_boxes,'link'=>URL_BASE.'/personaje','icon'=>'fa fa-users','text'=>'Gestión de personajes','type'=>'primary')); ?>
            <?php echo View::make('caja',array('size'=>$size_boxes,'link'=>URL_BASE.'/artworks','icon'=>'fa fa-pencil','text'=>'Gestión de obras','type'=>'primary')); ?>
            <?php echo View::make('caja',array('size'=>$size_boxes,'link'=>URL_BASE.'/segmentos','icon'=>'fa fa-plus','text'=>'Creación de itinerarios','type'=>'primary')); ?>

        </div>
    </div>
</div>
<?php } ?>
