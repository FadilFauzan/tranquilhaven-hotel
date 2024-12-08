@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <center class="mb-2">
            <h1 class="mt-4 mb-0">{{ $title }}</h1>
            <small class="text-secondary">
                {{ $subtitle }}
            </small>
            <h5 class="text-end">Available rooms: {{ $availableRooms }}/{{ $totalRooms }}</h5>
        </center>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                TranquilHaven Categories
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr style="vertical-align: middle;">
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created at</th>
                            <th scope="col" class="d-flex justify-content-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->author->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Show -->
                                        <a href="/dashboard/rooms/{{ $category->slug }}" class="text-decoration-none">
                                            <button class="badge badge-gradient bg-info" title="Show">
                                                <span class="fs-6"><i class="fas fa-eye"></i></span>
                                            </button>
                                        </a>

                                        <!-- Tombol Edit -->
                                        <a href="/dashboard/rooms/{{ $category->slug }}/edit" class="text-decoration-none">
                                            <button class="badge badge-gradient bg-warning" title="Edit">
                                                <span class="fs-6"><i class="fas fa-pencil"></i></span>
                                            </button>
                                        </a>

                                        <!-- Tombol Delete -->
                                        <form action="/dashboard/rooms/{{ $category->slug }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge badge-gradient bg-danger"
                                                onclick="return confirm('Are you sure?')" title="Delete">
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
@endsection
