@extends('client.layouts.head')

@section('main-content')
    <div class="container-lg my-4">

        <div class="d-flex justify-content-between align-items-center">
            <div class="h3 mb-3">
                Foods
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
            @forelse ($foods as $food)
               @include('client.partials.food-card')
            @empty
                <div class="display-4 text-center my-5 w-100">
                    Food not found :(
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $foods->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection