@extends('layouts.dashboard')

@section('content')
    <div class="col-md-12">
        <div class="row">

            <div class="panel panel-default">
                <div class="panel-heading">Menú</div>
                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered" id="users-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
            $('#users-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('urls.get_table_urls') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'url', name: 'url' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });

        });
    } );
</script>
@endpush
