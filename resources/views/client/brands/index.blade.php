@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="h3 mb-3">
                Restaurants
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
            @forelse ($restaurants as $restaurant)
                <div class="col">
                    <a href="{{ route('restaurants.show', $restaurant->id) }}" class="text-decoration-none text-dark">
                        <div class="border border-1 p-3 rounded-2 h-100">
                            <div class="position-relative">
                                <img src="{{ asset('img/meal.jpg') }}" class="img-fluid rounded-2" alt="">
                            </div>
                            <div class="h5 mb-auto mt-2">
                                {{ $restaurant->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-warning">
                        Restaurants not found :(
                    </div>
                </div>
            @endempty
        </div>

        <div class="mt-4">
            {{ $restaurants->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection