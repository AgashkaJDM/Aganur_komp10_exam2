@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <span class="badge badge-soft rounded-pill px-3 py-2">Cars</span>
                <h2 class="mt-3 fw-semibold">Discover Japanese Models</h2>
            </div>
            <a href="{{ route('home.index') }}" class="text-decoration-none text-primary">Back to home</a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($cars as $car)
                @include('client.partials.car-card')
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center mb-0">No cars found.</div>
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $cars->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection