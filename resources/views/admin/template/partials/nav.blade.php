<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{route('categories.index')}}">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Articulos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Tags</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <br><br>
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>

