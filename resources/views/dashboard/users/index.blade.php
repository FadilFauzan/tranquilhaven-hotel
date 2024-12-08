@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid px-4">
        <center class="mb-2">
            <h1 class="mt-4 mb-0">All User</h1>
            <small class="text-secondary">
                All user in TranquilHaven Hotel
            </small>
        </center>

        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                TranquilHaven Users
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Join at</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sortedUsers as $user)
                        <tr style="vertical-align: middle;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                            <td style="vertical-align: middle; text-align: center;">
                                <div class="d-flex justify-content-center gap-1">
                                    <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="is_admin" value="{{ $user->is_admin ? '0' : '1' }}">
                                        <button type="submit" class="badge bg-{{ $user->is_admin ? 'danger' : 'info' }} badge-gradient border-0" 
                                            onclick="return confirm('Are you sure?')" title="{{ $user->is_admin ? 'Unadmin' : 'Make Administrator' }}"
                                            style="{{ $user->username === 'fadilfauzan' ? 'display: none' : '' }}">
                                            <i class="fs-6 fas {{ $user->is_admin ? 'fa-user-minus' : 'fa-user-plus' }} text-white"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger badge-gradient border-0" onclick="return confirm('Are you sure?')" title="Delete"
                                            style="{{ $user->username === 'fadilfauzan' ? 'display: none' : '' }}">
                                            <i class="fs-6 fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        // Menggunakan jQuery untuk menyembunyikan pesan alert setelah 5 detik
        setTimeout(function() {
            $("#success-alert").fadeOut(500);
        }, 5000); // 5000 milidetik (5 detik)
    </script>
@endsection
