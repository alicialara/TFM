<script>
    tinymce.init({
        selector: 'textarea',
        height: 300,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css',
        extended_valid_elements: 'a[*],p[*]',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
    function personajes(){
        $("#btn_personaje").unbind().click(function(){
            //Carga con Ajax el contenido de /personaje/modal, que será igual que /evento, pero añadiendo una columna que permite seleccionar un evento
            console.log("Cargando modal de personajes...");
            $.get( "<?php echo URL_BASE; ?>/personaje/modal", function( data ) {
                $("#myModal").find('.modal-title').html("Selección de personaje");
                $("#myModal").find('.modal-body').html(data);
            });
        });
    }
    function referencias(){
        $("#btn_referencia").unbind().click(function(){
            //Carga con Ajax el contenido de /personaje/modal, que será igual que /evento, pero añadiendo una columna que permite seleccionar un evento
            $.get( "<?php echo URL_BASE; ?>/referencia/modal", function( data ) {
                $("#myModal").find('.modal-title').html("Selección de referencia");
                $("#myModal").find('.modal-body').html(data);

            });

        });
    }
    function obras(){
        $("#btn_obra").unbind().click(function(){
            //Carga con Ajax el contenido de /personaje/modal, que será igual que /evento, pero añadiendo una columna que permite seleccionar un evento
            $.get( "<?php echo URL_BASE; ?>/artworks/modal", function( data ) {
                $("#myModal").find('.modal-title').html("Selección de obra");
                $("#myModal").find('.modal-body').html(data);
            });
        });
    }

    personajes();
    referencias();
    obras();


</script>
