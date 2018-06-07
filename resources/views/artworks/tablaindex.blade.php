<div class="col-md-12">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">Lista de obras</div>
            <div class="panel-body">

                <div class="col-md-12" style="margin-top: 20px;">
                    <table class="table table_modal display compact" id="table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Ver</th>
                            {{--<th>Editar</th>--}}

                            @if($modal)
                                <th></th>
                            @endif
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(function() {
            $('#table').DataTable();

        });
    } );
</script>