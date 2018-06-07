@extends('layouts.dashboard')
@section('content')

    <div class="col-md-12">

        <div class="row">
            {{--{{ $artwork->id }}--}}
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#es" aria-expanded="true"> Español</a></li>
                    <li class=""><a data-toggle="tab" href="#en" aria-expanded="false" <?php if(!$artwork->en) echo 'disabled'; ?>>Inglés</a></li>
                </ul>

                <div class="tab-content">
                    <div id="es" class="tab-pane active">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <?php echo View::make('artwork',['artwork' => $artwork->es, 'select_columns_db' => $select_columns_db ]); ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
@push('scripts_datatables')
<script>
    $(document).ready(function() {
        $('.nav-tabs a[href="#{{ $lang }}"]').tab('show');
    } );
</script>
@endpush
