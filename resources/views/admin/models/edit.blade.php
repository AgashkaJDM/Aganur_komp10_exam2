@extends('admin.layouts.head')

@section('main-content')
    <div class="container-lg my-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="h3 mb-3">
                <a href="{{ route('admin.models.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-arrow-left-circle"></i>
                </a> {{ $model->name  }}
            </div>
        </div>

        <div class="row align-items-center justify-content-center py-4">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <form action="{{ route('admin.models.update', $model->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand ID</label>
                        <div>
                            <input type="text" name="brand_id" value="{{ $model->brand_id }}"
                                class="form-control w-100 @error('brand_id') is-invalid @enderror" id="brand_id"
                                aria-describedby="brand_id-feedback" autocomplete="brand_id">
                            <div id="brand_id-feedback">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <label for="name" class="form-label">name</label>
                        <div>
                            <input type="text" name="name" value="{{ $model->name }}"
                                class="form-control w-100 @error('name') is-invalid @enderror" id="name"
                                aria-describedby="name-feedback" autocomplete="name">
                            <div id="name-feedback">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success w-100 mt-3">Update model</button>
                </form>
            </div>

        </div>
    </div>
@endsection