@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.common.header._headerPage', ['pageName' => 'Profile'])

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-6">

                    <div class="card hovercard">
                        <div class="cardheader">

                        </div>
                        <div class="avatar">
                            <img alt="" src="{{ $user->avatar }}}">
                        </div>
                        <div class="info">
                            <div class="title">
                                <a target="_blank" href="#">{{ $user->name }}</a>
                            </div>
                            <div class="desc">Passionate designer</div>
                        </div>
                        <div class="bottom">
                            <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" rel="publisher"
                               href="https://plus.google.com/">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" rel="publisher"
                               href="https://plus.google.com/">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/">
                                <i class="fa fa-behance"></i>
                            </a>
                        </div>
                    </div>

                </div>
    </section>
@stop
