@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'My Blogs'])

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        @include('frontend.partials.home._menuLeft')
                    </div>
                </div>
                <div class="col-sm-9">

                    <div class="blog-post-area">
                        <h2 class="title text-center">My Blogs</h2>
                        @if (count($posts))
                            @foreach ($posts as $post)
                                <div class="single-blog-post">
                                    <h3><a href="{{URL::route('blog.show', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
                                    <div class="post-meta">
                                        <ul>
                                            <li><i class="fa fa-user"></i> {{$post->author->name}}</li>
                                            <li><i class="fa fa-clock-o"></i>{{date('H:i:s A', strtotime($post->created_at))}}</li>
                                            <li><i class="fa fa-calendar"></i>{{date('d M, Y', strtotime($post->created_at))}}</li>
                                        </ul>
                                    </div>
                                    <a href="{{URL::route('blog.show', ['slug' => $post->slug])}}">
                                        <img  src="{{asset($post->image)}}" alt="" style=" width: 200px;">
                                    </a>
                                    <p>{!! str_limit($post->content, 200) !!}</p>
                                    <a  class="btn btn-primary" href="{{URL::route('blog.show', ['slug' => $post->slug])}}">Read More</a>
                                </div>
                            @endforeach
                        @else
                            <p> No Blog found in databases</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
