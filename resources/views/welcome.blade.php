@extends('layouts.master')

@section('title', 'Kami adalah jasa serabutan untuk milenial')

@section('content')

<div class="container">
    <div class="row h-100 text-center justify-content-center align-items-center">
        <div class="col-12 col-sm">
            <h1>
                Selamat datang di, 
                <a href="{{ route('home')}}">Leonyx Space</a>
            </h1>
            <blockquote class="blockquote mb-0">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.
                </p>
                <footer class="blockquote-footer">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </footer>
            </blockquote>
        </div>
    </div>
</div>

@endsection