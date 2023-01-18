@if (Auth::check())
    @if (Auth::user()->role == 'customer')
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Recycon Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'index' ? 'active' : '' }}" aria-current="page"
                                href="/homepage">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'product' ? 'active' : '' }}" href="/show-product">Show
                                Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'carts' ? 'active' : '' }}" href="/my-cart">My Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'transactions' ? 'active' : '' }}"
                                href="/my-transaction">Transaction History</a>
                        </li>
                    </ul>
                    <form action="/show-product" class="d-flex flex-grow-1 mx-4" role="search">
                        <input class="form-control mx-2" type="search" name="search" placeholder="Search product..."
                            value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </form>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ $active === 'profile' ? 'active' : '' }} dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/edit-profile">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="/change-password">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-dark mx-1">Logout</a>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Recycon Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'index' ? 'active' : '' }}" aria-current="page"
                                href="/homepage">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'product' ? 'active' : '' }}" href="/show-product">Show
                                Product</a>
                        </li>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-2">
                            <li class="nav-item dropdown">
                                <a class="nav-link {{ $active === 'manage' ? 'active' : '' }} dropdown-toggle"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage Item
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/product">Show Item</a></li>
                                    <li><a class="dropdown-item" href="/product/create">Add Item</a></li>
                                </ul>
                            </li>
                        </ul>
                    </ul>
                    <form action="/show-product" class="d-flex flex-grow-1 mx-4" role="search">
                        <input class="form-control mx-2" type="search" name="search" placeholder="Search product..."
                            value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ $active === 'profile' ? 'active' : '' }} dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/edit-profile">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="/change-password">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-dark mx-1">Logout</a>
                </div>
            </div>
        </nav>
    @endif
@else
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Recycon Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'index' ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'product' ? 'active' : '' }}" href="/show-product">Show
                            Product</a>
                    </li>
                </ul>
                <a href="/login" class="btn btn-dark mx-2">Login</a>
                <a href="/register" class="btn btn-dark">Register</a>
            </div>
        </div>
    </nav>
@endif
