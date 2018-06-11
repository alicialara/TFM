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
        <div class="panel-heading"><h3>Gestión de logs</h3></div>

        <div class="panel-body">
            <div class="" style="margin: 10px auto;">
                <?php var_dump($logs); ?>
            </div>
        </div>

    </div>
@endsection
@push('scripts_multi')
<script type="text/javascript">
    $( document ).ready(function() {

    });
</script>
@endpush
