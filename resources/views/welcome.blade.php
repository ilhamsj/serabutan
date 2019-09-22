@extends('layouts.master')
@section('title', 'Kami adalah jasa serabutan untuk milenial')

@section('content')
    
<div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-8">
            <h1>Welcome to <span class="text-danger">{{env('app_name')}}</span></h1>
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum autem ex neque in quidem? Pariatur quisquam incidunt possimus magnam, voluptatum porro debitis adipisci aspernatur sequi sapiente modi alias, nisi quam.
            </p>
            <a href="{{route('home')}}" class="btn btn-primary">Explore</a>
            
        </div>
    </div>
</div>

@endsection