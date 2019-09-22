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
                                        <a href="#pcontent" class="btn btn-primary  btn-sm">Follow</a>
                                    @else
                                        <a href="" data-toggle="modal" data-target="#modelId" class="btn btn-indigo btn-sm">New Post</a>
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
                    <div class="content col-6 col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" data-src="holder.js/400x400?auto=yes&random=yes&text='{{ $item->title }}'" alt="">
                            <div class="card-body">
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

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('post.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid  @enderror" value="{{ old('title') ? old('title') : $faker->sentence}}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" cols="30" rows="5" class="form-control @error('content') is-invalid  @enderror" >{{ old('content') ? old('content') : $faker->text($maxNbChars = 200)}}</textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection