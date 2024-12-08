@extends('dashboard.layouts.main')

@section('container')
    @if (session('login'))
        <div class="alert alert-success alert-dismissible fade show mt-4" id="success-alert" role="alert">
            {{ session('login') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" id="success-alert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $greeting }}, {{ ucwords(auth()->user()->name) }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            <!-- Card for Members -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-primary text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">Users</h5>
                        <div class="custom-card-number"><i class="fas fa-users fs-2"></i> {{ $totalUsers }}</div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/users">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card for Rooms -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-success text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">Rooms</h5>
                        <div class="custom-card-number"><i class="fas fa-house-user fs-2"></i> {{ $totalRooms }}</div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/rooms">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card for Room Categories -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-danger text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">Room Categories</h5>
                        <div class="custom-card-number"><i class="fas fa-layer-group fs-2"></i> {{ $totalCategories }}</div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/categories">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- Card for Booked Rooms -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-booked text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">Booked Rooms</h5>
                        <div class="custom-card-number"><i class="fas fa-bed fs-2"></i> {{ $totalBookedRooms }}</div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/rooms/booked">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
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
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Guests</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created at</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($rooms as $room)
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
                                <td>{{ $room->created_at }}</td>
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
