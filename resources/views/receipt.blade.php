@extends('layouts.main')

@section('container')
    <section class="site-section col-lg-4 mx-auto py-5">
        <div class="container">
            <!-- Card for Payment Receipt -->
            <div class="card shadow-lg border-light mt-4">
                <div class="card-body">
                    <h2 class="text-center mb-4">TranquilHaven Hotel</h2>
                    <div class="text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/7518/7518748.png" alt="Success"
                            class="img-fluid mb-3" width="100" />
                        <h3 class="text-success">Payment Successful</h3>
                        <p class="mt-3" style="font-size: 16px"><strong>Order ID:</strong> {{ $transaction->order_id }}</p>
                    </div>
                    <!-- Transaction Details -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $transaction->name }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $transaction->phone }}</li>
                        <li class="list-group-item"><strong>Amount:</strong>
                            Rp{{ number_format($transaction->gross_amount, 0, ',', '.') }}
                        </li>
                        <li class="list-group-item"><strong>Date:</strong> 
                            {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y, H:i') }}
                        </li>
                        <li class="list-group-item"><strong>Status:</strong> <span class="text-success">Success</span></li>
                    </ul>

                    <!-- Room Details -->
                    <h4 class="mt-4">Room Details</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $room->title }}</li>
                        <li class="list-group-item"><strong>Category:</strong> {{ $room->category->name }}</li>
                        <li class="list-group-item"><strong>Size:</strong> {{ $room->size }} ft</li>
                        <li class="list-group-item"><strong>Guests:</strong> {{ $room->guests }} people</li>
                    </ul>

                    <!-- Alert for Screenshot Warning -->
                    <div class="alert alert-warning mt-4 text-center" role="alert">
                        <strong>Success!</strong> Your payment has been processed. For your reference, please take a screenshot of
                        this page as your payment proof. If you have any questions or need assistance, feel free to contact our
                        support team.
                    </div>

                    <div class="text-center mt-4">
                        <a href="/" class="btn btn-primary px-5 py-2">Back to Home</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
