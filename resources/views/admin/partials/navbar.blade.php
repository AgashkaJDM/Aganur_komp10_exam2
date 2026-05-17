<nav class="navbar navbar-expand-lg bg-success">
    <div class="container-lg">
        <a class="navbar-brand  link-light" href="#">404 Japanese Autos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                <li class="nav-item">
                    <a class="nav-link link-light  {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light {{ request()->routeIs('models.*') ? 'active' : '' }}"
                        href="{{ route('admin.models.index') }}">Models</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light {{ request()->routeIs('brands.*') ? 'active' : '' }}"
                        href="{{ route('admin.brands.index') }}">Brands</a>
                </li>
                <li class="me-auto nav-item">
                    <a class="nav-link link-light {{ request()->routeIs('cars.*') ? 'active' : '' }}"
                        href="{{ route('admin.cars.index') }}">Cars</a>
                </li>
            </ul> 
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class=" nav-item dropdown">
                    <a class="nav-link link-light dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu p-1 dropdown-menu-end" data-bs-popper="static">
                        <li>
                            <a class="dropdown-item rounded {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                                href="locale/en">English</a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded {{ app()->getLocale() == 'tm' ? 'active' : '' }}"
                                href="locale/tm">Türkmen</a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded {{ app()->getLocale() == 'ru' ? 'active' : '' }}"
                                href="locale/ru">Русский</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>