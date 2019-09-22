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
                                            <span class="text-primary">{{$faker->name}}</span>
                                        </h1>
                                        adipisicing elit. Ipsum repellat perspiciatis rerum molestias. Molestiae debitis alias eius sunt pariatur facilis et suscipit, assumenda nihil tenetur maxime ipsam consequatur, ratione commodi.
                                    </p>
                                    @guest
                                        <a href="#content" class="btn btn-primary  btn-sm">Follow</a>
                                    @else
                                        <a href="" data-toggle="modal" data-target="#modelId" class="btn btn-indigo btn-sm">
                                            <i data-feather="plus"></i>
                                        </a>
                                        @include('_create')
                                    @endguest 
                                    <a href="" id="displayGrid" class="btn btn-primary btn-sm">
                                        <i data-feather="grid"></i>
                                    </a>
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
            </div>

            <div class="row align-items-center">
                @foreach ($items as $item)
                <div class="content col-6 col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" data-src="holder.js/400x400?auto=yes&random=yes&text='{{ $item->title }}'" alt="">
                        <div class="card-body collapse">
                            <div class="row align-items-center justify-content-between">
                                <div class="col col-md">
                                    <img class="img-fluid rounded-circle" data-src="holder.js/50x50?auto=yes&random=yes" alt="">
                                </div>
                                <div class="people col col-md-9">
                                    <a href="{{ route('post.show', $item->user_id) }}">{{ $item->user->name }}</a>
                                </div>
                            </div>
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
        $('.card-img-top').click(function (e) { 
            e.preventDefault();
            $(this).next().slideToggle();
        });

        $('#displayGrid').click(function (e) { 
            e.preventDefault();
            $('.content').toggleClass('col-6', 'col-12');
        });
    </script>
@endpush