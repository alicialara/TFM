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
            <?php foreach($encuestas as $enc){ ?>
            <?php var_dump(json_decode($enc->dataaaa)); ?>
            <?php } ?>
        </div>
    </div>
@endsection
@push('scripts_datatables')
<script>

    $( document ).ready(function() {

    });
</script>
@endpush
