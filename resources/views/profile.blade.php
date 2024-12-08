@extends('layouts.main')

@section('container')
    <section class="site-section" style="background: #e3e1e1">
        <div class="container">
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

            <div class="profile-section">
                {{-- Form Edit Profil --}}
                <div class="profile-form">
                    <h2 class="mb-5 text-center">Profile Form</h2>
                    <form action="/profile/{{ auth()->user()->username }}/edit" method="post" enctype="multipart/form-data"
                        id="profileForm">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ auth()->user()->name }}" oninput="checkFormChanges()" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username"
                                    value="{{ auth()->user()->username }}" oninput="checkFormChanges()" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}" oninput="checkFormChanges()" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" class="form-control" name="phone"
                                    value="{{ auth()->user()->phone }}" oninput="checkFormChanges()">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="image" class="form-label">Profile Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image" onchange="checkFormChanges();">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="bio">Bio</label>
                                <textarea id="bio" name="bio" class="form-control" cols="30" rows="7"
                                    placeholder="Write a brief bio about yourself" oninput="checkFormChanges()">{{ auth()->user()->bio }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="submit" value="Save Changes" class="btn btn-primary" id="saveChangesButton"
                                    disabled>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Overview Profil --}}
                <div class="profile-overview">
                    <h3 class="mb-5">Profile Overview</h3>
                    <p class="mb-5">
                        <img id="profileImage"
                            src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg') }}"
                            alt="Profile Image" class="img-fluid">
                    </p>

                    <div id="profileDescription">
                        <p>Keep your profile information current to enhance your experience. Ensure you update your contact
                            details and add a recent photo for a more personalized touch.</p>
                    </div>

                    <div class="alert alert-warning fade show " role="alert">
                        If you log in using Google, your default password is "password", immediately change your password
                        for further security
                    </div>

                    <div class="mt-2">
                        <button type="button" name="change_password" class="btn btn-primary mb-3 col"
                            data-bs-toggle="modal" data-bs-target="#formModal">Change Password
                        </button>
                    </div>

                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-danger rounded" type="submit"
                            onclick="return confirm('Want to log out? Don’t forget to come back!')">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('auth.change-password')

    <script>
        const originalData = {
            name: "{{ auth()->user()->name }}",
            username: "{{ auth()->user()->username }}",
            email: "{{ auth()->user()->email }}",
            phone: "{{ auth()->user()->phone ?? '' }}",
        };

        function checkFormChanges() {
            const form = document.querySelector('#profileForm');
            const saveButton = document.querySelector('#saveChangesButton');

            const name = form.name.value;
            const username = form.username.value;
            const email = form.email.value;
            const phone = form.phone.value;
            const image = form.image.files[0];

            // Check if any value has changed or if a new image is uploaded
            const isChanged =
                name !== originalData.name ||
                username !== originalData.username ||
                email !== originalData.email ||
                phone !== originalData.phone ||
                image !== undefined;

            saveButton.disabled = !isChanged; // Enable or disable the button
        }

        // Ensure button remains disabled on page load
        document.addEventListener('DOMContentLoaded', () => {
            checkFormChanges();
        });
    </script>
@endsection
