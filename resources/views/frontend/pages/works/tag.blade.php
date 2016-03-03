@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'Work - All Posts with tag' ])
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('frontend.partials.home._menuLeftWork')
                </div>
            </div>
            <div class="col-sm-9">

                <div class="blog-post-area">
                    <h2 class="title text-center">Works with tag "{{$tag->name}}"</h2>
                    @if (count($posts))
                        @foreach ($posts as $post)
                            <div class="single-blog-post">
                                <h3><a href="{{URL::route('works.show', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i> {{$post->author->name}} </li>
                                        <li><i class="fa fa-clock-o"></i>{{date('H:i:s A', strtotime($post->created_at))}}</li>
                                        <li><i class="fa fa-calendar"></i>{{date('d M, Y', strtotime($post->created_at))}}</li>
                                    </ul>
                                </div>
                                <a href="{{URL::route('blog.show', ['slug' => $post->slug])}}">
                                    <img src="{{asset($post->image)}}" alt="">
                                </a>
                                <p>{!! str_limit($post->content, 200) !!}</p>
                                <a  class="btn btn-primary" href="{{URL::route('works.show', ['slug' => $post->slug])}}">Read More</a>
                            </div>
                        @endforeach
                    @else
                        <p> No Work found in databases</p>
                    @endif
                    <div class="pagination-area">
                        <ul class="pagination">
                            {!! $posts->render() !!}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
