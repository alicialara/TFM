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
                <div class="panel-heading">Lista de obras</div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top: 20px;">
                        <table class="table table_modal display compact" id="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Ver</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts_datatables')
<script>
    function copyToClipboard(text) {
        var aux = document.createElement("input");
        aux.setAttribute("value", text);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    $(document).ready(function() {
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('artworks_get_table') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'ver', name: 'ver' },
                ],
                iDisplayLength: 50,
                aLengthMenu: [[10, 25, 50, 100,500,1000,-1], [10, 25, 50,100,500,1000, "Mostrar todos"]]
            });
        });
    });
</script>
@endpush