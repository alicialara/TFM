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
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Menú</div>
                <div class="panel-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>Id</th>

                            <th>Nombre</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts_datatables')
<script>

</script>
@endpush
