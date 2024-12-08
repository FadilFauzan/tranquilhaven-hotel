{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <h2 class="mb-4 text-white">Post Categories</h2>

        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="/posts?category={{ $category->slug }}" class="text-white text-decoration-none">
                            <div class="card mb-3">
                                <img src="https://source.unsplash.com/1000x700/?/{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-3 " style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</a></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
