<div class="col">
    <a href="{{ route('cars.show', $car->id) }}" class="text-decoration-none">
        <div class="card card-hover h-100 border-0 shadow-sm overflow-hidden">
            <div class="position-relative">
                <img src="{{ asset($car->image_1 ? 'img/' . $car->image_1 : 'img/image2.jpg') }}" class="card-img-top card-img-cover" alt="{{ $car->image_1_name ?? $car->name }}">
                <div class="badge bg-white text-primary position-absolute top-0 start-0 m-3 rounded-pill px-3 py-2 shadow-sm">{{ $car->modeli->name }}</div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-dark">{{ $car->name }}</h5>
                <p class="card-text text-muted small mb-3">{{ $car->brand->name }} • {{ $car->year }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-primary fw-semibold">View details</span>
                    <span class="text-muted small">{{ $car->wheel_drive }}</span>
                </div>
            </div>
        </div>
    </a>
</div>