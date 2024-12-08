@extends('layouts.main')

@section('container')
    <section class="site-section col-lg-6 mx-auto d-flex justify-content-center align-items-center">
        <div class="container">
            <a href="/room/{{ $room->slug }}" class="text-decoration-none" title="Back">
                <span class="text-primary" style="font-size: 27px"><i class="fas fa-arrow-left"></i></span>
            </a>

            <center>
                <h2 class="mb-5">Reservation Confirmation</h2>
            </center>
            <form action="/reservation/{{ $room->slug }}" method="post">
                @csrf
                <div class="reservation-details">
                    <center>
                        <h3 class="mb-4">Your Reservation Details</h3>
                    </center>
                    <p><strong>Name:</strong> {{ $room->title }}</p>
                    <p><strong>Room Type:</strong> {{ $room->category->name }}</p>
                    <p><strong>Guest Count:</strong> {{ $room->guests }} people</p>
                    <p><strong>Amount:</strong> ${{ number_format($amount) }}</p>

                    <!-- Data input lainnya -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="first_name" id="name" class="form-control"
                            value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" name="phone" id="phone" class="form-control"
                            value="{{ auth()->user()->phone }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <center>
                        <button type="submit" id="pay-button" class="btn btn-primary">Pay Now</button>
                    </center>
                </div>
            </form>
        </div>
    </section>

    @if (isset($snapToken))
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <script>
            document.getElementById('pay-button').addEventListener('click', function(e) {
                e.preventDefault();
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        console.log(result);
                        // window.location.href = "/receipt/receipt";
                        window.location.href = `/receipt/${result.order_id}`;
                        alert('Payment successful!');
                    },
                    onPending: function(result) {
                        console.log(result);
                        alert('Waiting for payment...');
                    },
                    onError: function(result) {
                        console.log(result);
                        alert('Payment failed!');
                    }
                });
            });
        </script>
    @endif
@endsection
