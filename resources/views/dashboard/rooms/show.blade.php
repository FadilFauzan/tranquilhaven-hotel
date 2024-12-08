@extends('dashboard.layouts.main')

@section('container')
    <section class="mt-4 container-fluid" style="max-width: 1000px">
        <a href="/dashboard/rooms" class="text-decoration-none">
            <button class="btn btn-success">
                <div class="text-white"><i class="fas fa-arrow-left me-2"></i>Back to All Room</div>
            </button>
        </a>

        <a href="/dashboard/rooms/{{ $room->slug }}/edit" class="text-decoration-none">
            <button class="btn btn-warning">
                <div class="text-white"><i class="fas fa-pencil me-2"></i>edit</div>
            </button>
        </a>

        <form action="/dashboard/rooms/{{ $room->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger " onclick="return confirm('Are you sure?')">
                <div class="text-white"><i class="fas fa-trash me-2"></i>Delete</div>
            </button>
        </form>

        <div class="row mt-4">

            <!-- Room Image -->
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                @if ($room->image && file_exists(public_path('storage/' . $room->image)))
                    <img src="{{ asset('storage/' . $room->image) }}" class="img-fluid" alt="Room Image">
                @else
                    <img src="{{ asset($room->image) }}" alt="Default Image" class="img-fluid">
                @endif
            </div>

            <!-- Room Details -->
            <div class="col-lg-6 col-md-12 col-sm-12 px-5" style="background: white; border-radius: 10px">
                <h2 class="mb-3">{{ $room->title }}</h2>
                <p>{{ $room->description }}</p>
                <hr>
                <div class="row">
                    <!-- Room Specifications -->
                    <div class="col-md-6 col-sm-6 mb-3">
                        <h3>Room Specifications</h3>
                        <ul class="p-3">
                            <li><strong>Guests:</strong> {{ $room->guests }}</li>
                            <li><strong>Size:</strong> {{ $room->size }} ft</li>
                            <li><strong>Price:</strong> ${{ $room->price }}</li>
                        </ul>
                    </div>

                    <!-- Amenities -->
                    <div class="col-md-6 col-sm-6 mb-3">
                        <h3>Amenities</h3>
                        <ul class="p-3">
                            @foreach ($amenities as $amenity)
                                <li>{{ $amenity }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <hr>

            </div>
        </div>
    </section>
@endsection
