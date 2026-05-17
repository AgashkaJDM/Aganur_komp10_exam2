@extends('admin.layouts.head')

@section('main-content')
<form action="{{ route('admin.brands.store') }}" method="post">
    @csrf
    <div class="container-lg">
        <div class="align-items-center justify-content-center vh-100">
            <div class="mb-3">
                <label for="name" class="form-label">Brand name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Brand name...">
            </div>
            <button type="submit" class="btn btn-primary">Add new brand</button>
        </div>
    </div>

</form>
@endsection