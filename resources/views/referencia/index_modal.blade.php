<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 4/25/2017
 * Time: 09:44
 */

?>
<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Lista de referencias</div>
            <div class="panel-body">
                <div class="col-md-12" style="margin-top: 20px;">
                    <table class="table table_modal display compact" id="table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>URL</th>
                            <th>Descripción</th>
                            <th>Ver</th>
                            <th>Seleccionar</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function copyToClipboard(text) {
        var aux = document.createElement("input");
        aux.setAttribute("value", text);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    $(document).ready(function() {
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('referencia_get_table_modal') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'label', name: 'label' },
                    { data: 'url', name: 'url' },
                    { data: 'description', name: 'description' },
                    { data: 'ver', name: 'ver' },
                    { data: 'seleccionar', name: 'seleccionar' }
                ],
                fnDrawCallback: function(settings, json) {
                    $('input[name="optradio"]').unbind().change(function(){
                        if ($(this).is(':checked')) {
                            var id_seleccionado = $(this).attr('id');
                            var titulo = $('#titulo_'+id_seleccionado).text();
                            var etiqueta = '<a id_reference="' + id_seleccionado+ '">' +titulo+ '</a>';
                            $("#etiqueta_creada").text(etiqueta);
                            copyToClipboard(etiqueta);
                            alert("Etiqueta guardada en el portapapeles");
                        }
                        $("#myModal").modal('hide');
                    });
                    $("#myModal").modal();
                }
            });
        });
    });
</script>


