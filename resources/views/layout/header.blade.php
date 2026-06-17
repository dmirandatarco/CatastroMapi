<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <img class="wd-40 mt-3 " src="{{ asset('img/logomuni.png') }}" alt="Logo Muni">
                <p class="fw-bolder px-4" style="line-height: 70px;font-size: 20px;">MUNICIPALIDAD DISTRITAL DE MACHUPICCHU
                </p>
            </div>
        </form>
        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle"
                        src="{{ asset('storage/img/usuario/' . Auth::user()->imagen) }}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle"
                                src="{{ asset('storage/img/usuario/' . Auth::user()->imagen) }}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth::user()->nombres }} {{ Auth::user()->ape_paterno }}
                                {{ Auth::user()->ape_materno }}</p>
                            <p class="tx-12 text-muted">{{ Auth::user()->usuario }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <a href="{{ route('user.show', Auth::user()->id_usuario) }}">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Perfil</span>
                            </li>
                        </a>
                        <a href="{{ route('user.edit', Auth::user()->id_usuario) }}">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Editar Perfil</span>
                            </li>
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Cambiar Usuario</span>
                            </li>
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Cerrar Sesión</span>
                            </li>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
