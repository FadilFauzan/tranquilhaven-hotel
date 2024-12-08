@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="col-md-10 col-xl-8 col-lg-10">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Edit Room</h2>
            </div>
            <form action="/dashboard/rooms/{{ $room->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $room->title) }}" autofocus required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug', $room->slug) }}" autofocus required>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id" autofocus>
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            @if (old('category_id', $room->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="guests" class="form-label">Guests</label>
                    <select class="form-select" name="guests" autofocus>
                        <option value="{{ old('guests') }}" selected disabled>{{ $room->guests }}</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('guests')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="number" class="form-control @error('size') is-invalid @enderror" id="size"
                        name="size" value="{{ old('size', $room->size) }}" autofocus required>
                    @error('size')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label d-block">Room Image</label>
                    <input type="hidden" name="oldImage" value="{{ $room->image }}">

                    @if ($room->image && file_exists(public_path('storage/' . $room->image)))
                        <img src="{{ asset('storage/' . $room->image) }}"
                            class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                    @else
                        <img src="{{ asset($room->image) }}"
                            class="img-preview img-fluid mb-3 col-sm-5" >
                    @endif

                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price (USD)</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price', $room->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <textarea class="form-control" name="description" id="description" rows="3" autofocus>{{ old('description', $room->description) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn badge-gradient bg-info text-white mb-5" title="Edit">
                        <span class="fs-6">Edit Room</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
