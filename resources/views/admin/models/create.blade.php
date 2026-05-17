@extends('admin.layouts.head')

@section('main-content')
<form action="{{ route('admin.models.store') }}" method="post">
    @csrf
    <div class="container-lg">
        <div class="align-items-center justify-content-center vh-100">
            <div class="mb-3">
                <label for="brand_id" class="form-label">Brand ID</label>
                <input type="text" class="form-control" name="brand_id" id="brand_id" placeholder="Brand ID...">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Model name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Model name...">
            </div>
            <button type="submit" class="btn btn-primary">Add new model</button>
        </div>
    </div>

</form>
@endsection