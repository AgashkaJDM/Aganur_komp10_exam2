@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="badge badge-soft rounded-pill px-3 py-2 mb-3">Discover Japan</span>
                <h1 class="display-5 fw-bold">{{ __('app.welcome') }}</h1>
                <p class="lead text-secondary mt-4">Browse the latest models, explore top brands, and find the perfect car with elegant, intuitive design.</p>
                <div class="mt-4 d-flex flex-wrap gap-2">
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg rounded-pill">Browse Cars</a>
                    <a href="{{ route('brands.index') }}" class="btn btn-outline-primary btn-lg rounded-pill">Explore Brands</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card hero-card shadow-sm overflow-hidden border-0 hero-feature">
                    <img src="{{ asset('img/foood.jpg') }}" class="card-img-top card-img-cover" alt="Japanese automotive showcase">
                </div>
            </div>
        </div>

        <section class="mt-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
                <div>
                    <h2 class="h4 fw-semibold">Featured Cars</h2>
                    <p class="text-muted mb-0">Handpicked models from top brands.</p>
                </div>
                <a href="{{ route('cars.index') }}" class="text-decoration-none text-primary">View all cars</a>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @forelse ($cars as $car)
                    @include('client.partials.car-card')
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">No cars available right now.</div>
                    </div>
                @endforelse
            </div>
        </section>

        <section class="mt-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
                <div>
                    <h2 class="h4 fw-semibold">Browse Models</h2>
                    <p class="text-muted mb-0">Filter by your favorite model line.</p>
                </div>
                <a href="{{ route('modeli.index') }}" class="text-decoration-none text-primary">View all models</a>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @forelse ($models as $model)
                    <div class="col">
                        <a href="{{ route('cars.index', ['modeliId' => $model->id]) }}" class="text-decoration-none">
                            <div class="card card-hover h-100 border-0 shadow-sm p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="badge badge-soft rounded-pill px-3 py-2">Model</div>
                                    <i class="bi bi-speedometer2 fs-4 text-primary"></i>
                                </div>
                                <h5 class="mb-2 text-dark">{{ $model->getName() }}</h5>
                                <p class="text-muted small mb-0">View cars in this line</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">No models found.</div>
                    </div>
                @endforelse
            </div>
        </section>

        <section class="mt-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
                <div>
                    <h2 class="h4 fw-semibold">Top Brands</h2>
                    <p class="text-muted mb-0">Explore the most searched Japanese car brands.</p>
                </div>
                <a href="{{ route('brands.index') }}" class="text-decoration-none text-primary">View all brands</a>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @forelse ($brands as $brand)
                    <div class="col">
                        <a href="{{ route('brands.show', $brand->id) }}" class="text-decoration-none">
                            <div class="card card-hover h-100 border-0 shadow-sm p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="badge badge-soft rounded-pill px-3 py-2">Brand</div>
                                    <i class="bi bi-building fs-4 text-primary"></i>
                                </div>
                                <h5 class="mb-2 text-dark">{{ $brand->name }}</h5>
                                <p class="text-muted small mb-0">Browse vehicles from this brand.</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">No brands found.</div>
                    </div>
                @endforelse
            </div>
        </section>
    </div>
@endsection