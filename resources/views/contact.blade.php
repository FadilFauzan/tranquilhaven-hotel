@extends('layouts.main')

@section('container')
    <?php
    $heroTitle = 'Contact Us';
    $description = 'Get in touch to learn about our exclusive VIP Luxury Room services.';
    $backgroundImage = 'img/bg21.jpg';
    $showButton = false;
    ?>
    @include('partials.heroSection');

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h2 class="mb-5">Contact Form</h2>
                    <form action="{{ route('send.to.whatsapp') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 text-justify">
                    <h2 class="mb-5">Get in Touch with Us</h2>
                    {{-- <img src="/img/bg.jpeg" class="image-fluid" alt=""> --}}
                    <p>
                        Have questions or need assistance with your booking? We're here to help!
                    </p>
                    <p>
                        Whether you want to inquire about room availability, request special services, or share feedback,
                        feel free to reach out to us using the form. Our team is dedicated to ensuring your experience with
                        us is smooth and enjoyable.
                    </p>
                    <ul>
                        <li><strong>Quick response</strong> within 24 hours.</li>
                        <li><strong>Personalized support</strong> tailored to your needs.</li>
                        <li><strong>Hassle-free solutions</strong> for any concerns.</li>
                    </ul>
                    <p>
                        Start planning your perfect stay with us today! 😊
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
