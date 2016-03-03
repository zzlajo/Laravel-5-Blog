@extends('layouts.frontend')

@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>Laravel</span>-Blog</h1>
                                    <h2>Free laravel 5 blog</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('assets/img/blog1.jpg') }}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Laravel</span>-Blog</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('assets/img/blog2.jpg') }}" class="girl img-responsive" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Laravel</span>-Blog</h1>
                                    <h2>Comments and elasticsearch</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('assets/img/blog3.jpg') }}" class="girl img-responsive" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        @include('frontend.partials.home._menuLeft')
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @if (count($blogsRecomended))
                    <div class="blog-post-area"><!--recommended_items-->
                        <h2 class="title text-center">Recommended Blog</h2>
                        @foreach( $blogsRecomended as $blog)
                        <div class="single-blog-post">
                            <h3>{{$blog->title}}</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>{{$blog->author->name}}</li>
                                    <li><i class="fa fa-clock-o"></i>{{date('H:i:s A', strtotime($blog->created_at))}}</li>
                                    <li><i class="fa fa-calendar"></i>{{date('d M, Y', strtotime($blog->created_at))}}</li>
                                </ul>
                            </div>
                            <a href="">
                                <img src="{{asset($blog->image)}}" alt="">
                            </a>
                            <p>{!! str_limit($blog->content, 200) !!}</p>
                            <a  class="btn btn-primary" href="{{url('blog/'.$blog->slug)}}">Read More</a>
                        </div>
                        @endforeach
                    </div><!--recommended_items-->
                    @endif
                    <div class="recommended_items"><!--last_items-->
                        <h2 class="title text-center">Last Blogs</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach($blogLast5 as $blogL)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset($blogL->image)}}" alt="" />
                                                    <h2>{{$blogL->title}}</h2>
                                                    <p>{!! str_limit($blogL->content, 50) !!}</p>
                                                    <a href="{{'blog/'.$blogL->slug}}" class="btn btn-default add-to-cart">Read more</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--/last_items-->

                </div>
            </div>
        </div>
    </section>
@endsection