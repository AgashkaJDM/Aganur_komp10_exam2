@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <span class="badge badge-soft rounded-pill px-3 py-2">Brands</span>
                <h2 class="mt-3 fw-semibold">Japanese Automotive Brands</h2>
            </div>
            <a href="{{ route('home.index') }}" class="text-decoration-none text-primary">Back to home</a>
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
                    <div class="alert alert-warning mb-0">Brands not found.</div>
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $brands->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection