<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img alt="logo" class="img-responsive" src="/public/img/logotipo_MPOC_peq.png" style="max-height:100%;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php if($GLOBALS['AUTHOR']){ ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Elementos narrativos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li role="presentation" title="Obras">
                            <a role="menuitem" href="{{ url('/artworks') }}"><i class="fa fa-file-pencil"></i> <span class="nav-label">Obras</span></a>
                        </li>
                        <li role="presentation" title="Referencias">
                            <a role="menuitem" href="{{ url('/referencia') }}"><i class="fa fa-external-link"></i> <span class="nav-label">Referencias</span> </a>
                        </li>
                        <li role="presentation" title="Personajes">
                            <a role="menuitem" href="{{ url('/personaje') }}"><i class="fa fa-users"></i> <span class="nav-label">Personajes</span> </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($GLOBALS['ADMIN']){ ?>
                <li class="dropdown">
                    <a role="menuitem" href="{{ url('/logs') }}"><i class="fa fa-database"></i> <span class="nav-label">Logs</span></a>
                </li>

                    <?php } ?>
                <li>
                    <a role="menuitem" href="{{ url('/itinerario') }}"><i class="fa fa-search"></i> <span class="nav-label">Buscar itinerario</span> </a>
                </li>
                    <?php if($GLOBALS['ADMIN']){ ?>
                <li>
                    <a role="menuitem" href="{{ url('/segmentos') }}"><i class="fa fa-edit"></i> <span class="nav-label">Crear itinerarios</span> </a>
                </li>
                    <?php } ?>

                    <li class="dropdown">
                        <a role="menuitem" href="{{ url('/encuestas') }}"><i class="fa fa-question"></i> <span class="nav-label">Encuestas</span></a>
                    </li>



            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--<li role="presentation" title="Ver documentación">--}}
                    {{--<a role="menuitem" href="{{ url('/home') }}"><i class="fa fa-file-powerpoint-o"></i> <span class="nav-label">Ver documentación</span> </a>--}}
                {{--</li>--}}
                @if (Auth::check())
                    <li role="presentation" title="Cerrar sesión">

                        <a role="menuitem" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> <span class="nav-label">  Cerrar sesión</span>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li role="presentation" title="Iniciar sesión"><a role="menuitem" href="{{ url(URL_BASE.'/login') }}">Iniciar sesión</a></li>
                    <li role="presentation" title="Registrarse"><a role="menuitem" href="{{ url(URL_BASE.'/register') }}">Registrarse</a></li>
                @endif

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>