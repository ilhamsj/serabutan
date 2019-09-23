@extends('layouts.master')

@section('title', 'Kami adalah jasa serabutan untuk milenial')

@section('content')

<div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center text-center">
                        <div class="col">
                            <p>
                                <h1>
                                    Selamat datang di,
                                    <span class="text-primary">Serabutan</span>
                                </h1>
                                <blockquote class="blockquote mb-0">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.
                                    </p>
                                    <footer class="blockquote-footer">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </footer>
                                </blockquote>
                            </p>
                            <a href="{{ route('home') }}" class="btn btn-primary btn-sm">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection