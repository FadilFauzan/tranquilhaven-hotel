@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid px-4">
    <center class="mb-2">
        <h1 class="mt-4 mb-0">Booked Room</h1>
    </center>
    
    <a href="/dashboard/rooms/" class="text-decoration-none">
        <button class="btn badge-gradient bg-info text-white" title="Show">
            <span class="fs-6"><i class="fas fa-home-user"></i> All Room</span>
        </button>
    </a>

    @if (session()->has('success'))
        <div id="success-alert" class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div id="error-alert" class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="card mb-4 mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            TranquilHaven Rooms
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Guests</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookedRooms as $room)
                        <tr style="vertical-align: middle;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $room->title }}</td>
                            <td>{{ $room->category->name }}</td>
                            <td>{{ Str::limit($room->description, 100) }}</td>
                            <td>{{ $room->guests }}</td>
                            <td>{{ $room->size }} ft</td>
                            <td>${{ $room->price }}</td>
                            <td>
                                @if ($room->status === 'booked')
                                    <span class="badge bg-success">Booked</span>
                                @else
                                    <span class="badge bg-primary">Open</span>
                                @endif
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <div class="d-flex justify-content-center gap-1">
                                    <!-- Tombol Show -->
                                    <a href="/dashboard/rooms/{{ $room->slug }}" class="text-decoration-none">
                                        <button class="badge badge-gradient bg-info" title="Show">
                                            <span class="fs-6"><i class="fas fa-eye"></i></span>
                                        </button>
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="/dashboard/rooms/{{ $room->slug }}/edit" class="text-decoration-none">
                                        <button class="badge badge-gradient bg-warning" title="Edit">
                                            <span class="fs-6"><i class="fas fa-pencil"></i></span>
                                        </button>
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="/dashboard/rooms/{{ $room->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge badge-gradient bg-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                            <span class="fs-6"><i class="fas fa-trash"></i></span>
                                        </button>
                                    </form>

                                    <!-- Tombol Update Status -->
                                    <form action="/dashboard/rooms/{{ $room->slug }}/status" method="post" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        @if ($room->status === 'booked')
                                            <button class="badge badge-gradient bg-primary" onclick="return confirm('Set status to open?')" title="Set Open">
                                                <span class="fs-6"><i class="fas fa-undo"></i></span>
                                            </button>
                                        @else
                                            <button class="badge badge-gradient bg-success" onclick="return confirm('Set status to booked?')" title="Set Booked">
                                                <span class="fs-6"><i class="fas fa-check"></i></span>
                                            </button>
                                        @endif
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
        $("#success-alert, #error-alert").fadeOut(500);
    }, 5000); // 5000 milidetik (5 detik)
</script>
@endsection
