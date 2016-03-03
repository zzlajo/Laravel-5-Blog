@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'Blog'])

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        @include('frontend.partials.home._menuLeft')
                    </div>
                </div>
                <div class="col-sm-9">
                    <form role="form" action="{{ URL::route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="PUT">
                    <div class="blog-post-area">

                        <div class="form-group">
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" placeholder="Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" value="{{ $post->slug }}" placeholder="Slug" class="form-control" disabled="disabled">
                            <input type="hidden" name="slug" value="{{ $post->slug }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control summernote" name="content" placeholder="Content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <div>
                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" alt="" height="100">
                                @endif
                            </div>
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
                    </div><!--/blog-post-area-->
                    </form>
                </div>
            </div>
        </div>

@stop

