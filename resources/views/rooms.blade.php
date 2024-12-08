@extends('layouts.main')

@section('container')
    @if ($rooms->currentPage() === 1)
        @include('partials.heroSection', [
            'heroTitle' => $heroTitle,
            'description' => $description,
            'backgroundImage' => $backgroundImage,
            'showButton' => false,
        ])
    @endif

    @if ($rooms->count())
        <section class="site-section" style="background: #e3e1e1" id="room">
            <center class="mb-5">
                <h1>{{ $title }}</h1>
                <p style="font-size: 23px">Available Rooms: {{ $availableRooms }}/{{ $totalRooms }}</p>
            </center>
            <div class="container">
                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-md-4 mb-4">
                            <div class="media d-block room mb-0">
                                <figure>
                                    @if ($room->image && file_exists(public_path('storage/' . $room->image)))
                                        <img src="{{ asset('storage/' . $room->image) }}" class="img-fluid" alt="Room Image">
                                    @else
                                        <img src="{{ asset($room->image) }}" alt="Default Image" class="img-fluid">
                                    @endif

                                    {{-- Overlay tulisan "Booked" jika status booked --}}
                                    @if ($room->status === 'booked')
                                        <div class="room-status-booked">Booked</div>
                                    @endif

                                    <div class="overlap-text">
                                        <span>
                                            Featured Room
                                            <span class="ion-ios-star"></span>
                                            <span class="ion-ios-star"></span>
                                            <span class="ion-ios-star"></span>
                                        </span>
                                    </div>
                                </figure>
                                <div class="media-body">
                                    <h3 class="mt-0"><a href="/room/{{ $room->slug }}">{{ $room->title }}</a></h3>
                                    <ul class="room-specs">
                                        <li><span class="ion-ios-people-outline"></span>{{ $room->guests }} Guests</li>
                                        <li><span class="ion-ios-crop"></span>{{ $room->size }}ft</li>
                                    </ul>
                                    <p>{{ Str::limit(strip_tags($room->description, 200)) }}</p>
                                    <p><a href="/room/{{ $room->slug }}" class="btn btn-primary btn-sm">Read more </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="d-flex justify-content-center my-2">
                {{ $rooms->links() }}
            </div>

        </section>
    @else
        <p class="text-center fs-4">No Room Found.</p>
    @endif
@endsection
