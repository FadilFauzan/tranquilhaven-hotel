@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid px-4">
        <center class="mb-2">
            <h1 class="mt-4 mb-0">All Category</h1>
            <small class="text-secondary">
                All category in TranquilHaven Hotel
            </small>
        </center>

        <a href="/dashboard/categories/create" class="text-decoration-none">
            <button class="btn badge-gradient bg-info text-white" title="Show">
                <span class="fs-6"><i class="fas fa-plus"></i>  Add Category</span>
            </button>
        </a>

        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                TranquilHaven Categories
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr style="vertical-align: middle;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td style="vertical-align: middle; text-align: center;">
                                <div class="d-flex justify-content-center gap-1">
                                    <!-- Tombol Show -->
                                    <a href="/dashboard/categories/{{ $category->slug }}" class="text-decoration-none">
                                        <button class="badge badge-gradient bg-info" title="Show">
                                            <span class="fs-6"><i class="fas fa-eye"></i></span>
                                        </button>
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="text-decoration-none">
                                        <button class="badge badge-gradient bg-warning" title="Edit">
                                            <span class="fs-6"><i class="fas fa-pencil"></i></span>
                                        </button>
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge badge-gradient bg-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                            <span class="fs-6"><i class="fas fa-trash"></i></span>
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
