@extends('layouts.usernav')

@section('content')
    <div class="flex flex-col w-full p-4">
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <form method="get" action="{{ route('hotel.sort') }}">
                    <div class="flex items-center mb-4">
                        <select name="sort" id="sort"
                            class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-blue-600 focus:border-blue-600"
                            onchange="this.form.submit()">
                            <option value="">Default sorting</option>
                            <option value="price-low-to-high"
                                {{ request('sort') == 'price-low-to-high' ? 'selected' : '' }}>Price low to high</option>
                            <option value="price-high-to-low"
                                {{ request('sort') == 'price-high-to-low' ? 'selected' : '' }}>Price high to low</option>
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest products
                            </option>
                        </select>
                    </div>
                </form>
            </div>

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
        </div>
    </div>
@endsection
