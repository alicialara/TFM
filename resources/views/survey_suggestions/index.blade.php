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
                <div class="panel-heading">Valoraciones</div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top: 20px;">
                        <table class="table table_modal display compact" id="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Texto</th>
                                {{--<th></th>--}}
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

    $(document).ready(function() {
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('suggestions_get_table') !!}',
                columns: [
                    { data: 'id_question', name: 'id_question' },
                    { data: 'suggestion', name: 'suggestion' },
//                    { data: 'ver', name: 'ver' }
                ],
                paginate: false,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excelHtml5', 'pdf', 'print'
                ]
            });

            table.on( 'draw', function () {
                var body = $( table.table().body() );

                body.unhighlight();
                body.highlight( table.search() );
            } );
        });
    });
</script>

@endpush
