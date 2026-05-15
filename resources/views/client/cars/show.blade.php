@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card hero-card shadow-sm overflow-hidden">
                    <img src="{{ asset($car->image_1 ? 'img/' . $car->image_1 : 'img/image2.jpg') }}" class="card-img-top card-img-cover" alt="{{ $car->image_1_name ?? $car->name }}">
                    <div class="card-body px-5 py-5">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
                            <div>
                                <span class="badge badge-soft rounded-pill px-3 py-2">Featured</span>
                                <h1 class="display-6 fw-bold mt-3 mb-2">{{ $car->name }}</h1>
                                <p class="text-muted mb-0">{{ $car->brand->name }} • {{ $car->modeli->name }}</p>
                            </div>
                            <div class="text-md-end">
                                <div class="text-muted small">
                                    <i class="bi bi-calendar-event me-1"></i>{{ $car->created_at->format('d.m.Y') }}
                                </div>
                                <div class="mt-3 text-muted small">
                                    <span class="me-3"><i class="bi bi-gear-fill me-1"></i>{{ $car->engine }}</span>
                                    <span><i class="bi bi-arrow-repeat me-1"></i>{{ $car->wheel_drive }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 gy-4">
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <div class="section-divider"></div>
                                    <h2 class="h4 fw-semibold mt-3">Overview</h2>
                                    <p class="text-secondary">{{ $car->description }}</p>
                                </div>

                                <div class="row row-cols-1 row-cols-md-2 g-3">
                                    <div class="col">
                                        <div class="p-4 rounded-4 bg-white border meta-pill">
                                            <h3 class="h6 mb-2">Year</h3>
                                            <p class="mb-0">{{ $car->year }}</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-4 rounded-4 bg-white border meta-pill">
                                            <h3 class="h6 mb-2">Drive</h3>
                                            <p class="mb-0">{{ $car->wheel_drive }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="p-4 rounded-4 bg-white border h-100">
                                    <h3 class="h5 fw-semibold">Quick Specs</h3>
                                    <ul class="list-unstyled mt-4 text-secondary">
                                        <li class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Brand</span>
                                            <strong>{{ $car->brand->name }}</strong>
                                        </li>
                                        <li class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Model</span>
                                            <strong>{{ $car->modeli->name }}</strong>
                                        </li>
                                        <li class="d-flex justify-content-between py-2 border-bottom">
                                            <span>Engine</span>
                                            <strong>{{ $car->engine }}</strong>
                                        </li>
                                        <li class="d-flex justify-content-between py-2">
                                            <span>Year</span>
                                            <strong>{{ $car->year }}</strong>
                                        </li>
                                    </ul>
                                    <a href="{{ route('cars.index') }}" class="btn btn-primary w-100 rounded-pill mt-4">Back to Cars</a>
                                </div>
                            </div>
                        </div>

                        @if ($car->image_2 || $car->image_3 || $car->image_4)
                            <div class="row g-3 mt-5">
                                @foreach (['image_2', 'image_3', 'image_4'] as $imageKey)
                                    @if ($car->$imageKey)
                                        <div class="col-12 col-md-4">
                                            <img src="{{ asset('img/' . $car->$imageKey) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $car->{$imageKey . '_name'} ?? $car->name }}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection