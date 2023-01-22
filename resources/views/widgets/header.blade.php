<header class="mb-2 header-style">
    <nav class="navbar navbar-expand-lg navbar-dark default-color fixed-top">

        <a class="navbar-brand" href="#"><strong>@yield('page')</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">

                </li>
                <li class="nav-item">

                </li>
                <li class="nav-item">

                </li>
                <li class="nav-item">

                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item mr-4">
                    <a href="#" class="logout" style="color:black;font-size:12px">@yield('email')</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="logout"><img src="{{asset('svg/right-from-bracket-solid.svg')}}" class="es-nav-icon"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
