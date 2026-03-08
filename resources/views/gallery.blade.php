@extends('layouts.index')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-8">
        Photo Gallery
    </h1>


    <div class="bg-white p-6 rounded-xl shadow mb-10">

        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data"
            class="grid md:grid-cols-4 gap-4">
            @csrf

            <input type="file" name="image" class="border p-2 rounded w-full">

            <input type="text" name="photographer_name" placeholder="Photographer name" class="border p-2 rounded w-full">

            <select name="type" class="border p-2 rounded w-full">

                <option value="">Select type</option>
                <option>Nature</option>
                <option>Pets</option>
                <option>Landscape</option>
                <option>Portrait</option>

            </select>

            <button type="submit" class="bg-blue-500 text-white rounded hover:bg-blue-600">

                Upload

            </button>

        </form>

    </div>


    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach ($photos as $photo)
            <div class="bg-white rounded-xl shadow overflow-hidden">

                <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-48 object-cover">

                <div class="p-4">

                    <p class="font-semibold">
                        {{ $photo->photographer_name }}
                    </p>

                    <p class="text-sm text-gray-500 mb-3">
                        {{ $photo->type }}
                    </p>

                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="w-full bg-red-500 text-white py-1 rounded hover:bg-red-600">

                            Delete

                        </button>

                    </form>

                </div>

            </div>
        @endforeach

    </div>
@endsection
