@extends('layouts.master')

@section('title', 'Kami adalah jasa serabutan untuk milenial')

@section('content')

<div class="">
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12 col-sm">
                <h1>
                    {{$item->title}}
                </h1>

                <span class="text-muted">
                    <a href="{{route('user.show', $item->user->username)}}">{{$item->user->name}}</a>
                </span>

                <span class="text-muted">
                    {{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}
                </span>

                <p class="lead">
                    {{$item->content}}
                </p>
            </div>
            <div class="col-12 col-sm-4 position-sticky">
                <img class="img-fluid rounded shadow-sm bg-light" src="{{ '../storage/'.$item->image }}" alt="">
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    <style>
        .h-50 {
            min-height: 50vh;
        }
    </style>
@endpush