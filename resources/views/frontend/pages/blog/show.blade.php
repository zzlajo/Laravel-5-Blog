@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'Blog' ])


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
                        <h2 class="title text-center">Blog</h2>
                        <div class="single-blog-post">
                            <h3>{{$post->title}}</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>{{$post->author->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{date('H:i:s A', strtotime($post->created_at))}}</li>
                                    <li><i class="fa fa-calendar"></i> {{date('d M, Y', strtotime($post->created_at))}}</li>
                                </ul>
                                @if(Auth::check() && (isAuthor($post->author_id) || Auth::user()->hasRole('admin')))
                                <a href="{{ URL::route('blog.edit', $post->id) }}">Edit</a>
                                @endif
                            </div>
                            <a href="">
                                <img src="{{asset($post->image)}}" alt="">
                            </a>
                            {!!$post->content!!}
                        </div>
                    </div><!--/blog-post-area-->
                    <div class="rating-area">
                        <ul class="tag">
                            <li>TAG:</li>
                            @if (count($tags))
                                @foreach ($tags as $tag)
                                    <li><a class="color" href="{{ URL::route('blog.tag', ['slug' => $tag->slug]) }}">{{$tag->name}}</a> <span>/</span></li>
                                @endforeach
                            @endif
                        </ul>
                    </div><!--/rating-area-->

                    <div class="socials-share">
                        <a href=""><img src="{{asset('images/blog/socials.png')}}" alt=""></a>
                    </div><!--/socials-share-->

                    <!--Comments-->
                    <div class="response-area">
                        <h2>{{count($post->comments)}} RESPONSES</h2>
                        <ul class="media-list">
                            @foreach($post->comments as $comment)
                            @if(!$comment->parent_id)
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{$post->author->avatar}}" alt="">
                                </a>
                                <div class="media-body">
                                    <ul class="sinlge-post-meta">
                                        <li><i class="fa fa-user"></i>{{$comment->user->name}}</li>
                                        <li><i class="fa fa-clock-o"></i>{{date('H:i:s A', strtotime($comment->created_at))}}</li>
                                        <li><i class="fa fa-calendar"></i>{{date('d M, Y', strtotime($comment->created_at))}}</li>
                                    </ul>
                                    <i>{{$comment->title}} - {{$comment->id}}</i>
                                    <p>{{$comment->body}}</p>
                                    <a class="btn btn-primary" href="javascript:toggleDiv('reply{{$comment->id}}')"><i class="fa fa-reply"></i>Replay</a>
                                    <div id="reply{{$comment->id}}" class="replay-comment-box">
                                        <form role="form" method="POST" action="{{ URL::route('comment.store') }}">
                                            <div class="text-area">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="blogId" value="{{$post->id}}">
                                                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                <label for="comment">Title</label>
                                                <input type="text" name="title" placeholder="Comment title ...">
                                                <label for="comment">Your Comment</label>
                                                <textarea name="body" rows="3"></textarea>
                                                <button type="submit" class="btn btn-default">Post comment</button>
                                            {{--</div>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                                @if (count(comments_replay($comment->id)))
                                    @foreach(comments_replay($comment->id) as $commentRpl)
                                    <li class="media second-media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="{{$post->author->avatar}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <ul class="sinlge-post-meta">
                                                <li><i class="fa fa-user"></i>{{$commentRpl->user->name}}</li>
                                                <li><i class="fa fa-clock-o"></i>{{date('H:i:s A', strtotime($commentRpl->created_at)) }}</li>
                                                <li><i class="fa fa-calendar"></i>{{date('d M, Y', strtotime($commentRpl->created_at))}}</li>
                                            </ul>
                                            <i>{{$commentRpl->title}} - commid {{$commentRpl->id}} - replyId {{$commentRpl->parent_id}}</i>
                                            <p>{!! $commentRpl->body !!}</p>
                                            <a class="btn btn-primary" href="javascript:toggleDiv('reply{{$commentRpl->id}}')"><i class="fa fa-reply"></i>Replay</a>
                                            <div id="reply{{$commentRpl->id}}" class="replay-comment-box">

                                                <form role="form" method="POST" action="{{ URL::route('comment.store') }}">
                                                    <div class="text-area">
                                                        {!! csrf_field() !!}
                                                        <input type="hidden" name="blogId" value="{{$post->id}}">
                                                        <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                                        <label for="comment">Title</label>
                                                        <input type="text" name="title" placeholder="Comment title ...">
                                                        <label for="comment">Your Comment</label>
                                                        <textarea name="body" rows="3"></textarea>
                                                        <button type="submit" class="btn btn-default">Post comment</button>
                                                        {{--</div>--}}
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif
                                @endif
                            @endforeach
                        </ul>
                    </div><!--/Response-area-->
                    <div class="replay-box">
                        <div class="row">
                            @if(Auth::check())

                            <form role="form" method="POST" action="{{ URL::route('comment.store') }}">
                            <div class="col-sm-8">
                                <div class="text-area">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="blogId" value="{{$post->id}}">
                                <h2>Leave a replay</h2>
                                <div class="blank-arrow">
                                    <label>Title</label>
                                </div>
                                <span>*</span>
                                <input type="text" name="title" placeholder="write comment title...">
                                    <div class="blank-arrow">
                                        <label>Your Comment</label>
                                    </div>
                                    <span>*</span>
                                    <textarea name="body" rows="11"></textarea>
                                    <button type="submit" class="btn btn-primary">Post comment</button>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                            </form>
                        </div>
                        @else()
                            <p>You must sign in for post a comment</p>
                        @endif
                    </div><!--/Repaly Box-->
                </div>
            </div>
        </div>

@stop

