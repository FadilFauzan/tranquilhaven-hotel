<nav class="navbar navbar-expand-md navbar-dark bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">TranquilHaven</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
            aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle {{ $active === 'rooms' ? 'active' : '' }}" 
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Rooms</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top: 1px">
                        <li>
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="/rooms?category={{ $category->slug }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </li>
                    </ul>
                </div>

                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'contact' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('contact') }}">Contact us</a>
                </li>

                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item text-center dropdown d-flex align-items-center">
                            <span class="text-white me-3">|</span>
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Nama Pengguna -->
                                {{ ucwords(auth()->user()->name) }}
                                <!-- Gambar Pengguna -->
                                <img id="profileImage"
                                    src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg') }}"
                                    alt="Profile Image" class="img-fluid rounded-circle"
                                    style="height: 29px; width: 29px; margin-left: 5px">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top: 1px">
                                @can('admin')
                                    <!-- Link ke dashboard jika user adalah admin -->
                                    <li>
                                        <a class="dropdown-item" href="/dashboard">
                                            Dashboard
                                        </a>
                                    </li>
                                @endcan

                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        My Profile
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit"
                                        onclick="return confirm('Want to log out? Don’t forget to come back!')">
                                        Logout
                                    </button>
                                </form>
                            </ul>
                        </li>
                    @else
                        <!-- Link untuk Login jika user tidak login -->
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'login' ? 'active' : '' }}" aria-current="page"
                                href="{{ route('login') }}">Log in</a>
                        </li>
                    @endauth
                </ul>
            </ul>
        </div>
    </div>
</nav>
