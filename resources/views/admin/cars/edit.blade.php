@extends('admin.layouts.head')

@section('main-content')
    <div class="container-lg my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="h3 mb-3">
                <a href="{{ route('admin.cars.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-arrow-left-circle"></i>
                </a> {{ $car->name  }}
            </div>
        </div>

        <div class="row align-items-center justify-content-center vh-100 py-4">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <form action="{{ route('admin.cars.update', $car->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand ID</label>
                        <div>
                            <input type="text" name="brand_id" value="{{ $car->brand_id }}"
                                class="form-control w-100 @error('brand_id') is-invalid @enderror" id="brand_id"
                                aria-describedby="brand_id-feedback" autocomplete="brand_id">
                            <div id="brand_id-feedback">
                                @error('brand_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="brand_id" class="form-label">Model ID</label>
                        <div>
                            <input type="text" name="modeli_id" value="{{ $car->modeli_id }}"
                                class="form-control w-100 @error('modeli_id') is-invalid @enderror" id="modeli_id"
                                aria-describedby="modeli_id-feedback" autocomplete="modeli_id">
                            <div id="modeli_id-feedback">
                                @error('modeli_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="brand_id" class="form-label">Name</label>
                        <div>
                            <input type="text" name="name" value="{{ $car->name }}"
                                class="form-control w-100 @error('name') is-invalid @enderror" id="name"
                                aria-describedby="name-feedback" autocomplete="name">
                            <div id="brand_id-feedback">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="brand_id" class="form-label">Year</label>
                        <div>
                            <input type="text" name="year" value="{{ $car->year }}"
                                class="form-control w-100 @error('year') is-invalid @enderror" id="year"
                                aria-describedby="year-feedback" autocomplete="year">
                            <div id="year-feedback">
                                @error('year')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="brand_id" class="form-label">Description</label>
                        <div>
                            <input type="text" name="description" value="{{ $car->description }}"
                                class="form-control w-100 @error('description') is-invalid @enderror" id="description"
                                aria-describedby="description-feedback" autocomplete="description">
                            <div id="description-feedback">
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="brand_id" class="form-label">Engine</label>
                        <div>
                            <input type="text" name="engine" value="{{ $car->engine }}"
                                class="form-control w-100 @error('engine') is-invalid @enderror" id="engine"
                                aria-describedby="engine-feedback" autocomplete="engine">
                            <div id="engine-feedback">
                                @error('engine')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="brand_id" class="form-label">Wheel drive</label>
                        <div>
                            <input type="text" name="wheel_drive" value="{{ $car->wheel_drive }}"
                                class="form-control w-100 @error('wheel_drive') is-invalid @enderror" id="wheel_drive"
                                aria-describedby="wheel_drive-feedback" autocomplete="wheel_drive">
                            <div id="wheel_drive-feedback">
                                @error('wheel_drive')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <button class="btn btn-success w-100 mt-3">Add new car</button>
                </form>
            </div>

        </div>
    </div>
@endsection