<nav class="navbar navbar-expand-lg navbar-light bg-light" id="admin_nav">
    <div class="container">
        <a class="navbar-brand" href="#">File Store</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item position-relative">
                    <a href="{{ route('front.home') }}" class="nav-link text-dark">
                        <i class="fad fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown nav-item-users">
                    <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fad fa-users"></i>
                        Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="usersDropdown">
                        <a class="dropdown-item" href="{{ route('admin.users.list') }}">Users List</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.users.create') }}">Create User</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-files">
                    <a class="nav-link dropdown-toggle" href="#" id="filesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fad fa-folders"></i>
                        Files
                    </a>
                    <div class="dropdown-menu" aria-labelledby="filesDropdown">
                        <a class="dropdown-item" href="{{ route('admin.files.list') }}">Files List</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.files.create') }}">Create File</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.files.reports') }}">Files Reports</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-plans">
                    <a class="nav-link dropdown-toggle" href="#" id="plansDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fad fa-cubes"></i>
                        Plans
                    </a>
                    <div class="dropdown-menu" aria-labelledby="plansDropdown">
                        <a class="dropdown-item" href="{{ route('admin.plans.list') }}">Plans List</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.plans.create') }}">Create Plan</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-packages">
                    <a class="nav-link dropdown-toggle" href="#" id="packagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fad fa-archive"></i>
                        Packages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="packagesDropdown">
                        <a class="dropdown-item" href="{{ route('admin.packages.list') }}">Packages List</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.packages.create') }}">Create Package</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-payments">
                    <a class="nav-link dropdown-toggle" href="#" id="paymentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fad fa-credit-card"></i>
                        Payments
                    </a>
                    <div class="dropdown-menu" aria-labelledby="paymentsDropdown">
                        <a class="dropdown-item" href="{{ route('admin.payments.list') }}">Payments List</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-item-categories">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fad fa-layer-group"></i>
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <a class="dropdown-item" href="{{ route('admin.categories.list') }}">Categories List</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.categories.create') }}">Create Category</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>