@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'Work'])

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
                        <h2 class="title text-center">Work</h2>
                        <div class="single-blog-post">
                            <h3>{{$work->title}}</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>{{$work->author->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{date('H:i:s A', strtotime($work->created_at))}}</li>
                                    <li><i class="fa fa-calendar"></i> {{date('d M, Y', strtotime($work->created_at))}}</li>
                                </ul>
                            </div>
                            <a href="">
                                <img src="{{asset($work->image)}}" alt="">
                            </a>
                            {!!$work->content!!}
                        </div>
                    </div><!--/blog-post-area-->
                    <div class="rating-area">
                        <ul class="tag">
                            <li>TAG:</li>
                            @if (count($work->tags))
                                @foreach ($work->tags as $tag)
                                    <li><a class="color" href="{{ URL::route('work.tag', ['slug' => $tag->slug]) }}">{{$tag->name}}</a> <span>/</span></li>
                                @endforeach
                            @endif
                        </ul>
                    </div><!--/rating-area-->

                    <div class="socials-share">
                        <a href=""><img src="{{asset('images/blog/socials.png')}}" alt=""></a>
                    </div><!--/socials-share-->

                </div>
            </div>
        </div>

@stop
