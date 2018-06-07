@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Estructura Ontología</div>
                <div class="panel-body">
                    {!! file_get_contents(asset('/public/svg/Diagramontology.svg')) !!}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Estructura de la base de datos</div>
                <div class="panel-body">
                    {!! file_get_contents(asset('/public/svg/estructura_db.svg')) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
