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
            <?php $data = json_decode($enc->data); ?>
            <pre><?php print_r($data); ?></pre>
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
