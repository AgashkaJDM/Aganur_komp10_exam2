@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="card border-0 rounded-4 shadow-sm p-5">
                    <span class="badge badge-soft rounded-pill px-3 py-2">Model</span>
                    <h1 class="display-6 fw-bold mt-3">{{ $model->getName() }}</h1>
                    <p class="text-secondary mb-4">Discover the latest vehicles built around {{ $model->getName() }}. Browse Japanese cars and explore detailed specs for this model.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('cars.index', ['modeliId' => $model->id]) }}" class="btn btn-primary rounded-pill">View {{ $model->getName() }} cars</a>
                        <a href="{{ route('modeli.index') }}" class="btn btn-outline-secondary rounded-pill">Back to models</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card bg-primary text-white border-0 rounded-4 shadow-sm h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h2 class="h5 fw-semibold mb-1">Model summary</h2>
                            <p class="mb-0 text-white-75">Overview of available cars and key details.</p>
                        </div>
                        <i class="bi bi-speedometer2 fs-2"></i>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between align-items-center py-3 border-bottom border-white-10">
                            <span>Available cars</span>
                            <strong>{{ $model->cars->count() }}</strong>
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-3 border-bottom border-white-10">
                            <span>Model type</span>
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
                    <h2 class="h5 fw-semibold mb-1">Cars for {{ $model->getName() }}</h2>
                    <p class="text-muted mb-0">Browse all vehicles available in this model category.</p>
                </div>
                <a href="{{ route('cars.index', ['modeliId' => $model->id]) }}" class="text-decoration-none text-primary">See full list</a>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @forelse ($model->cars as $car)
                    @include('client.partials.car-card')
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">No cars found for this model.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
