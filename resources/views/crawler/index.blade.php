@extends('layouts.dashboard')
@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Menú</div>
                <div class="panel-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Obra</th>
                            <th>Autor</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>

@endsection
@push('scripts_datatables')
<script>
    $(document).ready(function() {
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('crawler.get_table') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'artwork_name', name: 'artwork_name' },
                    { data: 'author_name', name: 'author_name' },
                    { data: 'view_es', name: '' },
                    { data: 'view_en', name: '' },
                ]
            });

        });
    } );
</script>
@endpush
