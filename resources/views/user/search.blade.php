@extends('layouts.usernav')

@section('content')
    <div class="flex flex-col w-full p-4">
        <div class="col-span-3">
            <!-- Search Bar -->
            <div class="w-full max-w-xl relative hidden md:flex mb-4">
                <form action="{{ route('hotel.search') }}" method="GET" class="w-full flex">
                    <span class="absolute left-4 top-3 text-lg text-gray-500">
                        <i class="ri-search-line"></i>
                    </span>
                    <input type="text" name="query" id="search"
                        class="w-full border border-blue-500 pl-12 py-3 rounded-l-md focus:outline-none"
                        placeholder="Search">
                    <button
                        class="bg-blue-500 text-white px-6 rounded-md hover:bg-transparent hover:text-blue-500 transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- Room Listings -->
            @if ($rooms->isEmpty())
                <div class="flex justify-center items-center w-full mt-8">
                    <p class="text-lg text-gray-700">No rooms found. Please try a different search option.</p>
                </div>
            @else
                <div class="flex flex-wrap -mx-4">
                    @foreach ($rooms as $room)
                        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                            <div
                                class="rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 bg-gray-300 overflow-hidden">
                                <img src="{{ asset('images/rooms/' . $room->photo) }}" alt=""
                                    class="w-full h-48 object-cover rounded-t-lg">
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $room->name }}</h3>
                                    <p class="text-sm text-gray-700 mb-2">{{ $room->description }}</p>
                                    <p class="text-sm text-gray-700 mb-1"><strong>Price:</strong> Rs {{ $room->price }}</p>
                                    <p class="text-sm text-gray-700 mb-1"><strong>Capacity:</strong> {{ $room->capacity }}
                                        people</p>
                                    <p class="text-sm text-gray-700 mb-4"><strong>Status:</strong> {{ $room->status }}</p>
                                    <div class="mt-4">
                                        <a href="{{ route('user.view', $room->id) }}"
                                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-300">Book
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
