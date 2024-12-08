@extends('layouts.main')

@section('container')
    <section
        style="background: rgba(0,0,0,1); background-image: url('img/bg_2.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">

        <section class="site-section">
            <div class="container">
                <div class="auth-form">
                    <div>
                        <form action="/login" method="post">
                            @csrf
                            {{-- Pesan Sukses --}}
                            @if (session('success'))
                                <script>
                                    Swal.fire({
                                        title: 'Success!',
                                        text: "{{ session('success') }}",
                                        icon: 'success',
                                        confirmButtonText: "Oke",
                                    });
                                </script>
                            @endif

                            {{-- Pesan Sukses --}}
                            @if (session('status'))
                                <script>
                                    Swal.fire({
                                        title: 'status!',
                                        text: "{{ session('status') }}",
                                        icon: 'success',
                                        confirmButtonText: "Oke",
                                    });
                                </script>
                            @endif

                            @if (session('loginError'))
                                <script>
                                    Swal.fire({
                                        title: 'Login Failed!',
                                        text: "{{ session('loginError') }}",
                                        icon: 'error',
                                        confirmButtonText: "Oke",
                                    });
                                </script>
                            @endif

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h1 class="text-center mb-4">TranquilHaven</h1>

                            <!-- Email input -->
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"placeholder="email" autofocus required />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="password"
                                    autofocus required />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} checked />
                                        <label class="form-check-label" for="remember"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="{{ route('password-request') }}" data-bs-toggle="modal"
                                        data-bs-target="#formModal">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="login" class="btn btn-secondary mb-3 col">login</button>
                            </div>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Don't have an account? <a href="/register">Register</a></p>
                                <small>or login with:</small>
                            </div>

                            {{-- Login with google --}}
                            <div class="container d-flex justify-content-center mt-2">
                                <a href="{{ route('google.login') }}">

                                    <img class="google-icon" style="width: 40px;"
                                        src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" />
                                </a>
                            </div>

                            {{-- Login with facebook --}}
                            {{-- <div class="container d-flex justify-content-center">
                        <a href="{{ route('facebook.login') }}">
                            <img class="facebook-icon" src="https://w7.pngwing.com/pngs/670/159/png-transparent-facebook-logo-social-media-facebook-computer-icons-linkedin-logo-facebook-icon-media-internet-facebook-icon-thumbnail.png"/>
                        </a>
                    </div> --}}

                        </form>
                    </div>
                </div>
            </div>
        </section>

    </section>

    @include('auth.forgot-password')

    <script src="/js/googleLoginButton.js"></script>
@endsection
