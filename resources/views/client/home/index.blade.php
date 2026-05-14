@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg my-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    @lang('app.welcome')
                </h1>
            </div>
        </div>

        <div class="my-3">
            <a href="{{ route('restaurants.index') }}" class="text-decoration-none h4">
                <i class="bi bi-arrow-right-circle text-success me-2"></i>
                {{ __('app.categories') }}
            </a>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mt-2">
                @foreach ($categories as $category)
                    <div class="col">
                        <a href="{{ route('foods.index', ['categoryId' => $category->id]) }}" class="text-decoration-none text-dark">
                            <div class="border border-1 p-3 rounded-2 h-100">
                                <!-- <div class="position-relative">
                                            <img src="{{ asset('img/meal.jpg') }}" class="img-fluid rounded-2" alt="">
                                        </div> -->
                                <div class="h5 mb-auto mt-2">
                                    {{ $category->getName() }}
                                </div>
                            </div>
                        </a>
                    </div>      
                @endforeach
            </div>
        </div>

        <div class="my-3 mt-5">
            <a href="{{ route('restaurants.index') }}" class="text-decoration-none h4">
                <i class="bi bi-arrow-right-circle text-success me-2"></i>
                {{ __('app.allRestaurants') }}
            </a>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mt-2">
                @foreach ($restaurants as $restaurant)
                    <div class="col">
                        <a href="{{ route('foods.index', ['restaurantId' => $restaurant->id]) }}" class="text-decoration-none text-dark">
                            <div class="border border-1 p-3 rounded-2 h-100">
                                <!-- <div class="position-relative">
                                            <img src="{{ asset('img/meal.jpg') }}" class="img-fluid rounded-2" alt="">
                                        </div> -->
                                <div class="h5 mb-auto mt-2">
                                    {{ $restaurant->name }}
                                </div>
                            </div>
                        </a>
                    </div>      
                @endforeach
            </div>
        </div>

        <div class="mt-5">
            <a href="{{ route('foods.index') }}" class="text-decoration-none h4">
                <i class="bi bi-arrow-right-circle text-success me-2"></i>
                {{ __('app.allFoods') }}
            </a>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mt-2">
                @foreach ($foods as $food)
                    @include('client.partials.food-card')
                @endforeach
            </div>
        </div>
    </div>

@endsection