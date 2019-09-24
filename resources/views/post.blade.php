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
                                    <p>
                                        @empty(count($items))
                                            <h1>
                                                Hi, Selamat datang di Leonyx Space
                                            </h1>
                                        @else
                                            <img class="img-fluid rounded-circle" data-src="holder.js/100x100?auto=yes&random=yes&textmode=exact" alt="">
                                            <h1>
                                                Hi, I'am <a href="{{route('user.show', $items->first()->user->username)}}">{{Str::title($items->first()->user->name)}}</a>
                                            </h1>
                                            <blockquote class="blockquote mb-0">
                                                <p>
                                                    {{$items->first()->content}}
                                                </p>
                                                <footer class="blockquote-footer">
                                                    {{ Str::title($items->first()->title)}}
                                                </footer>
                                            </blockquote>
                                        @endempty
                                    </p>
                                    @guest
                                    <a href="#content" class="btn btn-indigo  btn-sm">
                                            <i data-feather="heart"></i>
                                        </a>
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
                <div class="col">
                    <div class="row align-items-center">
                        <div class="form-group col">
                            <h4 class="text-muted">Recently Updated</h4>
                        </div>
                        <div class="form-group col col-md-3 text-right">
                            <a href="">Lihat Selengkapnya</a>
                        </div>
                    
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                @foreach ($items as $item)
                <div class="content col-6 col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ 'storage/'.$item->image }}" alt="">
                        <div class="card-body collapse">
                            <h5 class="card-title">
                                <a href="{{route('post.show', $item->id)}}">{{$item->title}}</a>
                            </h5>
                            <a class="text-muted" href="{{ route('user.show', Str::slug($item->user->username)) }}">{{ $item->user->name }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
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