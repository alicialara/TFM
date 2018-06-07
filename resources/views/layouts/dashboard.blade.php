<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="NoIndex, NoFollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MPOC</title>
    <link rel="shortcut icon" href="/public/favicon.ico" />
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Peity -->
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/peity/jquery.peity.min.js"></script>


    <!-- jquery UI -->
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Touch Punch - Touch Event Support for jQuery UI -->
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/inspinia.js"></script>


    <link href="<?php echo URL_BASE_PUBLIC; ?>/css/plugins/jQueryUI/jquery-ui.css" rel="stylesheet">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="<?php echo URL_BASE_PUBLIC; ?>/css/style.css" rel="stylesheet">

    <link href="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/multi-js/src/multi.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = '<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>'
    </script>
</head>
<body>

@include('modal')
<!-- Navigation -->
@include('layouts.navigation')

<div class="container-fluid">


    {{--<div class="row">--}}
        <div class="col-md-8 col-md-offset-2">

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->

            @if(Session::has('msg'))
            {{Session::get('msg')}}
            @endif
                    <!-- Main view  -->
            @yield('content')


        </div>
    {{--</div>--}}
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->
@section('scripts')
@show
</body>
<footer>
    <div class="pull-right">

    </div>
    <div>
        <strong>Copyright</strong> UNED 2018
    </div>
    <!-- Mainly scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script>
    @stack('scripts_datatables')
    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/multi-js/src/multi.js"></script>
    @stack('scripts_multi')

    <script src="<?php echo URL_BASE_PUBLIC; ?>/js/plugins/tinymce/js/tinymce/tinymce.min.js"></script>

    @include('scripts_tinymce')

    <script>
        $(document).ready(function () {

            $(".ibox").resizable({
                helper: "ui-resizable-helper",
                grid: 20
            });

        });
    </script>

</footer>
</html>
