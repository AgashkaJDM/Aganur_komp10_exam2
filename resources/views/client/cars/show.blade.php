@extends('client.layouts.head')


@section('main-content')
    <div class="container-lg">

        <div class="row justify-content-center my-4">
            <div class="col-7">
                <div>
                    <img src="{{ asset('img/image2.jpg') }}" class="w-100" alt="">
                </div>

                <div class="h1 mt-2">
                    {{ $post->id }}
                    {{ $post->title }}
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <i class="bi bi-calendar"></i>
                        {{ ($post->created_at)->format('d.m.Y') }}
                    </div>
                    <div>
                        <i class="bi bi-eye"></i>
                        {{ $post->view_count }}

                        <i class="bi bi-heart text-danger ms-3"></i>
                        {{ $post->like_count }}
                    </div>
                </div>

                <div class="my-4 h3">
                   Category: {{ $post->category->name }}
                </div>
                <div class="my-4 h3">
                   Author: {{ $post->author->name }} {{ $post->author->surname }}
                </div>

                <div>
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </div>
@endsection