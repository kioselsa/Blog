<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--<a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>-->
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::user())
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Articulos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Imagenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tags.index')}}">Tags</a>
                    </li>
                </ul>
                <!--<form class="form-inline my-2 my-lg-0">
           <br><br>
           <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
       </form>-->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Pagina principal</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>

