@extends('layouts.master')

@section('content')
<div class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-12 col-md-12 mb-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                <img class="img-fluid rounded-circle" data-src="holder.js/100x100?auto=yes&random=yes&textmode=exact" alt="">
                                <p class="card-text">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi quibusdam ducimus quidem vero iure ex eius, quae eaque possimus eligendi et placeat nostrum inventore rerum blanditiis deleniti ipsam neque optio?
                                </p>
                                <a href="" data-toggle="modal" data-target="#modelId" class="btn btn-outline-primary">New Post</a>
                                <a href="" class="btn btn-outline-primary">Follow</a>
                            </div>
                        </div>
                    </div>
                    @foreach ($items as $item)
                        <div class="col-6 col-md-4 mb-4">
                            <div class="card shadow">
                                <img class="card-img-top" data-src="holder.js/400x400?auto=yes&random=yes&text='{{ Str::limit($item->content, 20) }}'" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">Title</h4>
                                    <p class="card-text">
                                        {{ Str::limit($item->content, 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <div class="form-group">
                        <input type="text" name="content" id="content" class="form-control @error('content') is-invalid  @enderror" value="{{ old('content') ? old('content') : ''}}">

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-primary">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection