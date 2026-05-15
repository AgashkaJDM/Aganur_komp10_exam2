@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <span class="badge badge-soft rounded-pill px-3 py-2">Models</span>
                <h2 class="mt-3 fw-semibold">Browse Auto Models</h2>
            </div>
            <a href="{{ route('home.index') }}" class="text-decoration-none text-primary">Back to home</a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($models as $model)
                <div class="col">
                    <a href="{{ route('cars.index', ['modeliId' => $model->id]) }}" class="text-decoration-none">
                        <div class="card card-hover h-100 border-0 shadow-sm p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="badge badge-soft rounded-pill px-3 py-2">Model</div>
                                <i class="bi bi-speedometer2 fs-4 text-primary"></i>
                            </div>
                            <h5 class="text-dark mb-2">{{ $model->getName() }}</h5>
                            <p class="text-muted small mb-0">View the latest cars for this model.</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection