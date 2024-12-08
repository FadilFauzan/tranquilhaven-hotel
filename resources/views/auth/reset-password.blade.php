@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center" style="margin: 110px 0px 90px 0px">
    <form action="{{ route('password.update') }}" method="post" class="col-10 col-lg-6 col-md-6 col-xl-3">
        @csrf
        {{-- @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $errors )
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('status') }}
            </div>
        @endif --}}
        
        <h2 class="text-center mb-4 text-primary">Reset Password</h2>

        <input type="hidden" name="token" value="{{ request()->token }}">
        <input type="hidden" name="email" value="{{ request()->email }}">

        <!-- Form input -->
        @foreach(['password' => 'New Password', 
                'password_confirmation' => 'Confirm New Password'] as $resetPassword => $label)

            <div class="form-floating mb-3">
                <input type="password" name="{{ $resetPassword }}" id="{{ $resetPassword }}" class="form-control 
                    @error($resetPassword) is-invalid @enderror" placeholder="{{ $label }}" autofocus required/>
                <label for="{{ $resetPassword }}">{{ $label }}</label>
                @error($resetPassword)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endforeach

        <div class="d-flex justify-content-end">
            <button type="submit" name="reset" class="btn btn-primary mb-3 col">Update Password</button>
        </div>
    </form>
</div>

@endsection