@extends('layouts.main')

@section('container')
    <section style="background: rgba(0,0,0,1); background-image: url('img/bg_2.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">

        <section class="site-section">
            <div class="container">
                <div class="auth-form">
                    <form action="/register" method="post">
                        @csrf
                        <h1 class="text-center mb-4">Registration Form</h1>

                        <!-- Name input -->
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                value="{{ old('name') }}" autofocus required />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Username input -->
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror" placeholder="username"
                                value="{{ old('username') }}" autofocus required />
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-2">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                                value="{{ old('email') }}"autofocus required />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                autofocus required />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="register" class="btn btn-secondary mb-4">Register</button>
                        </div>

                        <!-- Login buttons -->
                        <div class="text-center">
                            <p>Already registered? <a href="/login">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection
