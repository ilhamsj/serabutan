@php
    $faker = \Faker\Factory::create();
@endphp

@extends('layouts.app')


@section('title', 'Post')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img class="img-fluid rounded-circle" data-src="holder.js/100x100?auto=yes&random=yes&textmode=exact" alt="">
                                    <p>
                                        <h1>Hi, I'am
                                            <span class="text-primary">amet consectetur</span>
                                        </h1>
                                        adipisicing elit. Ipsum repellat perspiciatis rerum molestias. Molestiae debitis alias eius sunt pariatur facilis et suscipit, assumenda nihil tenetur maxime ipsam consequatur, ratione commodi.
                                    </p>
                                    @guest
                                        <a href="#content" class="btn btn-primary  btn-sm">Follow</a>
                                    @else
                                        <a href="" data-toggle="modal" data-target="#modelId" class="btn btn-indigo btn-sm">New Post</a>
                                        @include('_create')
                                    @endguest 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                </div>
                @endif

                @foreach ($items as $item)
                    <div id="content" class="content col-6 col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" data-src="holder.js/400x400?auto=yes&random=yes&text='{{ $item->title }}'" alt="">
                            <div class="card-body collapse">
                                <p class="card-text">
                                    {{ Str::limit($item->content, 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('.card-img-top').hover(function () {
            $(this).next().slideToggle();
            }, function () {
            $(this).next().slideToggle();
            }
        );
    </script>
@endpush