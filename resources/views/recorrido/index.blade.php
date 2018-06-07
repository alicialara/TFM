@extends('layouts.dashboard')
@section('content')

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

@endsection
@push('scripts_datatables')
<script>
    $(document).ready(function() {
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('recorrido.get_table_recorridos') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                   
                ]
            });

        });
    } );
</script>
@endpush