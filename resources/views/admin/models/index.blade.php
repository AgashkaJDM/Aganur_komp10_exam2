@extends('admin.layouts.head')

@section('main-content')
<div class="container-lg my-4">

    <div class="d-flex justify-content-between align-items-center">
        <div class="h3 mb-3">
            Admin Auto Page
        </div>
    </div>
    <div>
        <a href="{{ route('admin.models.create') }}" class="btn btn-success">+ Add new category</a>
    </div>

    <div class="">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">
                        <i class="bi bi-gear"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                <tr>
                    <th scope="row">{{ $model->id }}</th>
                    <td>{{ $model->name }}
                    </td>
                    <td>
                        <button class="btn btn-small btn-success"><i class="bi bi-eye"></i></button>
                        <a href="{{ route('admin.models.edit', $model->id) }}" class="btn btn-small btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.models.delete', $model->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-small btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $models->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection