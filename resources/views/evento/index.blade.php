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
    @include('evento.tablaindex')

@endsection



@push('scripts_datatables')

<script>

    $(document).ready(function() {
        $(function() {

            $('.table').DataTable({
                responsive: true,
                paginate: false
            });

        });
    } );
</script>

@endpush
