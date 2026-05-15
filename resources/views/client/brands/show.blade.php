@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="card border-0 rounded-4 shadow-sm p-5">
                    <span class="badge badge-soft rounded-pill px-3 py-2">Brand</span>
                    <h1 class="display-6 fw-bold mt-3">{{ $brand->name }}</h1>
                    <p class="text-secondary mb-4">Discover the latest vehicles and highlights from {{ $brand->name }}. Explore quality Japanese engineering and performance with ease.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('cars.index', ['brandId' => $brand->id]) }}" class="btn btn-primary rounded-pill">View {{ $brand->name }} cars</a>
                        <a href="{{ route('brands.index') }}" class="btn btn-outline-secondary rounded-pill">Back to brands</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card bg-primary text-white border-0 rounded-4 shadow-sm h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h2 class="h5 fw-semibold mb-1">Brand summary</h2>
                            <p class="mb-0 text-white-75">Curated collection of vehicles available now.</p>
                        </div>
                        <i class="bi bi-star-fill fs-2"></i>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between align-items-center py-3 border-bottom border-white-10">
                            <span>Available cars</span>
                            <strong>{{ $brand->cars->count() }}</strong>
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-3 border-bottom border-white-10">
                            <span>Brand type</span>
                            <strong>Japanese</strong>
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-3">
                            <span>Explore</span>
                            <strong>Fast & easy</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h5 fw-semibold mb-1">Cars from {{ $brand->name }}</h2>
                    <p class="text-muted mb-0">Browse all vehicles in this brand collection.</p>
                </div>
                <a href="{{ route('cars.index', ['brandId' => $brand->id]) }}" class="text-decoration-none text-primary">See full list</a>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @forelse ($brand->cars as $car)
                    @include('client.partials.car-card')
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">No cars found for this brand.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection