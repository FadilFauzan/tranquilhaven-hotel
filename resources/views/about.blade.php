@extends('layouts.main')

@section('container')

<?php
    $heroTitle = "About TranquilHaven Hotel";
    $description = "Discover our world's luxury room For VIP.";
    $backgroundImage = 'img/bg12.jpg';  
    $showButton = false; // Tombol Book Now disembunyikan
?>
@include('partials.heroSection');

    <section class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="heading-wrap  element-animate">
                        <h4 class="sub-heading">Stay with our Hotel</h4>
                        <h2 class="heading">Our Story</h2>
                        <p class="">Welcome to our luxurious beachside retreat, where the azure waves kiss the golden
                            sands, and tranquility reigns supreme. Our journey began with a vision to create an oasis that
                            blends comfort and elegance, inviting guests to escape the ordinary.</p>
                        <p>At our hotel, each room is designed with meticulous attention to detail, offering breathtaking
                            views and unparalleled service. Whether you're here for a romantic getaway or a family vacation,
                            we strive to provide an unforgettable experience filled with warmth and hospitality.</p>
                        <p>Join us as we celebrate the beauty of the coast and the joy of relaxation. Discover your home
                            away from home, where every moment is crafted for your comfort and enjoyment. Welcome to
                            paradise!</p>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <img src="img/f_img_1.png" alt="Image placeholder" class="img-md-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->
@endsection
