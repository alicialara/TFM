@extends('layouts.dashboard')

@section('content')
    <div class="col-md-6">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Importar datos desde la URL del Museo del Prado</div>

                    <div class="panel-body">
                        <div class="col-md-12">
                        El manual con los pasos para la inserción de enlaces desde la Web del Museo se puede ver 
                        <a href="<?php echo URL_BASE_PUBLIC; ?>/pdf/anadir_nuevo_enlace_obra.pdf" target="_blank"> aquí <i class="fa fa-file-pdf-o fa-2x"></i></a>

                        </div>
                        <div class="col-md-12">

                            {!! Form::open(array('url' => 'urls/import_by_url')) !!}

                            {{ Form::token() }}

                            
                            <div class="form-group">
                                {{ Form::label('url_mp', 'Enlace de la obra del Museo del Prado', array('class' => 'awesome')) }}

                                {{ Form::text('url_mp', null, array('placeholder' => 'Enlace de la obra', 'class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::submit('Importar datos', array('class' => 'btn btn-success')) }}
                            </div>


                            {!! Form::close() !!}

                        </div>



                </div>
            </div>
        </div>
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Importar datos desde Excel</div>

                    <div class="panel-body">
                        <div class="col-md-6 col-md-offset-3">

                            {!! Form::open(array('url' => 'urls/import', 'files' => true)) !!}

                            {{ Form::token() }}

                            <div class="form-group">
                                {{ Form::label('file', 'Seleccionar archivo', array('class' => 'awesome')) }}
                                {{ Form::file('file', array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::submit('Importar datos', array('class' => 'btn btn-success')) }}
                            </div>


                            {!! Form::close() !!}

                        </div>



                </div>
            </div>
        </div>
    </div>
@endsection