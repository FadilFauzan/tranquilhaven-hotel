@extends('layouts.main')

<?php
$amenities = ['Free Wi-Fi', 'Mini Bar', 'Room Service', 'Air Conditioning', 'Flat-screen TV', 'Coffee Maker', 'Balcony'];
?>

@section('container')
    <section class="site-section">
        <div class="container" style="max-width: 1000px">
            <a href="/rooms?category={{ $room->category->name }}" class="text-decoration-none" title="Back">
                <span class="text-primary" style="font-size: 27px"><i class="fas fa-arrow-left"></i></span>
            </a>
            <div class="row justify-content-center">
                <!-- Room Image -->
                <div class="col-lg-6 col-md-6 col-12 mb-4">
                    @if ($room->image && file_exists(public_path('storage/' . $room->image)))
                        <img src="{{ asset('storage/' . $room->image) }}" class="img-fluid mt-3" alt="Room Image">
                    @else
                        <img src="{{ asset($room->image) }}" alt="Default Image" class="img-fluid mt-3">
                    @endif
                </div>


                <!-- Room Details -->
                <div class="col-lg-6 col-md-6 col-12 px-5">
                    <h2 class="mb-3">{{ $room->title }}</h2>
                    <p>{{ $room->description }}</p>
                    <hr>
                    <div class="row">
                        <!-- Room Specifications -->
                        <div class="col-md-6 mb-3">
                            <h3>Room Specifications</h3>
                            <ul class="p-3">
                                <li><strong>Guests:</strong> {{ $room->guests }}</li>
                                <li><strong>Size:</strong> {{ $room->size }} ft</li>
                                <li><strong>Price:</strong> ${{ $room->price }}</li>
                            </ul>
                        </div>

                        <!-- Amenities -->
                        <div class="col-md-6 mb-3">
                            <h3>Amenities</h3>
                            <ul class="p-3">
                                @foreach ($amenities as $amenity)
                                    <li>{{ $amenity }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <center>
                        @if ($room->status === 'booked')
                            <p>
                                <button class="btn btn-secondary btn-md mt-3" disabled>
                                    Booked
                                </button>
                            </p>
                        @else
                            <p>
                                <a href="/reservation/{{ $room->slug }}" class="btn btn-primary btn-md mt-3">
                                    Book Now from ${{ number_format($room->price) }}
                                </a>
                            </p>
                        @endif
                    </center>
                </div>
            </div>
            <hr>
            <!-- Container for Disqus Comments -->
            <div class="container rounded mt-4 p-3" style="background-color:white">
                @include('partials.disqus')
            </div>
        </div>
    </section>
@endsection
