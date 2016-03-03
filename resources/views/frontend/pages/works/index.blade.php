@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'Works'])

    <section class="mt40 mb10">
        <div id="portfolio" class="container-fluid">
                    <!-- Posts List -->
                    <div class="section blog-posts-wrapper">
                        <div class="container">
                            <div class="row">
                    @forelse($works as $work)
                            <!-- Post -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="blog-post">
                                        <!-- Post Info -->
                                        <div class="post-info">
                                            <div class="post-date">
                                                <div class="date">{{date('d M, Y', strtotime($work->created_at))}}</div>
                                            </div>
                                            <div class="post-comments-count">
                                                <a href="{{ URL::route('works.show', ['slug' => $work->slug]) }}" title="Show Comments"><i class="glyphicon glyphicon-comment icon-white"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Post Info -->
                                        <!-- Post Image -->
                                        <a href="{{ URL::route('works.show', ['slug' => $work->slug]) }}"><img src="{{ $work->image }}" class="post-image" alt="Post Title"></a>
                                        <!-- End Post Image -->
                                        <!-- Post Title & Summary -->
                                        <div class="post-title">
                                            <h3><a href="{{ URL::route('works.show', ['slug' => $work->slug]) }}">{!! str_limit($work->title, 30) !!}</a></h3>
                                        </div>
                                        <div class="post-summary">
                                            <p>{!! str_limit($work->content, 200) !!}</p>
                                        </div>
                                        <!-- End Post Title & Summary -->
                                        <div class="post-more">
                                            <a href="{{ URL::route('works.show', ['slug' => $work->slug]) }}" class="btn btn-primary">Read more</a>
                                        </div>
                                    </div>
                                </div>
                    @empty
                        <p>
                            No Work have been found in the Database...
                        </p>
                    @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- End Posts List -->
        </div>
    </section>
@stop
