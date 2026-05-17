@extends('admin.layouts.head')

@section('main-content')
<form action="{{ route('admin.cars.store') }}" method="post">
    @csrf
    <div class="container-lg">
        <div class="align-items-center justify-content-center vh-100">
            <div class="mb-3">
                <label for="brand_id" class="form-label">Car's brand ID</label>
                <input type="text" class="form-control" name="brand_id" id="brand_id" placeholder="Car's brand ID...">
            </div>
            <div class="mb-3">
                <label for="modeli_id" class="form-label">Car's model ID</label>
                <input type="text" class="form-control" name="modeli_id" id="modeli_id" placeholder="Car's model ID...">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Car's name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Car's name...">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Car's year</label>
                <input type="text" class="form-control" name="year" id="year" placeholder="Car's year...">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">About car</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="About car...">
            </div>
            <div class="mb-3">
                <label for="engine" class="form-label">Car's engine model</label>
                <input type="text" class="form-control" name="engine" id="engine" placeholder="Car's engine model...">
            </div>
            <div class="mb-3">
                <label for="wheel_drive" class="form-label">Car's wheel drive</label>
                <input type="text" class="form-control" name="wheel_drive" id="wheel_drive" placeholder="RWD, AWD, FWD...">
            </div>
            <button type="submit" class="btn btn-primary">Add new car</button>
        </div>
    </div>

</form>
@endsection