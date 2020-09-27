<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.home') }}">
                        <i class="fad fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.plans.list') }}">
                        <i class="fad fa-cubes"></i>
                        <span>Plans</span>
                    </a>
                </li>
            </ul>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <a class="btn btn-outline-primary mr-2" href="{{ route('admin.dashboard') }}">
                        <i class="fal fa-cogs"></i>
                        <span>Admin Panel</span>
                    </a>
                @endif
                <a class="btn btn-outline-danger" href="{{ route('front.logout.action') }}">
                    <i class="fal fa-power-off"></i>
                    <span>Logout</span>
                </a>
            @else
                <a class="btn btn-outline-primary mr-2" href="{{ route('front.login') }}">
                    <i class="fal fa-user-unlock"></i>
                    <span>Login</span>
                </a>
                <a class="btn btn-outline-success" href="{{ route('front.register') }}">
                    <i class="fal fa-user-plus"></i>
                    <span>Register</span>
                </a>
            @endif
        </div>
    </div>
</nav>