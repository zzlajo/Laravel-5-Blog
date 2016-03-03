@extends('layouts.backend')

@section('page-title')
    Dashboard
@stop

@section('breadcrumb-title')
    Dashboard
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $blogPostsCount }}</h3>
                    <p>Blog Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-wordpress"></i>
                </div>
                <a href="{{ URL::route('admin.posts.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $workPostsCount }}</h3>
                    <p>Work Entries</p>
                </div>
                <div class="icon">
                    <i class="fa fa-briefcase"></i>
                </div>
                <a href="{{ URL::route('admin.posts.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>
                    <p>Registered Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="{{ URL::route('admin.users.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@stop
